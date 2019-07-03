<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Type;

class TypesController extends Controller
{
    public function create()
    {

    $type_data = request()->all();

    Type::create($type_data);
    return back()->with('success','Created Successfully !!');
    //return view('add_type');
    }

}
