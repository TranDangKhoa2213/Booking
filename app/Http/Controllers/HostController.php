<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\ImgRoom;
session_start();

class HostController extends Controller
{
    public function get_dangnhap_host(){
        return view('host.dangnhap');
    }

    public function post_dangnhap_host(Request $request){
            $user=DB::table('user')->where('username',$request->username)->where('password',$request->password)->first();
        if ($user) {
            Session::put('username',$user->fullname);
            return redirect()->route('trangchu');
        }else{
            return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không đúng mời bạn kiểm tra lại!');
        }
    }

    public function dashboard(){
        return view('host.dashboard');
    }

    public function get_themphong(){
        return view('host.themphong')->with('category',DB::table('category')->get());
    }

    public function post_themphong(Request $request){
        $data_location['city']=$request->city;
        $data_location['district']=$request->district;
        $data_location['street']=$request->street;
   
        //them dia diem
        DB::table('location')->insert($data_location);
        $location=DB::table('location')->orderBy('location_id', 'desc')->first(); //lay id dia diem vua them
       

        $data_room['room_name']=$request->room_name;
        $data_room['room_price']=$request->room_price;
        $data_room['room_desc']=$request->room_desc;
        $data_room['number_people']=$request->number_people;
        $data_room['category_id']=$request->category_id;
        $data_room['location_id']=$location->location_id; //them location_id vao bang room 
        $data_room['user_id']=Session::get('user_id');

        DB::table('room')->insert($data_room); //them room

        $room=DB::table('room')->orderBy('room_id', 'desc')->first();    
     

        if ($request->hasFile('file')) { //kiem tra co ton tai request file nao k
            
            foreach ($request->file as $file) {
                $filename=$file->getClientOriginalName(); //lay name file
                $file->move('public/img',$filename); //luu vao thu muc public/img
             
                DB::table('img_room')->insert(['path_img' => $filename, 'room_id' => $room->room_id]);
                //them hinh anh va id room da them o tren
            }
        }

           return redirect()->back()->with('thongbao','Bạn đã thêm phòng thành công!');
    }

    public function get_quanlyphong(){
        $room=DB::table('room')->get();
        return view('host.quanlyphong')->with('room',$room);
    }

    public function xoaphong($room_id){
        $check_booking=DB::table('detail_booking')->where('room_id',$room_id)
                    ->where('date_end','>',now())->first();
        $date=date('d-m-Y', strtotime($check_booking->date_end));
        if($check_booking){
              return redirect()->back()->with('thongbao','Phòng đang có người đặt vui lòng chờ đến hết ngày: '.$date.' bạn mới có thể hủy phòng');
        }else{
        DB::table('img_room')->where('room_id',$room_id)->delete();
        DB::table('room')->where('room_id',$room_id)->delete();
        return redirect()->back()->with('thongbao','Đã xóa phòng thanh công!');
        }

    }

    public function suagiaphong($room_id,Request $request){
        dd($request->giaphong);
        DB::table('room')->where('room_id',$room_id)->update(['room_price' => $request->giaphong]);
    }

    public function get_suathongtinphong($room_id){
        $room=DB::table('room')
                ->where('room_id',$room_id)
                ->join('category','room.category_id','=','category.category_id')
                ->join('location','room.location_id','=','location.location_id')
                ->first();
        // dd($room->street);
        return view('host.suathongtinphong')
                ->with('room',$room)
                ->with('category',DB::table('category')->get());
    }

    public function post_suathongtinphong($room_id, Request $request){
        $get_location_id=DB::table('room')->where('room_id',$room_id)->first();

        $data_location['city']=$request->city;
        $data_location['district']=$request->district;
        $data_location['street']=$request->street;
        DB::table('location')->where('location_id',$get_location_id->location_id)->update($data_location);
      
        $data_room['room_name']=$request->room_name;
        $data_room['room_price']=$request->room_price;
        $data_room['room_desc']=$request->room_desc;
        $data_room['number_people']=$request->number_people;
        $data_room['category_id']=$request->category_id;

        DB::table('room')->where('room_id',$room_id)->update($data_room);

        return redirect()->back()->with('thongbao','Sửa thông tin phòng thành công!');
    }
}
