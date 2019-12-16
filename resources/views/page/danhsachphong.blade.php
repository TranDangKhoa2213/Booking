@extends('layout_page')

@section('content_page')
	<div class="content-index">
		<div class="row" style="margin-top:50px;">
			<div class="col"><h3>Có {{$room->count()}} phòng tại {{$city}}</h3></div>
			<div class="col">
				
				<form class="form-inline" style="padding-left: 400px;">
					<div class="form-group">
			    <label for="exampleFormControlSelect1" style="margin-right: 20px;">Sắp xếp theo </label>
			    <select class="form-control" id="exampleFormControlSelect1">
			    	      <option>Giá tăng dần</option>
			      <option>Giá giảm dần</option>
			    </select>
			  </div>
			</form>
			</div>
		</div>
		<hr>
		<div class="row" style="margin-top:50px;">
		</div>
		<div class="row">
			<div class="card-deck">
				
				@foreach ($room as $key => $value)
		    		<div class="card room">
					<a href="{{route('chitietphong',['room_id' => $value->room_id])}}"><img src="{{asset('public/img/'.$value->path_img)}}" class="card-img-top" alt="..." style="width: 250px;"></a>
					<div class="card-body">
						<h5 class="card-title">{{$value->room_name}}</h5>
						<p class="card-text">{{$value->number_people}} Khách (Tối đa) </p>
						<p class="card-text">{{number_format($value->room_price) }} VNĐ/đêm</p>
						<p class="card-text"><small class="text-muted">{{$value->city}}, {{$value->district}},{{$value->street}}</small></p>
					</div>
				</div>
		    	@endforeach

			</div>
		</div>
		</div>
		<br><br>
		<nav aria-label="Page navigation example">
		  <ul class="pagination justify-content-center">
		    <li class="page-item disabled">
		      <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
		    </li>
		    <li class="page-item"><a class="page-link" href="#">1</a></li>
		    <li class="page-item"><a class="page-link" href="#">2</a></li>
		    <li class="page-item"><a class="page-link" href="#">3</a></li>
		    <li class="page-item">
		      <a class="page-link" href="#">Next</a>
		    </li>
		  </ul>
		</nav>
	</div>
@endsection