<?php

class UserController extends Controller
{
    public function setupController()
    {
        return View::make("login");
    }
    
    public function processForm()
    {
        // get POST data
        $userdata = array(
            'username'      => Input::get('username'),
            'password'      => Input::get('password')
        );
    
        if ( Auth::attempt($userdata, true) )
        {
            // we are now logged in, go to home
            Session::put('key', 'value');
            return Redirect::to('home');
        }
        else
        {
            // auth failure! lets go back to the login
            return Redirect::to('login')
                ->with('login_errors', true);
            // pass any error notification you want
            // i like to do it this way :)
        }
    
    
        return 'login form sent';
    }
}