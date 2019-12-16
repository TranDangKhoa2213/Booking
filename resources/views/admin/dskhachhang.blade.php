@extends('layout_admin')

@section('content_admin')
 <div class="container-fluid">
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Danh sách khách hàng</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Tên khách hàng</th>
                    <th>Email</th>
                    <th>Địa chỉ</th>
                     <th>Chức năng</th>
                  </tr>
                </thead>
               
                <tbody>
                  @foreach($user as $key => $data)
                  <tr>
                    <td><a href="" style="color: black;">{{$data->fullname}}</a></td>
                    <td>{{$data->email}}</td>
                    <td>{{$data->address}}</td>
                    <td><a href="{{route('admin.thongtinkh',['id' => $data->user_id])}}">Xem thông tin</a></td>
                  </tr>
                 @endforeach
                </tbody>
              </table>
            </div>
          </div>
         
        </div>

      </div>
@endsection