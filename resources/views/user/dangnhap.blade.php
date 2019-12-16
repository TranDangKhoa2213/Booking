@extends('layout_page')

@section('content_page')
	<div class="login-form">
		<div style="margin: 0 30px;">
			@include('thongbao')
		</div>
		<div class="title-login">
			<h2>Đăng nhập</h2>
		</div>
		<div class="login-with-sns">
			<a href="" class="login-sns fb"><i class="fab fa-facebook-f"></i>Đăng nhập với Facebook</a>
			<a href="" class="login-sns gg"><i class="fab fa-google"></i>Đăng nhập với Google</a>
		</div>
		<form class="content-form-login" action="{{route('post_dangnhap')}}" method="post">
			@csrf
			<div class="form-group">
	    	<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Tài khoản" required="" name="username">
	  		</div>
	  		  <div class="form-group">
    
		    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required="" name="password">
		  </div>
		  <button type="submit" class="btn btn-dark">Đăng nhập</button>
		</form>

		<div style="margin-left: 200px;">
			{{-- <p>Quên mật khẩu? <a href="">Nhấn vào đây</a></p> --}}
			<p>Bạn chưa có tài khoản? <a href="{{route('get_dangky')}}">Đăng ký</a></p>
		</div>
	</div>
@endsection