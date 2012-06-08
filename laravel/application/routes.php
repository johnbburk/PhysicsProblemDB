<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Simply tell Laravel the HTTP verbs and URIs it should respond to. It is a
| breeze to setup your application using Laravel's RESTful routing and it
| is perfectly suited for building large applications and simple APIs.
|
| Let's respond to a simple GET request to http://example.com/hello:
|
|		Route::get('hello', function()
|		{
|			return 'Hello World!';
|		});
|
| You can even respond to more than one URI:
|
|		Route::post(array('hello', 'world'), function()
|		{
|			return 'Hello World!';
|		});
|
| It's easy to allow URI wildcards using (:num) or (:any):
|
|		Route::put('hello/(:any)', function($name)
|		{
|			return "Welcome, $name.";
|		});
|
*/

Route::get('/', function()
{
	return View::make('home.index');
});

Route::get('admin', function(){
		echo "Welcome ";
		echo Auth::user()->firstname;
		echo ", you made it to admin. I see you're from ";
		echo Auth::user()->institution;
		echo ".";
});


/*____________________________________________
| login routes                                |
______________________________________________*/
Route::get('login', function() {

	// display the view with the login form
	return View::make('pages.login');

});

Route::post('login', function() {

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
		return Redirect::to('admin');
	}
	else
	{
		// login failed, show the form again and
		// use the login_errors data to show that
		// an error occured
		return Redirect::to('login')
			->with('login_errors', true);
	}

});

// New user routes______________________________________________

Route::get('newuser', function(){
		return VIEW::make('pages.newuser');
});

Route::post('newuser', function(){
		$input=Input::all();
		$rules=array(
			'username' => 'required|unique:users',
			'password' => 'required|confirmed',
			'email' => 'unique:users|email|required'
			);
		$validation=Validator::make($input, $rules);
		if ($validation->fails())
		{
			return Redirect::to('newuser')->with_input()->with_errors($validation);
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
		};
});


// quick page to populate type, format etc tables

Route::get('formats', function(){
		$formats=array(
			"multiple choice",
			"true/false",
			"free response"
			);
		foreach ($formats AS $format)
		{
			//$for=Problem_format::create(array('format'=>$format));
			$for=new Problem_format;
			$for->format = $format;
			$for->save();
		};
});

// some quick tester routes_________________________________________

/* this one only works with my simple schema
Route::get('insertproblem', function() {
		$rand=rand();
		$prob = array(
			'text'  => "My super cool problem number $rand",
			);
		$user = User::find(1);
		$user->problems()->insert($prob);
});
*/

/* this one only works with my simple schema
Route::get('inserttag', array('before' => 'auth', function() {
			$rand=rand();
			$tag = array(
				'tag'  => "tag$rand",
				'user_id' => Auth::user()->id
				);
			$prob = Problem::find(1);
			$prob->tags()->insert($tag);
		
}));
*/

/* only works with my simple schema
Route::get('listproblems', array('before' => 'auth', function() {
		$uid=Auth::user()->id;
		$user=User::find($uid);
		$probs=$user->problems;
		foreach ($probs AS $problem) {
			echo $problem->text;
			echo " has tags: ";
			$tags=$problem->tags;
			foreach ($tags AS $tag) {
				echo $tag->tag;
				echo ", ";
			};
			echo "<br/>";
		};
}));
*/


/*
|--------------------------------------------------------------------------
| Application 404 & 500 Error Handlers
|--------------------------------------------------------------------------
|
| To centralize and simplify 404 handling, Laravel uses an awesome event
| system to retrieve the response. Feel free to modify this function to
| your tastes and the needs of your application.
|
| Similarly, we use an event to handle the display of 500 level errors
| within the application. These errors are fired when there is an
| uncaught exception thrown in the application.
|
*/

Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});

/*
|--------------------------------------------------------------------------
| Route Filters
|--------------------------------------------------------------------------
|
| Filters provide a convenient method for attaching functionality to your
| routes. The built-in before and after filters are called before and
| after every request to your application, and you may even create
| other filters that can be attached to individual routes.
|
| Let's walk through an example...
|
| First, define a filter:
|
|		Route::filter('filter', function()
|		{
|			return 'Filtered!';
|		});
|
| Next, attach the filter to a route:
|
|		Router::register('GET /', array('before' => 'filter', function()
|		{
|			return 'Hello World!';
|		}));
|
*/

Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});