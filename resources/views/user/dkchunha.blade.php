@extends('layout_user')

@section('content_user')
<div style="margin: 200px 100px;">
<h3>Đăng ký thành chủ nhà</h3>
@include('thongbao')
@if($check_dkcn>0)
<button class="btn btn-info" disabled=""><a href="#" style="color:white;">Xác nhận</a></button>
@else
<button class="btn btn-info"><a href="{{route('post_dkchunha')}}" style="color:white;">Xác nhận</a></button>
@endif
</div>
@endsection