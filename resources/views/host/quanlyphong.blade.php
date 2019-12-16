@extends('layout_host')

@section('content_host')
<div style="margin: 200px 100px; width:80%;">
	
	<div style="padding-left: 150px; width:80%;">
		@include('thongbao')
	</div>
<table class="table table-bordered container shadow-lg p-3 mb-5 bg-white rounded">
  <thead>
    <tr>
      <th scope="col">Tên phòng</th>
      <th scope="col">Giá phòng</th>
      <th scope="col">Số người</th>
      <th scope="col">Tình trạng</th>
      <th scope="col">Chức năng</th>
    </tr>
  </thead>
  <tbody>

  	@foreach($room as $key => $data)
	<tr>
		<td>{{$data->room_name}}</td>
		<td>{{number_format($data->room_price)}} VNĐ</td>
		<td>{{$data->number_people}}</td>
		<td>
			@if($data->status==1)
			<i class="fas fa-times-circle" style="color: red;"></i>
			@else
			<i class="fas fa-check-circle" style="color: green;"></i>
			@endif
		</td>
		<td>
			<a href="{{route('xoaphong',['room_id' => $data->room_id])}}" onclick="return confirm('Bạn có chắc chắn xóa phòng này')"><button class="btn btn-info" onclick="return confirm('Bạn có chắc chắn hủy phòng này?');">Hủy phòng</button></a>
		
			<a href="{{route('get_suathongtinphong',['room_id' => $data->room_id])}}"><button class="btn btn-success">Sửa thông tin phòng</button></a>
		</td>
	</tr>
  	@endforeach
  </tbody>
</table>
</div>
@endsection