<?php

class CompaniesController extends BaseController {

    public function home()
    {
        $this->data->companies = Company::all();

        return View::make('companies.list')
            ->with(array('data' => $this->data));
    }

    public function newcompany()
    {
        return View::make('companies.new')
            ->with(array('data' => $this->data));
    }

    public function doNew()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'name'    => 'required',
            'url_word' => ''
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::route('companies_new')
                ->with('flash_error', 'Please check the form')
                ->withErrors($validator)
                ->withInput();
        } else {

            // create our user data for the authentication
            $companydata = array(
                'name'     => Input::get('name'),
                'url_word'  => Input::get('url_word'),
                'creator' => Auth::user()
            );

            $company = Company::Register($companydata);
            // create the admin relationship for this company/user
            UserInCompany::createNewRelationship(
                Auth::user(),
                $company,
                UserInCompany::STATUS_ADMIN
            );

            return Redirect::route('companies_show', array(
                'key' => $company->url_entity()
            ))->with('flash_ok', 'Company created');
        }
    }

    public function show($key = null)
    {
        if (!$this->getCompany($key)) {
            return View::make('home.404')
            ->with(array('data' => $this->data));
        }

        if ($key != $this->data->company->url_entity()) {
            return Redirect::route('companies_show', array(
                'key' => $this->data->company->url_entity
            ));
        }


        $this->data->divisions = Company::findByParentCompany($this->data->company);
        $this->data->divisions_count = Company::countByParentCompany($this->data->company);

        $this->data->parent_company = Company::findByChildCompany($this->data->company);

        $this->data->visitor_in_company = UserInCompany::isUserInCompany(
            Auth::user(),
            $this->data->company
        );

        // users in company
        $this->data->users_in_company = UserInCompany::findActiveUsersByCompany($this->data->company);
        $this->data->show_users = false;
        if (count($this->data->users_in_company) > 0) { // change to greater than 1
            $this->data->show_users = true;
        }

        return View::make('companies.show')
            ->with(array('data' => $this->data));

    }

    protected function getCompany($company_key, $restricted = false)
    {
        if (str_contains($company_key,':')) {
            $this->data->company = Company::findByKey($company_key);
        } else {
            $this->data->company = Company::findByUrlWord($company_key);
        }
        if (!$this->data->company) {
            Session::flash('flash_error', 'No such page');
            return false;
        }
        /*
        if ($restricted && !$this->data->user->sameAs(Auth::user())) {
            Session::flash('flash_error', 'You do not have permission to view this page');
            return false;
        }*/
        return true;
    }

    public function membersAction($key = null)
    {
        if (!$this->getCompany($key)) {
            return View::make('home.404')
                ->with(array('data' => $this->data));
        }

        $this->data->visitor_is_admin = (
            Auth::user() &&
            (Auth::user()->isAdmin() ||
                UserInCompany::isUserCompanyAdmin(
                    Auth::user(),
                    $this->data->company
                )
            )
        );

        $this->data->update_url = URL::route('company_membership', array(
            'key' => $this->data->company->url_entity()
        ));
        $this->data->return_url = URL::route('companies_members', array(
            'key' => $this->data->company->url_entity()
        ));

        // if show_users == false
        // only admins can access this page

        if ($this->data->visitor_is_admin) {
            $this->data->users_in_company = UserInCompany::findAllUsersByCompany($this->data->company);
        } else {
            $this->data->users_in_company = UserInCompany::findActiveUsersByCompany($this->data->company);
        }


        $this->data->parent_company = Company::findByChildCompany($this->data->company);


        return View::make('companies.members')
            ->with(array('data' => $this->data));
    }

    public function doMembership($key = null)
    {
        if (!$this->getCompany($key)) {
            return View::make('home.404')
                ->with(array('data' => $this->data));
        }

        $message = '';
        $status = Input::get('status');
        $return_url = Input::get('return_url');
        if (!$return_url) {
            $return_url = URL::route('companies_show', array(
                'key' => $this->data->company->url_entity()
            ));
        }

        if ($status == 'join') {
            // validate you are not already a member
            UserInCompany::createNewRelationship(
                Auth::user(),
                $this->data->company
            );
            $message = 'You have joined this company (awaiting approval)';
        } else {
            // validate the current user is an admin of the company
            $user_id = Input::get('user_id');
            $user = User::findById($user_id);
            // validate the user exists
            $user_in_company = UserInCompany::findByUserAndCompany(
                $user,
                $this->data->company
            );
            // validate the relationship exists

            if ($status == 'approve') {
                $user_in_company->approve();
            } elseif ($status == 'admin') {
                // validate the user is not the current user

            } elseif ($status == 'unadmin') {
                // validate the user is not the current user

            } elseif ($status == 'delete') {

            }
        }

        var_dump(Input::all());
        die;


        // redirect to company page
        return Redirect::url($return_url)
            ->with('success', $message);
    }

}
