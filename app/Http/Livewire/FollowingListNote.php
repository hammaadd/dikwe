<?php

namespace App\Http\Livewire;

use App\Models\FollowUser;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;
class FollowingListNote extends Component
{
    use WithPagination;
    protected $listeners =['refereshNoteFollowing'=>'refereshNoteFollowing','followingNoteSet'=>'followingNoteSet'];
    private $users;
    public $addedUsers = [];
    public function render()
    {
        
        $this->users = FollowUser::where('follower_id',Auth::id())->paginate(5);
        return view('livewire.following-list-note',['users'=>$this->users]);
    } 

    // public function mount(){
    //     $this->users = FollowUser::where('follower_id',Auth::id())->paginate(1);
    // }

    public function refereshNoteFollowing(){
        $this->mount();
    }

    public function addUser($id){
        if(!in_array($id, $this->addedUsers, true)){
            array_push($this->addedUsers,$id);
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'User added to list.']);
        }else{
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Unable to add to list.']);
        }
        //Call to follower component for syncing the selected users
        $this->emit('followerNoteSet',$this->addedUsers);
        //Call to service component for syncing the selected users
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
        //Call to follower component for syncing the selected users
        $this->emit('followerNoteSet',$this->addedUsers);
        //Call to service component for syncing the selected users
        $this->emit('serviceNoteSet',$this->addedUsers);

    }

    public function followingNoteSet($val){
        $this->addedUsers = $val;
        $this->emit('update-restricted-user-list-notes',$this->addedUsers);
    }






}
