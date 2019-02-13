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
		echo $user->name;
	}
	else if (!empty($_POST["ID"])){
		$user = DB::table('employees')->where('id', $_POST["ID"])->first();
		echo $user->name;
	}
	else if (!empty($_POST["Name"])){
		$user = DB::table('employees')->where('name', $_POST["Name"])->first();
		echo $user->name;
	}
});