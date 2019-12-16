@extends('layout_host')

@section('content_host')
@include('thongbao')
<div class="container shadow-lg p-3 mb-5 bg-white rounded" id="upload" style="margin: 200px 500px; width:40%;">
	
<form style="padding: 30px;" action="{{route('post_suathongtinphong',['room_id' => $room->room_id])}}" method="post" enctype="multipart/form-data">
	@csrf
	<div style="margin: 30px;">
		@include('thongbao')
	</div>
	<h3>Sửa thông tin phòng</h3>

 <div class="form-group">
    <label for="exampleInputEmail1">Tên phòng</label>
    <input type="text" class="form-control" name="room_name" value="{{$room->room_name}}" >
  </div>

   <div class="form-group">
    <label for="exampleInputEmail1">Giá phòng</label>
    <input type="number" class="form-control" name="room_price" value="{{$room->room_price}}" >
  </div>

  <div class="form-group">
    <label>Mô tả phòng</label>
    <textarea class="form-control" rows="3" name="room_desc">{{$room->room_desc}}</textarea>
  </div>

 
 	<div class="row">
 		<div class="col">
 			 <div class="form-group">
    <label for="exampleFormControlSelect1">Số người</label>
    <select class="form-control" id="exampleFormControlSelect1" name="number_people">
      <option value="1">1</option>
      <option value="2">2</option>
      <option value="3">3</option>
      <option value="4">4</option>
      <option value="5">5</option>
      <option value="6">6</option>
      <option value="7">7</option>
      <option value="8">8</option>
      <option value="9">9</option>
      <option value="10">10</option>
    </select>
  </div>
 		</div>
 		<div class="col">
 			  <div class="form-group">
    <label for="exampleFormControlSelect1">Loại phòng</label>
    <select class="form-control" id="exampleFormControlSelect1" name="category_id">
   		@foreach($category as $key => $data)

		<option value="{{$data->category_id}}">{{$data->category_name}}</option>
     	@endforeach
    </select>
  </div>
 		</div>
 	</div>
  <label for="exampleFormControlSelect1"><b>Địa chỉ</b></label>
  <div class="row">

  	<div class="col">
  		
 <div class="form-group">
    <label for="exampleInputEmail1">Thành phố</label>
    <input type="text" class="form-control" name="city" value="{{$room->city}}" >
  </div>
  	</div>
  	<div class="col">
  		
 <div class="form-group">
    <label for="exampleInputEmail1">Quận/huyện</label>
    <input type="text" class="form-control" name="district" value="{{$room->district}}" >
  </div>
  	</div>
  	<div class="col">
  		
 <div class="form-group">
    <label for="exampleInputEmail1">Đường</label>
    <input type="text" class="form-control" name="street" value="{{$room->street}}" >
  </div>
  	</div>
  </div>

{{--   <input type="file" name="file[]" multiple> --}}
  <button type="submit" class="btn btn-primary">Đồng ý</button>
</form>
</div>

@endsection