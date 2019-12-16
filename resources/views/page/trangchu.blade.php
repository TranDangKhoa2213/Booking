@extends('layout_page')
@section('content_page')

	<div class="content-index">
		<div class="row">
			<h3>Không gian ưa thích</h3>
		</div>
		<div class="row">
			<div class="card-deck">
				<div class="card category-room">
					<a href="">
						<img src="{{asset('public/img/canho.jpg')}}" class="card-img-top" alt="..." width="200px" height="150px">
						<div class="card-body">
							<h5 class="card-title">Căn hộ</h5>
						</div>
					</a>
				</div>
				<div class="card category-room">
					<a href="">
						<img src="{{asset('public/img/bietthu.jpg')}}" class="card-img-top" alt="..." width="200px" height="150px">
						<div class="card-body">
							<h5 class="card-title">Biệt thự</h5>
						</div>
					</a>
				</div>
				<div class="card category-room">
					<a href="">
						<img src="{{asset('public/img/nharieng.jpg')}}" class="card-img-top" alt="..." width="200px" height="150px">
						<div class="card-body">
							<h5 class="card-title">Nhà riêng</h5>
						</div>
					</a>
				</div>
				<div class="card category-room">
					<a href="">
						<img src="{{asset('public/img/studio.jpg')}}" class="card-img-top" alt="..." width="200px" height="150px">
						<div class="card-body">
							<h5 class="card-title">Studio</h5>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:50px;">
			<h3>Địa điểm nổi bật</h3>
		</div>
		<div class="row">
			<div class="card-deck">
				<div class="card location">
					<img src="{{asset('public/img/saigon.jpg')}}" class="card-img-top" alt="...">
					<div class="name-location">
						<a href="{{route('diadiem',['location' => 'Hồ Chí Minh'])}}">TP.Hồ Chí Minh</a>
					</div>
				</div>
				<div class="card location">
				
					<img src="{{asset('public/img/hanoi.jpg')}}" class="card-img-top" alt="...">
					<div class="name-location">
						<a href="{{route('diadiem',['location' => 'Hà Nội'])}}">Hà Nội</a>
					</div>
			
				</div>
				<div class="card location">
					<img src="{{asset('public/img/danang.jpg')}}" class="card-img-top" alt="...">
					<div class="name-location">
						<a href="{{route('diadiem',['location' => 'Đà Nẵng'])}}">Đà Nẵng</a>
					</div>
				</div>
				<div class="card location">
					<img src="{{asset('public/img/dalat.jpg')}}" class="card-img-top" alt="...">
					<div class="name-location">
						<a href="{{route('diadiem',['location' => 'Đà Lạt'])}}">Đà Lạt</a>
					</div>
				</div>
				<div class="card location">
					<img src="{{asset('public/img/vungtau.jpg')}}" class="card-img-top" alt="...">
					<div class="name-location">
						<a href="{{route('diadiem',['location' => 'Vũng tàu'])}}">Vũng tàu</a>
					</div>
				</div>
			</div>
		</div>
		<div class="row" style="margin-top:50px;">
			<div class="col">
				<h3>Phòng mới mỗi ngày</h3>
			</div>
			<div class="col-1" style="float: right;">
				<a href="">Xem thêm</a>
			</div>
		</div>
		
		<div class="row">
			@foreach($room as $key => $data)
			<div class="card-deck" style="padding-right: 20px; ">
				<div class="card room">
					<a href="{{route('chitietphong',['room_id' => $data->room_id])}}"><img src="{{asset('public/img/'.$data->path_img)}}" class="card-img-top" alt="..." style="width: 250px;"></a>
					<div class="card-body">
						<h5 class="card-title">{{$data->room_name}}</h5>
						<p class="card-text">{{$data->number_people}} Người</p>
						<p class="card-text">{{number_format($data->room_price)}}VNĐ/đêm</p>
						<p class="card-text"><small class="text-muted">{{$data->city}}, {{$data->district}}, {{$data->street}}</small></p>
					</div>
				</div>
			</div>
				@endforeach
		</div>
	
	</div>

	@endsection