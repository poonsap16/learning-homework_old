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

// Route::get('/tasks', function () {
//     return view('index')->with(['tasks' => \App\Task::all()]);
// });
Route::get('/tasks','TaskController@index');

// Route::post('/tasks', function () {

// 	$taskCreateValidateRules = [
// 		'type' => 'required',
// 		'name' => 'required'
// 	];

// 	$taskcreateValidateMessages = [
// 		'type.required' => 'ลงข้อมูล <a style="cursor: pointer;" onclick="document.getElementById('. "'type'".').focus()"><i>ประเภทงาน</i> <b>ด้วยครับ</b>',
// 		'name.required' => 'ลงข้อมูล <a style="cursor: pointer;" onclick="document.getElementById('. "'name'".').focus()"> <i>ชื่องาน</i><b>ด้วยครับ</b>',
// 	];

// 	request()->validate($taskCreateValidateRules, $taskcreateValidateMessages);


// 	$data = request()->all();

// 	if(request()->has('status')) {
// 		$data['status'] = true;
// 	}


//     // return \App\Task::create($data);
//     // return view('index');

//     \App\Task::create($data);
//     return back();
// });
Route::post('/tasks','TaskController@create');

// Route::patch('/tasks/{task}', function (\App\Task $task) {
// 	$task->update(request()->all());
//     //return $task;
//     return back();
// });
Route::patch('/tasks/{task}','TaskController@updateStatus');

// Route:: get('/tasks/{id}', function($id){
// //   return \App\Task::find($id);  
//  $task = \App\Task::find($id); 

//  $tasks = App\Task::all();
//   return view('index')->with(['task' => $task,'tasks' => $tasks]);  
// });
Route::get('tasks/{id}','TaskController@edit');

// Route::put('/tasks/{id}',function(Illuminate\Http\Request $request,$id){
//     $validation = $request->validate([
//         'type' => 'required',
//         'name' => 'required|max:255',
//         'status' => 'required'
//     ]);
    
//     App\Task::find($id)->update($request->all());
//     return redirect()->back()->with('success','Edited Successfully !!');
// });
Route::put('tasks/{id}','TaskController@update');
Route::delete('tasks/{id}','TaskController@destroy');