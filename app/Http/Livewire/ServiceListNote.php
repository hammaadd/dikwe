<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class ServiceListNote extends Component
{
    use WithPagination;
    protected $listeners =['serviceNoteSet'=>'serviceNoteSet'];
    private $users;
    public $addedUsers = [],$search;
    public function render()
    {
        
        if(empty($this->search)){
            $this->users = User::paginate(5);
        }elseif(!empty($this->search)){
            $this->updatedSearch();
            
        }
        return view('livewire.service-list-note',['users'=>$this->users]);
    } 

    public function mount(){
        $this->users = User::paginate(5);
    }

    public function addUser($id){
        if(!in_array($id, $this->addedUsers, true)){
            array_push($this->addedUsers,$id);
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'User added to list.']);
        }else{
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Unable to add to list.']);
        }
        $this->emit('followerNoteSet',$this->addedUsers);
        $this->emit('followingNoteSet',$this->addedUsers);
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
        $this->emit('followerNoteSet',$this->addedUsers);
        $this->emit('followingNoteSet',$this->addedUsers);
    }

    public function serviceNoteSet($val){
        $this->addedUsers = $val;
        $this->emit('update-restricted-user-list-notes',$this->addedUsers);
    }

    public function resetSearch() {  
        $this->search = '';
        $this->results = [];
}

    public function updatedSearch(){
        if(!empty($this->search)){
            $this->users = User::where('name','like',$this->search.'%')->take(5)->get();
            $results2 = User::where('name','like','%'.$this->search.'%')->take(5)->get();
            $this->users = $this->users->merge($results2);
            
        }else{
            $this->mount();
        }
    }
}
