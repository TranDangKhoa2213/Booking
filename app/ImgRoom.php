<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImgRoom extends Model
{
    protected $table = 'img_room';
    protected $primaryKey = 'img_id';
    protected $fillable = ['path_img','room_id'];
    public $timestamp = false;
}
