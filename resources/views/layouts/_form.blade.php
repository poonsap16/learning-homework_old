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
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
	@endif
<form class="my-4" action="/tasks" method="POST">
	@csrf
<div class="form-row">
	<div class="form-group col-md-6">
		<label for="type">ประเภทงาน</label>
		<select id="type" class="form-control" name="type">
			<option value="" selected>เลือกประเภทงาน</option>
			<option value="1" {{ old('type') == 1 ? 'selected' : ''}}>Maintenance</option>
			<option value="2" {{ old('type') == 2 ? 'selected' : ''}}>Support</option>
			<option value="3" {{ old('type') == 3 ? 'selected' : ''}}>RFID</option>
			<option value="4" {{ old('type') == 4 ? 'selected' : ''}}>Activity</option>
		</select>
	</div>
	<div class="form-group col-md-6">
		<label for="name">ชื่องาน</label>
		<input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
	</div>
</div>
	<div class="form-group">
		<label for="detail">รายละเอียด</label>
		<textarea class="form-control" id="detail" name="detail"></textarea>
	</div>
	<div class="form-group">
		<div class="form-check">
			<input class="form-check-input" type="checkbox" value="0" id="status" name="status">
			<label class="form-check-label" for="status">Completed</label>
		</div>
	</div>



	<button type="submit" class="btn btn-primary">Create</button>

</form>
</div>