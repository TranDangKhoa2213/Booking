<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Arr;
session_start();

class RoomController extends Controller
{
    public function post_timkiem(Request $request){

    $room=DB::table('room')
    ->where('city','LIKE','%'.$request->city.'%')
    ->where('number_people','>=',$request->number_people)
    ->where('status',0)
    ->join('location','room.location_id','=','location.location_id')
    ->join('img_room','room.room_id','=','img_room.room_id')
    ->groupBy('img_room.room_id')
    ->orderBy('number_people','ASC')
    ->get();
    	
    	return view('page.danhsachphong')->with('room',$room)->with('city',$request->city);
    }

    public function chitietphong($room_id){
    	$room=DB::table('room')->where('room_id',$room_id)->first();
    	$location=DB::table('location')->where('location_id',$room->location_id)->first();
    	$category=DB::table('category')->where('category_id',$room->category_id)->first();
    	$user=DB::table('user')->where('user_id',$room->user_id)->first();
    	$img=DB::table('img_room')->where('room_id',$room_id)->get();
        $date_booking=DB::table('detail_booking')->where('room_id',$room_id)->orderBy('date_start', 'ASC')->get();
        $check_comment=DB::table('detail_booking')->where('room_id',$room_id)->where('user_id',Session::get('user_id'))->count();
        $comment=DB::table('comment')->where('room_id',$room_id)
                                    ->join('user','comment.user_id','=','user.user_id')->get();
        $check_host=DB::table('room')->where('room_id',$room_id)->where('user_id',Session::get('user_id'))->count();
    	return view('page.chitietphong')
    			->with(['room' => $room,
    					'location' => $location,
    					'category' => $category,
    					'user' => $user,
    					'img' => $img,
                        'date_booking' => $date_booking,
                        'check_comment' => $check_comment,
                        'comment' => $comment,
                        'check_host' => $check_host
    					]);
    }


    public function datphong(Request $request){
        $diff = abs(strtotime($request->date_start) - strtotime($request->date_end));
        $years   = floor($diff / (365*60*60*24)); 
        $months  = floor(($diff - $years * 365*60*60*24) / (30*60*60*24)); 
        $days    = floor(($diff - $years * 365*60*60*24 - $months*30*60*60*24)/ (60*60*24)+1);

        $room_id=$request->room_id;
        $start=$request->date_start;
        $end=$request->date_end;

        $room=DB::table('room')->where('room_id',$request->room_id)->first();
        $room_detail = array(
                                'room_id' => $request->room_id,
                                'room_name' => $room->room_name,
                                'date_start' => $request->date_start,
                                'date_end' => $request->date_end,
                                'days' => $days,
                                'sum_price' => $days*$request->room_price
                            );

        // dd($request->all());
        if ($start<now()) {
            return redirect()->back()->with('thongbao','Ngày đến không được nhỏ hơn ngày hiện tại');
        } else {
            if ($start>$end) {
                return redirect()->back()->with('thongbao','Ngày đến phải nhỏ hơn ngày đi');
            } else {
                //kiểm tra S và E có nằm trong khoảng thời gian có ng đặt hay chưa
                //NULL==> là S và E hợp lệ
                $check_date_booking=DB::table('detail_booking')                                  
                                    ->where(function ($q) use ($room_id,$start) {
                                        $q->where('room_id',$room_id);
                                        $q->where('date_start', '<', $start);
                                        $q->where('date_end', '>', $start);
                                        })
                                    ->orwhere(function ($q) use ($room_id,$end){
                                        $q->where('room_id',$room_id);
                                        $q->where('date_start', '<', $end);
                                        $q->where('date_end', '>', $end);
                                        })
                                    ->get();

                if (count($check_date_booking)!=0) {
                    return redirect()->back()->with('thongbao','Ngày này đã trùng với khách hàng khác');
                } else {
                    //kiểm tra xem S (form) phía sau nó có ai đặt phòng hay chưa 
                    //nếu phía sau S không có thời gian E (csdl) nào lớn hơn nó thì n có thể đặt
                    //kiểm tra S và E là ngày ngoài cùng sau n k có ng đặt
                    $check_date_start=DB::table('detail_booking')
                                    ->where('room_id',$room_id)
                                    ->where('date_end','>',$start)
                                    ->get();
                    if (count($check_date_start)==0) {
                       return view('page.thanhtoan')->with('room_detail',$room_detail);
                    } else {
                        //lấy ngày S(csdl) gần nhấn với ngày S(form)
                        $check_date=DB::table('detail_booking')
                                        ->where('room_id',$room_id)
                                        ->where('date_start','>',$start)
                                        ->orderBy('date_start', 'ASC')->first();
                        
                        //sau khi lấy đc check E(form) có nhỏ hơn ngày S vừa lấy ở trên          
                        if (strtotime($end)<strtotime($check_date->date_start)) {
                            return view('page.thanhtoan')->with('room_detail',$room_detail);
                        } else {
                            return redirect()->back()->with('thongbao','Ngày này đã trùng với khách hàng khác');
                        }
                    } 
                }   
            }
        } 
    }

    public function xacnhanthanhtoan(Request $request){

        // dd($request->all());
        $data['room_id']=$request->room_id;
        $data['user_id']=Session::get('user_id');
        $data['payment_id']=$request->radio;
        $data['date_start']=$request->date_start;
        $data['date_end']=$request->date_end;
        $data['number_date_booking']=$request->days;
        $data['price']=$request->sum_price;

     


        DB::table('detail_booking')->insert($data);

        return redirect()->route('trangchu');
    }

    public function diadiem($location){

    $room=DB::table('room')
    ->where('city','LIKE','%'.$location.'%')
    ->where('status',0)
    ->join('location','room.location_id','=','location.location_id')
    ->join('img_room','room.room_id','=','img_room.room_id')
    ->groupBy('img_room.room_id')
    ->get();
        
        return view('page.danhsachphong')->with('room',$room)->with('city',$location);
    }
}
