@extends('layout_page')

@section('content_page')
	<div class="content-index">
	<form action="{{route('xacnhanthanhtoan')}}" action="get">
		@csrf

	
			<div class="row">
		<h3>Thanh toán</h3>
	</div>
	
	<div class="row">
		<div class="col">
		  <div class="form-group row">
		    <label for="staticEmail" class="col-sm-3 col-form-label"><b>Tên phòng</b></label>
		    <div class="col-sm-9">
		      <input type="text" readonly class="form-control-plaintext" id="staticEmail" 
		      value="{{$room_detail['room_name']}}" name="room_name">
		      <input type="hidden" name="room_id" value="{{$room_detail['room_id']}}">
		    </div>
		  </div>

		   <div class="form-group row">
		    <label for="staticEmail" class="col-sm-3 col-form-label"><b>Ngày đến</b></label>
		    <div class="col-sm-9">
		      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$room_detail['date_start']}}" name="date_start">
		    </div>
		  </div>

		   <div class="form-group row">
		    <label for="staticEmail" class="col-sm-3 col-form-label"><b>Ngày đi</b></label>
		    <div class="col-sm-9">
		      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$room_detail['date_end']}}" name="date_end">
		    </div>
		  </div>

		   <div class="form-group row">
		    <label for="staticEmail" class="col-sm-3 col-form-label"><b>Tổng số ngày</b></label>
		    <div class="col-sm-9">
		      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{$room_detail['days']}}" name="days">
		    </div>
		  </div>

		   <div class="form-group row">
		    <label for="staticEmail" class="col-sm-3 col-form-label"><b>Số tiền phải thanh toán</b></label>
		    <div class="col-sm-9">
		      <input type="text" readonly class="form-control-plaintext" id="staticEmail" value="{{number_format($room_detail['sum_price'])}}" >
		      <input type="hidden" name="sum_price" value="{{$room_detail['sum_price']}}">
		    </div>
		  </div>
		</div>
		<div class="col">
			<h5>Vui lòng chọn phương thức thanh toán</h5>
			<label class="container-checkout-list">Thanh toán bằng thẻ quốc tế Visa,Master,JBC
			  <input type="radio" checked="checked" name="radio" value="1">
			  <span class="checkmark"></span>
			</label>
			<label class="container-checkout-list">OnePay Visa,Master,JBC
			  <input type="radio" name="radio" value="2">
			  <span class="checkmark"></span>
			</label>
			<label class="container-checkout-list">Thẻ ATM nội địa / Internet Banking
			  <input type="radio" name="radio" value="3">
			  <span class="checkmark"></span>
			</label>
			<label class="container-checkout-list">Chuyển khoản ngân hàng
			  <input type="radio" name="radio" value="4">
			  <span class="checkmark"></span>
			</label>
		</div>
	</div>
	<button type="submit" class="btn btn-dark btn-checkout" style="margin-left: 550px;">Xác nhận</button>
		</form>
	</div>
@endsection