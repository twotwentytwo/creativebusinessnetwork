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

}
