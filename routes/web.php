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
		'name' => 'required'
	];

	$taskcreateValidateMessages = [
		'type.required' => 'ลงข้อมูลประเภทงาน ด้วยครับ',
		'name.required' => 'ลงข้อมูลชื่องาน ด้วยครับ',
	];

	request()->validate($taskCreateValidateRules, $taskcreateValidateMessages);


	$data = request()->all();

	if(request()->has('status')) {
		$data['status'] = true;
	}


    // return \App\Task::create($data);
    // return view('index');

    \App\Task::create($data);
    return back();
});

Route::patch('/tasks/{task}', function (\App\Task $task) {
	$task->update(request()->all());
    //return $task;
    return back();
});
