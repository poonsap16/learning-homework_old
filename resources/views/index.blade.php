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
		    <tr>
		      <th scope="row">1</th>
		      <td>Mark</td>
		      <td>Otto</td>
		      <td>@mdo</td>
		    </tr>
		    <tr>
		      <th scope="row">2</th>
		      <td>Jacob</td>
		      <td>Thornton</td>
		      <td>@fat</td>
		    </tr>
		    <tr>
		      <th scope="row">3</th>
		      <td>Larry</td>
		      <td>the Bird</td>
		      <td>@twitter</td>
		    </tr>
		</tbody>
	</table>
@endsection