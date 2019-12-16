<!DOCTYPE html>
<html>

<head>
	<title>Trang Admin</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css')}}">
	<script type="text/javascript" src="{{asset('public/js/myjs.js')}}"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
		integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
		integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
		crossorigin="anonymous"></script>
	<script src="https://kit.fontawesome.com/1a5f53ba81.js" crossorigin="anonymous"></script>
</head>

<body>

	<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
		<a class="navbar-brand" href="Index.html"><img src="{{asset('public/img/logo.png')}}" width="50px;"></a>
		
		<h3 style="margin-left: 420px">Quản lý tài khoản chủ nhà</h3>
		<div style="margin-left: 400px">
		<span>	<h5>{{Session::get('username')}}</h5>
			<a href="{{route('thoatdangnhap')}}">Thoát</a>
			<a href="{{route('trangchu')}}">Quay về trang chủ</a></span>

		</div>
		</div>
	</nav>

	<div class="navbar-dashboard">
	  <a href="{{route('dashboard_host')}}">Bảng thông tin</a>
	  <a href="{{route('get_quanlyphong')}}">Quản lý phòng</a>
	
	</div>

	@yield('content_host')

	<footer id="sticky-footer" class="py-4 bg-dark text-white-50">
		<div class="row">
			<div class="col" style="margin-left: 0px;">
				<div class="row">
					<div class="col-1 contact">
						<i class="far fa-compass"></i>
					</div>
					<div class="col content-contact">
						<h5>546 Nguyễn Thái Học</h5>
					</div>

				</div>
				<div class="row">
					<div class="col-1 contact">
						<i class="fas fa-phone-alt"></i>
					</div>
					<div class="col content-contact">
						<h5>05.2548.3658</h5>
					</div>
				</div>
				<div class="row">
					<div class="col-1 contact">
						<i class="far fa-envelope"></i>
					</div>
					<div class="col content-contact">
						<h5>hotro@gmail.com</h5>
					</div>
				</div>
			</div>
			<div class="col">
				<div class="row">
					<h3>Thông tin về công ty</h3>
				</div>
				<div class="row">
					<p>Hệ thống đặt phòng giúp bạn giảm thời gian đặt của phương pháp truyền thống, thông qua hệ thống
						này bạn có thể đặt phòng ở mọi lúc mọi nơi chỉ cần thiết bị của bạn kết nối với Internet</p>
				</div>
				<div class="row footer-sns">
					<i class="fab fa-facebook-square"></i>
					<i class="fab fa-twitter-square"></i>
					<i class="fab fa-google-plus-square"></i>
				</div>
			</div>
		</div>
	</footer>
</body>


</html>s