<?php

namespace App\Http\Livewire;

use App\Models\FollowUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class RestrictedNoteModal extends Component
{
    public $users;
    public function render()
    {
        return view('livewire.restricted-note-modal');
    }

    public function mount(){
        // $this->users = Auth::user()->following;
        //dd($this->users[0]->follow);
        //$this->users = FollowUser::where('follower_id',Auth::id())->paginate(4);
        //dd($this->users[0]->follow);
    }

    public function refereshFollowing(){
        $this->emit('refereshNoteFollowing');
        
    }

    





}
