@extends('layout_admin')

@section('content_admin')
 <div class="container-fluid">
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sách phòng</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Tên phòng</th>
                    <th>Giá phòng</th>
                    <th>Số người</th>
                    <th>Loại phòng</th>
                    <th>Địa chỉ</th>
                    <th>Tên chủ nhà</th>
                    <th>Tình trạng</th>
                    <th>Chức năng</th>
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($room as $key => $data)
                  <tr>
                    <td>{{$data->room_name}}</td>
                    <td>{{number_format($data->room_price)}}</td>
                    <td>{{$data->number_people}}</td>
                    <td>{{$data->category_name}}</td>
                    <td>{{$data->city}}, {{$data->district}}, {{$data->street}}</td>
                    <td>{{$data->fullname}}</td>
                    <td>
                      @if($data->status==1)
                    <i class="fas fa-times-circle" style="color: red;"></i>
                      @else
                    <i class="fas fa-check-circle" style="color: green;"></i>
                      @endif
                    </td>
                    <td>
                    	<p><a href="{{route('admin.khoaphong',['id' => $data->room_id])}}">Khóa phòng</a></p>
                      <p><a href="{{route('admin.mophong',['id' => $data->room_id])}}">Mở phòng</a></p>
                    </td>
                  </tr>

                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
         
        </div>

      </div>
@endsection