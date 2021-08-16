<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FollowUser extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function follower(){
        return $this->belongsTo(User::class,'follower_id','id');
    }

    public function follow(){
        return $this->belongsTo(User::class,'follow_id','id');
    }



}
