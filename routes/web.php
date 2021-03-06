<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* default
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function(){
	return view('auth.login');
});

Route::get('main', function(){
	return view('empty');
});

Route::get('newcallident', function (){
	return view('new-call-ident');
});

Route::get('recurringcallident', function (){
	return view('recurring-call-ident');
});

Route::post('newticket', function () {
	/*
		Route for the creation of a new ticket. Extension, ID and Name fields are passed to this route through POST
	*/
	//echo "(Debug) Form data: ".request('Extension').", ".request('ID').", ".request('Name');
	$data['issueID'] = 12;
	$data['employeeID'] = "A1234";
	$data['name'] = "Patrick";
	$data['surname'] = "Star";
	$data['department'] = "Department of memes";
	$data['email'] = "p.star@makeitall.co.uk";
	$data['extensionNumber'] = 456778;
	return view('incoming-new-call', $data);
});

Route::post('submitticket', function () {
	return request()->post();
	//return view('done');
});

Route::post('submitupdate', function () {
	return request()->post();
});
	
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout');
