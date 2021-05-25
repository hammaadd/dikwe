<?php

namespace App\Http\Livewire;

use App\Models\Workspace;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddWorkspace extends Component
{
    use AuthorizesRequests;
    public $name , $description , $color , $visibility, $workspace;

    private function resetCreateForm(){
        $this->name = '';
        $this->description = '';
    }
    
    public function store()
    {
        $pretty_names = [
            'name'  =>  'workspace name',
        ];
        
        $this->validate([
            'name' => 'required',
            'description' => 'max:500',
            'color' => 'required|in:purple,yellow,blue,green',
            'visibility' => 'required',
            'workspace'=>'required'
        ],[],$pretty_names);
        
        $wrkspc = new Workspace;
        $wrkspc->name = $this->name;
        $wrkspc->description = $this->description;
        $wrkspc->parent = $this->workspace;
        $wrkspc->visibility = $this->visibility;
        $wrkspc->user_id = Auth::id();
        $wrkspc->save();
        session()->flash('success', 'Workspace Added Successfully.');
        // $this->emit('updateTags');

        $this->resetCreateForm();
    }

    public function render()
    {
        return view('livewire.add-workspace');
    }
}
