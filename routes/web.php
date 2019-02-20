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

function retrieveSideTickets()
{
	$id = Auth::user()['employeeID'];
	if($id == ""){
		return "";
	}

	$tickets = DB::table('tickets');

	$ticketsForUser = $tickets->where('specialistID', $id)->where('closeTimestamp',null)->get()->toArray();
	$index = 0;
	if(sizeof($ticketsForUser)==0){
		return "";
	}
	foreach($ticketsForUser as $ticket){
		$data[$index][0] = $ticket->issueID;
		$data[$index][1] = $ticket->issueDefinition;
		$data[$index][2] = $ticket->priority;
		$index++;
	}

	return $data;
}

Route::get('/', function(){
	return view('auth.login');
});

Route::get('main', function(){
	$data['tickets'] = retrieveSideTickets();
	return view('empty', $data);
});

Route::get('newcallident', function (){
	$data['tickets'] = retrieveSideTickets();
	return view('new-call-ident', $data);
});

Route::get('recurringcallident', function (){
	$data['tickets'] = retrieveSideTickets();
	return view('recurring-call-ident', $data);
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
	$data['tickets'] = retrieveSideTickets();
	return view('done', $data);
});

/*Route::post('submitupdate', function () {
	$data['tickets'] = retrieveSideTickets();
	return request()->post();
});*/
	
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout', 'HomeController@logout');