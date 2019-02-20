<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/employeesearch', function(Request $request){
    //echo json_encode((array)$results);
    if(!empty($_POST["Extension"])){
        $user = DB::table('employees')->where('extension', $_POST["Extension"])->first();
    }
    else if (!empty($_POST["ID"])){
        $user = DB::table('employees')->where('id', $_POST["ID"])->first();
    }
    else if (!empty($_POST["Name"])){
        $user = DB::table('employees')->where('name', $_POST["Name"])->first();
    }

    $data['employeeID'] = $user->id;
    $data['firstname'] = $user->name;
    $data['surname'] = $user->surname;
    $data['department'] = $user->department;
    $data['email'] = $user->email;
    $data['extensionNumber'] = $user->extension;
    return view('incoming-new-call', $data);
});

Route::post('/recurringticket', 'TicketController@retrieveTicket');

Route::post('/submitticket', 'TicketController@getTicketData');
Route::post('/submitupdate', 'UpdateController@createUpdate');
Route::post('/submitSpecialist', 'UpdateController@changeSpecialist');