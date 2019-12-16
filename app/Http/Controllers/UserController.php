<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;
use DB;
use Session;
session_start();
class UserController extends Controller
{
    public function get_dangky(){
    	return view('user.dangky');
    }

    public function post_dangky(Request $request){
    	$data['username']=$request->username;
    	$data['password']=$request->password;
    	$data['fullname']=$request->fullname;
    	$data['email']=$request->email;
    	$data['address']=$request->address;
    	$data['user_key']=0;

    	$check_dangky=DB::table('user')->where('username',$request->username)->first();

    	if ($check_dangky) {
    		return redirect()->back()->with('thongbao','Tên tài khoản đã có người sử dụng!')->withInput($request->input());
    	}else{
    		DB::table('user')->insert($data);
    		return redirect()->back()->with('thongbao','Chúc mừng bạn đã đăng ký tài khoản thành công!');
    	}
    	
    }

    public function get_dangnhap(){
    	return view('user.dangnhap');
    }

    public function post_dangnhap(Request $request){
    	$user=DB::table('user')->where('username',$request->username)->where('password',$request->password)->first();
 
    	if ($user) {
            Session::put('username',$user->fullname);
            Session::put('user_id',$user->user_id);
            Session::put('user_key',$user->user_key);
        return redirect()->route('trangchu');
    		

    	}else{
    		return redirect()->back()->with('thongbao','Tài khoản hoặc mật khẩu không đúng mời bạn kiểm tra lại!');
    	}
    }

    public function thoat(){
        Session::forget('username');
        Session::forget('user_id');
        Session::forget('user_key');
        Session::forget('check_chunha');
        return redirect()->route('trangchu');
    }

    public function get_doimatkhau(){
        return view('user.doimatkhau');
    }

    public function dashboard(){

        $user_key=DB::table('user')->where('user_id',Session::get('user_id'))->select('user_key')->first();
        Session::get('check_chunha',$user_key);

        $detail_booking=DB::table('detail_booking')
                        ->join('room', 'detail_booking.room_id', '=', 'room.room_id')
                        ->where('date_end','>=',now())
                        ->where('detail_booking.user_id',Session::get('user_id'))
                        ->orderBy('detail_booking_id','DESC')
                        ->get();
                        
        return view('user.dashboard')->with('detail_booking',$detail_booking);
    }

    public function huyphong($id){

        $detail_booking=DB::table('detail_booking')->where('detail_booking_id',$id)->first();
        DB::table('datebooking')
        ->where('room_id',$detail_booking->room_id)
        ->where('date_start',$detail_booking->date_start)
        ->where('date_end',$detail_booking->date_end)
        ->delete();
        DB::table('detail_booking')->where('detail_booking_id',$id)->delete();
        return redirect()->back()->with('thongbao','Hủy phòng thành công!');
    }

    public function post_doimatkhau(Request $request){
        $mkc=$request->matkhaucu;
        $mkm=$request->matkhaumoi;
        $user_id=Session::get('user_id');

        if ($mkc==$mkm) {
            return redirect()->back()->with('thongbao','Mật khẩu cũ không được trùng mới mật khẩu mới!');
        }else{
            $user=DB::table('user')->where('user_id',$user_id)
                                    ->where('password',$mkc)->first();
            if(!$user){
            return redirect()->back()->with('thongbao','Mật khẩu cũ không đúng mời bạn kiểm tra lại!');
            }else{
                DB::table('user')->where('user_id',$user_id)->update(['password' => $mkm]);
                return redirect()->back()->with('thongbao','Đổi mật khẩu thành công!');
            }
        }

    }

    public function get_capnhatthongtin(){
        $user=DB::table('user')->where('user_id',Session::get('user_id'))->first();
        return view('user.capnhatthongtin')->with('user',$user);
    }

    public function post_capnhatthongtin(Request $request){
        DB::table('user')->where('user_id',Session::get('user_id'))
                        ->update([
                            'fullname' => $request->fullname,
                            'email' => $request->email,
                            'address' => $request->address
                        ]);

        return redirect()->back()->with('thongbao','Cập nhật thông tin thành công!');
    }

    public function get_dkchunha(){
        $check_dkcn=DB::table('user')->where('user_id',Session::get('user_id'))->where('user_key',1)->count();
        return view('user.dkchunha',['check_dkcn' => $check_dkcn]);
    }

    public function post_dkchunha(){
        DB::table('user')->where('user_id',Session::get('user_id'))->update(['user_key' => 1]);
        Session::put('user_key',1);
        return redirect()->back()->with('thongbao','Chúc mừng bạn đã đăng ký trở thành chủ nhà');
    }

    public function post_binhluan(Request $request){        
        $data['comment_content']=$request->content_comment;
        $data['room_id']=$request->room_id;
        $data['user_id']=Session::get('user_id');
        
        if ($request->file_img) {
            $filename=$request->file_img->getClientOriginalName();
            $data['file']=$filename;
            $request->file_img->move('public/img',$filename);
            DB::table('comment')->insert($data);
        } else {
            DB::table('comment')->insert($data);
        }
        
        return redirect()->back()->with('comment','Bạn đã đánh giá thành công');
    }


}
