@extends('layouts.app')

@section('title', 'Task Index')

@include('layouts._form')

@section('contents')
	<table class="table">
		<thead class="thead-light">
		   	<tr>
		      <th scope="col">#</th>
		      <th scope="col">ประเภทงาน</th>
		      <th scope="col">ชื่องาน</th>
		      <th scope="col">รายละเอียด</th>
		      <th scope="col">สถานะ</th>
		    </tr>
		</thead>
		<tbody>
			@foreach($tasks as $task)
		    <tr>
		      <th scope="row">{{ $task->id }}</th>
		      <td>{{ $task->type }}</td>
		      <td>{{ $task->name }}</td>
		      <td>{{ $task->detail }}</td>
		      <td>{{ $task->status ? 'Complete' : 'No Complete' }}</td>
		    </tr>
		    @endforeach
		</tbody>
	</table>
@endsection