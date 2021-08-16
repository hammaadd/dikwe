<?php

namespace App\Http\Livewire;

use App\Models\FollowUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class FollowerListNote extends Component
{
    use WithPagination;
    private $users;
    protected $listeners =['followerNoteSet'=>'followerNoteSet'];
    public $addedUsers = [];
    public function render()
    {
        
        $this->users = FollowUser::where('follow_id',Auth::id())->paginate(5);
        return view('livewire.follower-list-note',['users'=>$this->users]);
    } 

    // public function mount(){
    //     $this->users = FollowUser::where('follower_id',Auth::id())->paginate(1);
    // }

    

    public function addUser($id){
        if(!in_array($id, $this->addedUsers, true)){
            array_push($this->addedUsers,$id);
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'User added to list.']);
        }else{
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Unable to add to list.']);
        }
        $this->emit('followingNoteSet',$this->addedUsers);
        $this->emit('serviceNoteSet',$this->addedUsers);

    }

    public function removeUser($id){
        if(in_array($id, $this->addedUsers, true)){
            if (($key = array_search($id, $this->addedUsers)) !== false) {
                unset($this->addedUsers[$key]);
                $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'User removed from list successfully']);
            }else{
                $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Unable to remove from list.']);
            }
            
        }else{
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'No such user existed in list.']);
        }
        $this->emit('followingNoteSet',$this->addedUsers);
    }

    public function followerNoteSet($val){
        $this->addedUsers = $val;
        $this->emit('update-restricted-user-list-notes',$this->addedUsers);

    }
    
}
