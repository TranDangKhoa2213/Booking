<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
session_start();
class AdminController extends Controller
{
    public function get_dangnhap(){
    	return view('login_admin');
    }

    public function post_dangnhap(Request $request){
    	$admin=DB::table('admin')->where('username',$request->username)->where('password',$request->password)->first();
    	if ($admin) {
    		Session::put('admin',$admin->username);
    		return redirect()->route('admin.dashboard');
    	}
    	else{
    		return view('login_admin');
    	}
    }

    public function dashboard(){
    	$room=DB::table('room')
    			->join('category','room.category_id','=','category.category_id')
    			->join('location','room.location_id','=','location.location_id')
    			->join('user','room.user_id','=','user.user_id')
    			->get();
    
    	return view('admin.dashboard')->with('room',$room);
    }

    public function thoatdangnhap(){
    	Session::forget('admin');
    	return redirect()->route('admin.get.dangnhap');
    }

    public function dskhachhang(){
    	$user=DB::table('user')->get();
    	return view('admin.dskhachhang')->with('user',$user);
    }

    public function khoaphong($id)
    {
        DB::table('room')->where('room_id',$id)->update(['status' => 1]);
        return redirect()->back();
    }

    public function mophong($id)
    {
        DB::table('room')->where('room_id',$id)->update(['status' => 0]);
        return redirect()->back();
    }

    public function thongtinkh($id){
        $user=DB::table('user')->where('user_id',$id)->first();
        $room=DB::table('room')->where('user_id',$id)->get();
        return view('admin.thongtinkhachhang')->with('user',$user)->with('room',$room);
    }
}
