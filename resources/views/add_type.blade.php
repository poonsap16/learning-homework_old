@extends('layouts.app')

@section('title', 'Task Index')
<div class="container">


<form class="my-4" action="{{ url('/add-type') }}" method="POST">

	@csrf
	<div class="form-row">

		<div class="form-group col-md-6">
			<label for="name">ชื่องาน</label>

				<input type="text" class="form-control" id="name" name="name" value="{{old('name',isset($task) ? $task->name:'')}}">
		</div>
	</div>
		<button type="submit" class="btn btn-primary">Create</button>

</form>
</div>