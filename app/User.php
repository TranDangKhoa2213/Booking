<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'user';
    protected $primaryKey = 'user_id';
    protected $fillable = ['username','password','fullname','email','address'];
    public $timestamp = false;
}
