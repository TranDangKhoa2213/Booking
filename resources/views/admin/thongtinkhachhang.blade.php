@extends('layout_admin')

@section('content_admin')
<div class="container-fluid">

	<div class="row">
		<div class="col">
			<h5>Thông tin cá nhân</h5>
 			<p><b>Họ tên: </b>{{$user->fullname}}</p>
 			<p><b>Email: </b>{{$user->email}}</p>
 			<p><b>Địa chỉ: </b>{{$user->address}}</p>
		</div>
		<div class="col">
			<h5>Danh sách phòng đang cho thuê ({{$room->count()}})</h5>
			@foreach($room as $key => $data)
				<p>{{$data->room_name}}</p>
			@endforeach
		</div>
		
	</div>
</div>
@endsection