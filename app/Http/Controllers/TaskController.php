<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Task;
use \App\Type;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
        $this->middleware('auth');
    }
    public function index()
    {
        // $type = \App\Type::all();

        return view('index')->with(['tasks' => Task::all(), 'types' => Type::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    $taskCreateValidateRules = [
        'type_id' => 'required',
        'name' => 'required'
    ];

    $taskcreateValidateMessages = [
        'type_id.required' => 'ลงข้อมูล <a style="cursor: pointer;" onclick="document.getElementById('. "'type_id'".').focus()"><i>ประเภทงาน</i> <b>ด้วยครับ</b>',
        'name.required' => 'ลงข้อมูล <a style="cursor: pointer;" onclick="document.getElementById('. "'name'".').focus()"> <i>ชื่องาน</i><b>ด้วยครับ</b>',
    ];

    request()->validate($taskCreateValidateRules, $taskcreateValidateMessages);


    $data = (request()->all()+['user_id' => \Auth::id()]);

    if(request()->has('status')) {
        $data['status'] = true;
    }


    // return \App\Task::create($data);
    // return view('index');

    Task::create($data);
    return back()->with('success','Created Successfully !!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::find($id); 
        $tasks = Task::all();

        $types = Type::all();

        return view('index')->with(['task' => $task,'tasks' => $tasks,'types' => $types]);  

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
        'type_id' => 'required',
        'name' => 'required|max:255'
    
    ]);
    
    Task::find($id)->update($request->all());
    return redirect()->back()->with('success','Edited Successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateStatus(Task $task)
    {
    $task->update(request()->all());
    //return $task;
    return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task=Task::find($id);
        $task->delete();
        return back();
    }
    
}
