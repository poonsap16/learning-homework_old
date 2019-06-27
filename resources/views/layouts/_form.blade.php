<div class="container">
	<!-- {{ var_dump($errors) }} -->
<!-- 	@if($errors->any())
		@foreach($errors->all() as $error)
			<div>{{ $errors }}</div>
		@endforeach
	@endif -->

	@if ($errors->any())
    <div class="alert alert-danger" role="alert">
    	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
    		<span aria-hidden="true">&times;</span>
    	</button>
    	<h3>เกิดข้อผิดพลาด</h3>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{!! $error !!}</li>
            @endforeach
        </ul>
    </div>
	@endif
@if(isset($task))
	<form action="{{ url('/tasks',$task->id)}}" method="post">
	<input type="hidden" name="_method" value="PUT">
@else
	<form class="my-4" action="{{ url('/tasks') }}" method="POST">
@endif
	@csrf
<div class="form-row">
	<div class="form-group col-md-6">
		<label for="type_id">ประเภทงาน</label>
<!-- 		<select id="type" class="form-control" name="type">
			<option value="" selected>เลือกประเภทงาน</option>
			<option value="1" {{ old('type') == 1 ? 'selected' : ''}}>Maintenance</option>
			<option value="2" {{ old('type') == 2 ? 'selected' : ''}}>Support</option>
			<option value="3" {{ old('type') == 3 ? 'selected' : ''}}>RFID</option>
			<option value="4" {{ old('type') == 4 ? 'selected' : ''}}>Activity</option>
		</select> -->

            <!-- <select class="form-control" id="type" name="type">
            	<option value="" hidden select>เลือกประเภทงาน</option>
                <option value="1" {{old('type',isset($task) ? $task->type:'') == 1 ? 'selected' : ''}}>Maintenance</option>
                <option value="2" {{old('type',isset($task) ? $task->type:'') == 2 ? 'selected' : ''}}>Support</option>
                <option value="3" {{old('type',isset($task) ? $task->type:'') == 3 ? 'selected' : ''}}>RFID</option>
                <option value="4" {{old('type',isset($task) ? $task->type:'') == 4 ? 'selected' : ''}}>Activity</option>
            </select> -->

			<select class="form-control" name="type_id">
				<option value="" hidden></option>
				@foreach($types as $type)
					@if( old('type_id', isset($task) ? $task->type_id : '') ==  $type['id'])
						<option value="{{ $type['id'] }}" selected> {{ $type['name'] }}</option>
					@else
						<option value="{{ $type['id'] }}"> {{ $type['name'] }}</option>					
					@endif
				@endforeach
			</select>

                @error('type')
                	<small class = "form-text text-danger">{{ $message }} </small>
                @enderror

	</div>
	<div class="form-group col-md-6">
		<label for="name">ชื่องาน</label>
<!-- 		<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}"> -->
			<input type="text" class="form-control" id="name" name="name" value="{{old('name',isset($task) ? $task->name:'')}}">
        		@error('name')
                	<small class = "form-text text-danger">{{ $message }} </small>
                @enderror
	</div>
</div>
	<div class="form-group">
		<label for="detail">รายละเอียด</label>
<!-- 		<textarea class="form-control" id="detail" name="detail"></textarea> -->
		<input type="text" class="form-control" id="detail" name="detail"  value="{{old('detail',isset($task) ? $task->detail:'')}}">
<!-- 		<textarea class="form-control" id="detail" name="detail" value="value="{{ old('detail',isset($task) ? $task->detail:'')}}"></textarea> -->
	</div>
<div class="form-group">
		<div class="form-check">
<!-- 			<input class="form-check-input" type="checkbox" value="0" id="status" name="status">
			<label class="form-check-label" for="status">Completed</label> -->

			<input class="form-check-input" type="checkbox" id="status" name="status" value="1" {{old('status',isset($task) ? $task->status:'') == 1 ? 'checked' : ''}}>
			<label class="form-check-label" for="status">Completed</label>
		</div>
	</div>

<!-- <label class="form-check-inline">
    <input class="form-check-input" type="checkbox" name="hobby[]" value="1" {{ (is_array(old('hobby')) and in_array(1, old('hobby'))) ? ' checked' : '' }}> football
</label> -->


	<button type="submit" class="btn btn-primary">Create</button>

</form>
</div>