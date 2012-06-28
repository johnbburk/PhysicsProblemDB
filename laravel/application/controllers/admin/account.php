<?php

class Admin_Account_Controller extends Base_Controller
{
	public $restful=true;
	
	public function get_index()
	{
		//echo "this is the index page of account";
		return View::make('pages.account');
	}
	
	// these next two do the newuser form
	public function get_newuser()
	{
		return VIEW::make('pages.newuser');
	}
	
	public function post_newuser()
	{
		$input=Input::all();
		$rules=array(
			'username' => 'required|unique:users',
			'password' => 'required|confirmed',
			'email' => 'unique:users|email|required'
			);
		$validation=Validator::make($input, $rules);
		if ($validation->fails())
		{
			return Redirect::to('admin/account/newuser')->with_input()->with_errors($validation);
		} else {
			$hpassword=Hash::make(Input::get('password'));
			$user = new User(array(
				'username' => Input::get('username'),
				'password' => $hpassword,
				'firstname' => Input::get('firstname'),
				'lastname' => Input::get('lastname'),
				'email' => Input::get('email'),
				'institution' => Input::get('institution'),
				'address' => Input::get('address'),
				'address2' => Input::get('address2'),
				'city' => Input::get('city'),
				'state' => Input::get('state'),
				'zip' => Input::get('zip'),
				'country' => Input::get('country')
				));
			$user->save();
			Auth::login($user->id);
			return Redirect::to('/');
			//echo "Cool, thanks for joining us!";
			//return Redirect::to('/');
		};
	}
	
	// end of new user actions
	///////////////////////////////////////////////////////////
	
	//////////////////////////////////////////////////////////
	// login actions begin here
	
	
	public function get_login()
	{
		return View::make('pages.login');
	}
	
	public function post_login()
	{
		// get the username and password from the POST
		// data using the Input class
		$username = Input::get('username');
		$password = Input::get('password');
		
		// call Auth::attempt() on the username and password
		// to try to login, the session will be created
		// automatically on success
		$credentials=array('username'=>$username, 'password'=>$password);
		if ( Auth::attempt($credentials) )
		{
			// it worked, redirect to the admin route
			return Redirect::to('/');
		}
		else
		{
			// login failed, show the form again and
			// use the login_errors data to show that
			// an error occured
			return Redirect::to('admin/account/login')
			->with('login_errors', true);
		}
	}
	// end of login actions
	/////////////////////////////////////////////////////////////////
	
	// here's a logout action
	public function get_logout()
	{
		Auth::logout();
		return Redirect::to('admin/account/login');
	}
}
	
	
