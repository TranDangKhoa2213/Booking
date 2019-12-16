@extends('layout_page')

@section('content_page')
<form action="{{route('datphong')}}" method="post">
	@csrf
<div class="owl-carousel owl-theme" style="margin-top: 80px;">
@foreach($img as $key => $data)
<div class="item img-room"><img src="{{asset('public/img/'.$data->path_img)}}"></div>
@endforeach
	
	
</div>


	<div class="content-index">	
	<div class="row">
		
		<div class="col-8">
			<div class="row">
				@include('thongbao')

			</div>
			<div class="row">
				<div class="alert alert-warning">
			        {{ session('comment') }}
			        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			            <span aria-hidden="true">&times;</span>
			        </button>
			    </div>
			</div>
			<div class="row">

				<h2>{{$room->room_name}}</h2>
				<input type="hidden" name="room_id" value="{{$room_id=$room->room_id}}">
			</div>
			<hr>
			<div class="row">
				<h5><i class="fas fa-map-marker-alt"></i> {{$location->city.', '.$location->district.', '.$location->street }}</h5>
			</div>
			<div class="row">
				<h5><i class="fas fa-home"></i> {{$category->category_name}}</h5>
			</div>
			<hr>
			<div class="row">
				<i class="fas fa-users"></i>Số khách: {{$room->number_people}}</h5>
			</div>
			<hr>
			<h5>Giới thiệu</h5>
			<div class="row">
				<p>{{$room->room_desc}}
				</p>
			</div>
			<hr>
			<h5>Danh sách ngày đặt phòng</h5>
			<div class="row">
				<table class="table" style="width: 50%;">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">Ngày đến</th>
				      <th scope="col">Ngày đi</th>
				    </tr>
				  </thead>
				  <tbody>
					@foreach($date_booking as $key => $data)
					 <tr>
				      <td>{{date('d-m-Y', strtotime($data->date_start))}}</td>
				      <td>{{date('d-m-Y', strtotime($data->date_end))}}</td>
				    </tr>
					@endforeach
				  </tbody>
				</table>

			</div>
			<hr>
		</div>
		<div class="col-4">
			<div class="content-profile-room" style="height: 500px;">
				<div class="row">
					<h5 style="padding: 30px 80px;">{{number_format($room->room_price)}} VNĐ/đêm</h5>
					<input type="hidden" name="room_price" value="{{($room->room_price)}}">
				</div>
				<div class="row">
					<div style="padding: 0px 80px">
					  <div class="form-group">
					    <label for="exampleInputEmail1">Ngày đến</label>
					    <input type="date" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="date_start" required="">
					  </div>
					  <div class="form-group">
					    <label for="exampleInputPassword1">Ngày đi</label>
					    <input type="date" class="form-control" id="exampleInputPassword1" name="date_end" required="">
					  </div>
			
							@if(!(Session::get('username')))
							<button type="submit" class="btn btn-warning fw-b" id="btn-book-room" disabled="">Đặt ngay</button>
							@else
							@if($check_host==0)
							<button type="submit" class="btn btn-warning fw-b" id="btn-book-room">Đặt ngay</button>
							@else
							<button type="submit" class="btn btn-warning fw-b" id="btn-book-room" disabled="">Đặt ngay</button>
							@endif
							@endif
							
					</div>	
				</div>
				<hr>

				<div class="row">
					<div class="col-3">
						<img src="{{asset('public/img/man-avatar.jpg')}}" class="avatar-host">
					</div>
						<div class="col-8">
						<b>{{$user->fullname}}</b>

					</div>
				</div>
			</div>
		</div>
	</div>	
	</div>
	</form>
	<div class="container" style="margin-top: -100px; margin-right: 300px; ">
		<h3>Bình luận đánh giá</h3>
		@foreach($comment as $key => $data)
		<div class="row" style="width: 75%;">
			<div class="col-3">
				<p><b>{{$data->fullname}}</b></p>
			</div>
			<div class="col-9 shadow-lg p-3 mb-5 bg-white rounded">
				<p class="" style="padding: 10px; border-radius: 10px;">{{$data->comment_content}}</p>
				@if($data->file)
				<p><img src="{{asset('public/img/'.$data->file)}}" style="width: 200px;"></p>
				@else

				@endif
			</div>
		</div>
		@endforeach
		<form action="{{route('post_binhluan')}}" method="post" enctype="multipart/form-data">
			@csrf
		<input type="hidden" name="room_id" value="{{$room_id}}">
		<div class="form-group" style="width: 75%;">
			@if($check_comment>0)
			<label for="exampleFormControlTextarea1">Hãy để lại bình luận của bạn</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content_comment"></textarea>
			@else
			<label for="exampleFormControlTextarea1">Bạn chưa đặt phòng này nên không thể bình luận</label>
			<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="content_comment" readonly="" required=""></textarea>
			@endif

		</div>
		<input type="file" name="file_img" >
		<br>
		
		@if(Session::get('username') && $check_comment>0)
		<button type="submit" class="btn btn-info" style="margin: 50px 0px;">Bình luận</button>
		@else
		<button type="submit" class="btn btn-info" style="margin: 50px 0px;" disabled="">Bình luận</button>
		@endif
	</form>
	</div>
	<script type="text/javascript">
	
	</script>
@endsection