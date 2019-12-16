@extends('layout_user')

@section('content_user')
<div class="container shadow-lg p-3 mb-5 bg-white rounded" style="margin: 200px 500px; width:40%;">
<form style="padding: 30px;" action="{{route('post_doimatkhau')}}" method="post">
	@csrf
	<div style="margin: 30px;">
		@include('thongbao')
	</div>
	<h3>Đổi mật khẩu</h3>
  <div class="form-group">
    <label for="exampleInputEmail1">Mật khẩu cũ</label>
    <input type="password" class="form-control" name="matkhaucu">
  </div>
 <div class="form-group">
    <label for="exampleInputEmail1">Mật khẩu mới</label>
    <input type="password" class="form-control" name="matkhaumoi" id="txtPassword">
  </div>
   <div class="form-group">
    <label for="exampleInputEmail1">Xác nhận mật khẩu mới</label>
    <input type="password" class="form-control" name="" id="txtConfirmPassword">
  </div>
  <button type="submit" class="btn btn-primary" onclick="return Validate()">Đồng ý</button>
</form>
</div>
	<script type="text/javascript">
    function Validate() {
        var password = document.getElementById("txtPassword").value;
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        if (password != confirmPassword) {
            alert("Xác nhận mật khẩu không đúng mời bạn kiểm tra lại mật khẩu");
            return false;
        }
        return true;
    }
</script>
@endsection