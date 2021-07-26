<?php

namespace App\Http\Livewire;
use App\Models\FollowUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FollowUnfollowUser extends Component
{
    public $user;

    public function mount($user){
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.follow-unfollow-user');
    }

    public function followUser($fId){
        if(Auth::id()){

                FollowUser::updateOrCreate(
                    ['follow_id'=>$fId,'follower_id'=>Auth::id()]
                );
        }
    }

    public function unfollowUser($fId){
        if(Auth::id()){
            FollowUser::where('follow_id',$fId)->where('follower_id',Auth::id())->delete();
        }
    }
}
