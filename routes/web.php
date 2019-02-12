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
	return view('index');
});

Route::get('main', function(){
	return view('empty');
});

Route::get('newcallident', function (){
	return view('new-call-ident');
});

Route::post('login', function () {
	/*
		Route for logging in to the system. At this point this simply shows the default sidebar.
	*/
	return view('empty');
});

Route::post('newticket', function () {
	/*
		Route for the creation of a new ticket. Extension, ID and Name fields are passed to this route through POST
	*/
	echo "(Debug) Form data: ".request('Extension').", ".request('ID').", ".request('Name');
	return view('incoming-new-call');
});

Route::post('submitticket', function () {
	$form = request()->post();
	return view('done');
	
});