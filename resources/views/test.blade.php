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