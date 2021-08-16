<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable implements MustVerifyEmail
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'firstname',
        'lastname',
        'gender',
        'phone_no',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function country(){
        return $this->belongsTo(Country::class,'country_id');
    }
    public function sociallinks(){
        return $this->hasMany(SocialLink::class,'user_id');
    }

    public function reactions(){
        return $this->hasMany(Reaction::class,'reacted_by');
    }

    public function likedNotes(){
        return $this->reactions->where('reaction_type','like');
    }

    public function tags(){
        return $this->hasMany(Tag::class,'user_id');
    }

    public function notes(){
        return $this->hasMany(Note::class, 'created_by');
    }

    public function total_notes(){
        return $this->notes->count();
    }

    public function following(){
        return $this->hasMany(FollowUser::class, 'follower_id');
    }

    public function isFollowing($user){
        return $this->following->where('follow_id','=',$user)->where('follower_id','=',Auth::id())->count();
    }

    public function totalFollowing(){
        return $this->following->count();
    }

    public function follower(){
        return $this->hasMany(FollowUser::class, 'follow_id');
    }

    public function totalFollower(){
        return $this->follower->count();
    }

}





