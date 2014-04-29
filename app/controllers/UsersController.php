<?php

class UsersController extends BaseController {

    public function login()
    {

        return View::make('users.login')
            ->with(array('data' => $this->data));
    }

    public function doLogin()
    {
        // validate the info, create rules for the inputs
        $rules = array(
            'email'    => 'required|email', // make sure the email is an actual email
            'password' => 'required|alphaNum|min:3' // password can only be alphanumeric and has to be greater than 3 characters
        );

        // run the validation rules on the inputs from the form
        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('login')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        } else {

            // create our user data for the authentication
            $userdata = array(
                'email'     => Input::get('email'),
                'password'  => Input::get('password')
            );

            // attempt to do the login
            if (Auth::attempt($userdata, true)) {
                return Redirect::route('profile')
                    ->with('flash_notice', 'You are successfully logged in.');
            } else {
                // validation not successful, send back to form
                return Redirect::route('login')->with('flash_error', 'Invalid details');

            }

        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('profile')
            ->with('flash_notice', 'You are successfully logged out.');
    }

    public function profile()
    {

        return View::make('users.profile')
            ->with(array('data' => $this->data));
    }
}
