@extends('layout_user')

@section('content_user')
<div class="content-dashboard">
	@include('thongbao')
	@foreach($detail_booking as $key => $data)
		<div class="row" >
			
			<div class="col-4">
				<h3>{{$data->room_name}}</h3>
			</div>
			<div class="col-6">
				<div class="row" style="padding: 15px 0px;">
					<div class="col"><b>Mã đặt chỗ:</b> {{$data->detail_booking_id}}</div>
					<div class="col"><b>Số khách:</b> {{$data->number_people}}</div>
					<div class="col"><b>Số ngày:</b> {{$data->number_date_booking}}</div>
				</div>
				<div class="row">
					<div class="col"><b>Ngày đến:</b> {{$data->date_start}}</div>
					<div class="col"><b>Ngày đi:</b> {{$data->date_end}}</div>
					<div class="col"><b>Tổng tiền:</b> {{number_format($data->price)}}₫</div>
				</div>
			</div>
			<div class="col-2">
				<button type="button" class="btn btn-success" style="margin: 30px;"><a href="{{route('huyphong',['id' => $data->detail_booking_id])}}" style="color:white;" onclick="return confirm('Bạn chắc chắn muốn hủy đặt phòng này?');">Hủy phòng</a></button>
			</div>

		
		</div>
		<hr>
			@endforeach
	</div>
@endsection