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

Route::get('/', function () {
    return view('intro');
});

Route::get('/tasks', function () {
    return view('index')->with(['tasks' => \App\Task::all()]);
});

Route::post('/tasks', function () {

	$taskCreateValidateRules = [
		'type' => 'required',
		'name' => 'requred'
	];

	request()->validate($taskCreateValidateRules);

	$data = request()->all();

	if(request()->has('status')) {
		$data['status'] = true;
	}


    return \App\Task::create($data);
    return view('index');
});
