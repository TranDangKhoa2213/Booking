@extends('layout_host')

@section('content_host')
<div class="content-dashboard">
		<div class="row">
			<button type="button" class="btn btn-info" style="margin: 20px; "><a href="{{route('get_themphong')}}" style="color:white;"><b>+ Thêm phòng mới</b></a></button>
		</div>
		<div class="row ">
			<div class="col">
				<h3>Hôm nay</h3>
			</div>
			<div class="col-3" style="margin-right: 370px;">
				<div class="input-group mb-3">
				<div class="input-group-prepend">
					<span class="input-group-text"><i class="far fa-calendar-alt"></i></span>
				</div>
				<input type="date" class="form-control"  value="<?php now(); ?>">
				</div>
			</div>
		</div>
			<div class="row">
				<div class="col-8 shadow-lg p-3 mb-5 bg-white rounded">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Khách nhận phòng</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Khách trả phòng</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Số phòng đang đặt</a>
					  </li>
					</ul>
					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">Không có phòng </div>
					  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
					  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
					</div>
				</div>
				<div class="col-4">
					<div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem; margin: 0px 0;">
					  <div class="card-header">
					   Thống kê
					  </div>
					  <ul class="list-group list-group-flush">
					    <li class="list-group-item"><b>Tổng số đặt phòng tháng 11:</b> 10</li>
					  </ul>
					</div>
					<div class="card shadow-lg p-3 mb-5 bg-white rounded" style="width: 18rem;">
					  <div class="card-header">
					   Tin nhắn gần đây
					  </div>
					  <ul class="list-group list-group-flush">
					    <li class="list-group-item"><b>Tin nhắn đang chờ:</b> 20</li>
					  </ul>
					</div>
				</div>
			</div>

	</div>
@endsection