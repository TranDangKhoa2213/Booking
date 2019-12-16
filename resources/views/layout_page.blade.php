<!DOCTYPE html>
<html>

<head>
	<title>Trang chủ</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
		integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('public/css/style.css')}}">

		<link rel="stylesheet" type="text/css" href="{{asset('public/css/owl.carousel.css')}}">
		<link rel="stylesheet" type="text/css" href="{{asset('public/css/owl.theme.default.min.css')}}">

	<script type="text/javascript" src="js/myjs.js"></script>
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
		<a class="navbar-brand" href="{{route('trangchu')}}"><img src="{{asset('public/img/logo.png')}}" width="50px;"></a>
		<div class="collapse navbar-collapse" id="navbarCollapse">


			<div class="row">
				<div class="float-right">
					<ul class="navbar-nav mr-auto">
						<li class="nav-item" style="margin-left: 150px;">
							<form class="box-search-form" method="post" action="{{route('post_timkiem')}}">
								@csrf
								
								<div class="form-row">
									<div class="col">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i
														class="fas fa-map-marked-alt"></i></span>
											</div>
											<input type="text" class="form-control" placeholder="Nhập địa điểm" name="city" required="">
										</div>
									</div>
									<div class="col">
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text"><i
														class="fas fa-user-friends"></i></span>
											</div>
											<input type="number" class="form-control" placeholder="Số người" name="number_people" value="1">
										</div>
									</div>
									<div class="col">
										<button type="submit" class="btn btn-dark"><i
												class="fas fa-search"></i></button>

										
									</div>
								</div>
							</form>
							
						</li>
					</ul>
				</div>
			</div>
		</div>
	</nav>
	<nav class="navbar navbar-expand-md navbar-light fixed-top bg-light" style="margin-top: 80px;">
		<div class="mid-content" style="margin-left: 500px;">
			<a href="{{route('trangchu')}}">Trang chủ</a>
			@if(Session::get('username'))
			
			<div class="dropdown national">
				<a class="btn btn-secondary dropdown-toggle dropNational" href="#" role="button" id="dropdownMenuLink"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					{{Session::get('username')}}
				</a>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="margin-top: 15px; width: 220px;">
					@if(Session::get('user_key')==1)
					<p><a href="{{route('dashboard_user')}}">Quản lý khách hàng</a></p>
					<p>	<a href="{{route('dashboard_host')}}">Quản lý chủ nhà</a></p>
					@else
					<p><a href="{{route('dashboard_user')}}">Quản lý khách hàng</a></p>
					@endif
			
				<a href="{{route('thoatdangnhap')}}">Thoát</a>
				</div>
			</div>
			@else
			<a href="{{route('get_dangky')}}">Đăng ký</a>
			<a href="{{route('get_dangnhap')}}">Đăng nhập</a>
			@endif
			<div class="dropdown national">
				<a class="btn btn-secondary dropdown-toggle dropNational" href="#" role="button" id="dropdownMenuLink"
					data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					<i class="fas fa-globe-europe" style="padding: 0px 5px; color: green;"></i>Ngôn ngữ
				</a>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuLink" style="margin-top: 15px;">
					<a class="dropdown-item" href="#"><img src="{{asset('public/img/icon_vn.png')}}" class="img-icon-national">Tiếng Việt</a>
					<a class="dropdown-item" href="#"><img src="{{asset('public/img/icon_america.png')}}"class="img-icon-national">English</a>
				</div>
			</div>

		</div>
	</nav>	
	@yield('content_page')
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
<script type="text/javascript" src="{{asset('public/js/jquery.min.js')}}"></script>
<script type="text/javascript" src="{{asset('public/ckeditor/ckeditor.js')}}"></script>
<script> CKEDITOR.replace('editor1'); </script>
	<script type="text/javascript" src="{{asset('public/js/owl.carousel.js')}}"></script>
	<script type="text/javascript">
	$('.owl-carousel').owlCarousel({
    center: true,
    items:2,
    loop:true,
    margin:10,
    responsive:{
        600:{
            items:4
        }
    }
})
</script>

</html>