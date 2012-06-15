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
// both login and newuser are registered with the admin.account route

// New user routes______________________________________________
// this defines admin/account/newuser and takes care of the form

Route::Controller('admin.account');

Route::Controller('admin.setupdb');



// route for adding problems

Route::Controller('problems');

// quick page to populate type, format etc tables

Route::get('formats', function(){
		$formats=array(
			"multiple choice",
			"true/false",
			"free response"
			);
		foreach ($formats AS $format)
		{
			$for=Problemformat::create(array('format'=>$format));
		};
});

Route::get('types', function(){
		$formats=array(
			"numerical",
			"conceptual"
			);
		foreach ($formats AS $format)
		{
			$for=Problemtype::create(array('type'=>$format));
		};
});

Route::get('levels', function(){
		$formats=array(
			"physical science",
			"conceptual physics",
			"AP physics",
			"calc-based",
			"upper division"
			);
		foreach ($formats AS $format)
		{
			$for=Problemlevel::create(array('level'=>$format));
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
	if (Auth::guest()) return Redirect::to('admin/account/login');
});