<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function trangchu(){
    	$room=DB::table('room')
    		->join('location','room.location_id','=','location.location_id')
    		->join('img_room','room.room_id','=','img_room.room_id')
    		->groupBy('img_room.room_id')
    		->where('status',0)
            ->take(4)
            ->orderBy('room.room_id','DESC')
    		->get();
    		// dd($room);
    	return view('page.trangchu')
    			->with('room',$room);
    }	
}
