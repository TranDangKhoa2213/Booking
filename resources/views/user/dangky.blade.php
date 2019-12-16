@extends('layout_page')

@section('content_page')

<div class="login-form register" style="height: 800px;">
		<div class="title-login">
			<h2>Đăng ký</h2>
		</div>
			<div style="margin: 0px 30px;">
				@include('thongbao')
			</div>
		<form class="content-form-login" method="post" action="{{route('post_dangky')}}">
			@csrf
		  <div class="form-group">
		    <label for="exampleInputEmail1">Tên tài khoản</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" required="" name="username">
		  </div>
		<div class="form-group">
		    <label for="exampleInputEmail1">Mật khẩu</label>
		    <input type="password" class="form-control" id="txtPassword" required="" name="password">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Xác nhận mật khẩu</label>
		    <input type="password" class="form-control" id="txtConfirmPassword" required="" name="re_password">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Họ tên thật</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" required="" name="fullname">
		  </div>
		   <div class="form-group">
		    <label for="exampleInputEmail1">Email</label>
		    <input type="email" class="form-control" id="exampleInputEmail1" required="" name="email">
		  </div>
		  <div class="form-group">
		    <label for="exampleInputEmail1">Địa chỉ</label>
		    <input type="text" class="form-control" id="exampleInputEmail1" required="" name="address">
		  </div>
		  <button type="submit" class="btn btn-dark"  onclick="return Validate()" >Đăng ký</button>
		</form>

		<div style="margin-left: 200px;">
			<p>Bạn đã có tài khoản? <a href="{{route('get_dangnhap')}}">Đăng nhập</a></p>
			
		</div>
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