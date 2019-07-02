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
		      <td>{{ $task->type->name }}</td>
		      <td>{{ $task->name }}</td>
		      <td>{{ $task->detail }}</td>
		      <td>{{ $task->status ? 'Complete' : 'No Complete' }}</td>
		      <td>
		      	<form id="check-complete-{{ $task->id }}" action="/tasks/{{ $task->id }}" method="POST" style="display: none;">
		      		@csrf
		      		@method('patch')
		      		<input type="hidden" name="status" value="1">
		      	</form>
		      	@if(!$task->status)
		      		<button class="brn btn-sm btn-info" onclick="document.getElementById('check-complete-{{ $task->id }}').submit()"
		      		>ทำเสร็จแล้ว</button>
		      	@endif
		      </td>
		      <td>
			  	<button class="brn btn-sm btn-warning" role="button" href="{{ url('/tasks',$task->id) }}">Edit</button>
		      </td>
		      	<!-- <a class="brn btn-sm btn-warning" role="button" href="{{ url('/tasks',$task->id) }}">Edit</a>
		      </td> -->
<!-- 		      <td>
		      	<a class="btn btn-sm btn-danger" role="button" href="{{ url('/tasks',$task->id) }}">Delete</a>
		      </td>
 -->
				<td><form method="POST" action="{{ url('/tasks', $task->id) }}">
				    {{ csrf_field() }}
				    {{ method_field('DELETE') }}
				    <button class="brn btn-sm btn-danger" type="submit">Delete</button>
				</form>
				</td>
		    </tr>
		    @endforeach
		</tbody>
	</table>
@endsection