<?php
/* @todo - remove before launch */
ini_set('display_errors', true);
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('uses' => 'HomeController@showHome','as' => 'home'));
Route::get('/styleguide', array('uses' => 'HomeController@styleguide','as' => 'styleguide'));
Route::get('/404', array('uses' => 'HomeController@show404','as' => '404'));

Route::get('/login', array('uses' => 'UsersController@login','as' => 'login'))->before('guest');
Route::post('/login', array('uses' => 'UsersController@doLogin'))->before('guest');

Route::get('/logout', array('uses' => 'UsersController@logout','as' => 'logout'))->before('auth');

Route::get('/confirm-email', array(
    'uses' => 'UsersController@confirm_email',
    'as' => 'confirm_email'));

Route::controller('password', 'RemindersController');

Route::get('/profile', array('uses' => 'UsersController@profile','as' => 'profile'))->before('auth');


Route::filter('guest', function() {
    if (Auth::check()) {
        return Redirect::route('home')
            ->with('flash_notice', 'You are already logged in!');
    }
});

Route::filter('auth', function()
{
    if (Auth::guest()) {
        return Redirect::route('login')
            ->with('flash_error', 'You must be logged in to view this page!');
    }
});