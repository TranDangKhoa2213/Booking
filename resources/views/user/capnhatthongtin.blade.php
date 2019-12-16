@extends('layout_user')

@section('content_user')
<div class="container shadow-lg p-3 mb-5 bg-white rounded" style="margin: 200px 500px; width:40%;">
<form style="padding: 30px;" action="{{route('post_capnhatthongtin')}}" method="post">
	@csrf
	<div style="margin: 30px;">
		@include('thongbao')
	</div>
	<h3>Cập nhật thông tin</h3>
  <div class="form-group">
    <label for="exampleInputEmail1">Họ tên</label>
    <input type="text" class="form-control" name="fullname" value="{{$user->fullname}}">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="text" class="form-control" name="email" value="{{$user->email}}">
  </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Địa chỉ</label>
    <input type="text" class="form-control" name="address" value="{{$user->address}}">
  </div>


  <button type="submit" class="btn btn-primary">Đồng ý</button>
</form>
</div>
@endsection