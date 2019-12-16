<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('test', function() {
    $start="2019-12-7";
    $end="2019-12-10";
    $check_date=DB::table('date_booking')
    ->where(function ($query) use ($start) { //kiem tra start co nam trong khoang time ng da dat
        $query->where('date_start', '<=', $start);
        $query->where('date_end', '>=', $start);
        })
    ->orwhere(function ($query) use ($end) {//kiem tra end co nam trong khoang time ng da dat
        $query->where('date_start', '<=', $end);
        $query->where('date_end', '>=', $end);
        })
    ->get();

    if ($check_date==null) {
       dd('het phong');
    }else{
        $room=DB::table('date_booking')
        ->where('date_start','>',$start)
        ->orderBy('date_start', 'ASC')
        ->select('date_start')->first();
        // dd($room->date_start);
        if(strtotime($end)<strtotime($room->date_start)){
            dd('con phong');
        }else{
            dd('het phong');
        }
    }
    
});


Route::get('check', function() {

    dd($check_comment);
});


Route::get('trangchu', 'HomeController@trangchu')->name('trangchu');

Route::get('dangnhap', 'UserController@get_dangnhap')->name('get_dangnhap');
Route::post('dangnhap', 'UserController@post_dangnhap')->name('post_dangnhap');
Route::get('thoat', 'UserController@thoat')->name('thoatdangnhap');

Route::post('timkiem', 'RoomController@post_timkiem')->name('post_timkiem');

Route::get('diadiem/{location}', 'RoomController@diadiem')->name('diadiem');

Route::get('chitietphong/{room_id}', 'RoomController@chitietphong')->name('chitietphong');

Route::get('xacnhanthanhtoan', 'RoomController@xacnhanthanhtoan')->name('xacnhanthanhtoan');

Route::post('binhluan', function() {
    dd('tc');
})->name('binhluan');

Route::post('datphong', 'RoomController@datphong')->name('datphong');

Route::group(['prefix' => 'user'], function() {

	Route::get('dashboard', 'UserController@dashboard')->name('dashboard_user');

    Route::get('dangky', 'UserController@get_dangky')->name('get_dangky');
    Route::post('dangky', 'UserController@post_dangky')->name('post_dangky');

    Route::get('doimatkhau', 'UserController@get_doimatkhau')->name('get_doimatkhau');
    Route::post('doimatkhau', 'UserController@post_doimatkhau')->name('post_doimatkhau');

    Route::get('capnhatthongtin', 'UserController@get_capnhatthongtin')->name('get_capnhatthongtin');
    Route::post('capnhatthongtin', 'UserController@post_capnhatthongtin')->name('post_capnhatthongtin');

     Route::get('huyphong/{id}', 'UserController@huyphong')->name('huyphong');

     Route::get('dkchunha', 'UserController@get_dkchunha')->name('get_dkchunha');

     Route::get('xacnhandk', 'UserController@post_dkchunha')->name('post_dkchunha');

    Route::post('binhluan', 'UserController@post_binhluan')->name('post_binhluan');
    
});

Route::group(['prefix' => 'host'], function() {

    Route::get('dashboard', 'HostController@dashboard')->name('dashboard_host');

    Route::get('themphong', 'HostController@get_themphong')->name('get_themphong');
    Route::post('themphong', 'HostController@post_themphong')->name('post_themphong');

    Route::get('quanlyphong', 'HostController@get_quanlyphong')->name('get_quanlyphong');

    Route::get('xoaphong/{room_id}', 'HostController@xoaphong')->name('xoaphong');

    Route::post('suagiaphong/{room_id}', 'HostController@suagiaphong')->name('suagiaphong');

    Route::get('suathongtinphong/{room_id}', 'HostController@get_suathongtinphong')->name('get_suathongtinphong');
    Route::post('suathongtinphong/{room_id}', 'HostController@post_suathongtinphong')->name('post_suathongtinphong');


});

Route::group(['prefix' => 'admin'], function() {
    Route::get('dangnhap', 'AdminController@get_dangnhap')->name('admin.get.dangnhap');
    Route::post('dangnhap', 'AdminController@post_dangnhap')->name('admin.post.dangnhap');

    Route::get('dashboard', 'AdminController@dashboard')->name('admin.dashboard');
    Route::get('thoatdangnhap', 'AdminController@thoatdangnhap')->name('admin.thoatdangnhap');
    Route::get('dskhachhang', 'AdminController@dskhachhang')->name('admin.dskhachhang');

    Route::get('khoaphong/{id}', 'AdminController@khoaphong')->name('admin.khoaphong');
    Route::get('mophong/{id}', 'AdminController@mophong')->name('admin.mophong');

    Route::get('thongtinkh/{id}', 'AdminController@thongtinkh')->name('admin.thongtinkh');
});

