<?php

namespace App\Http\Livewire;

use App\Models\Workspace;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddWorkspace extends Component
{
    use AuthorizesRequests;
    public $name , $description , $color , $visibility, $workspace , $workspaces;
    protected $listeners = ['setWorkspace'];


    public function mount(){
        $this->workspaces = Workspace::where('created_by','=',Auth::user()->id)->get();
    }
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
            'visibility' => 'required|in:P,PR,R',
            'workspace'=>'required'
        ],[],$pretty_names);
        if($this->workspace == 0 || $this->workspace == null){
            $this->workspace = null;
        }
        $wrkspc = new Workspace;
        $wrkspc->title = $this->name;
        $wrkspc->description = $this->description;
        $wrkspc->parent = $this->workspace;
        $wrkspc->color = $this->color;
        $wrkspc->visibility = $this->visibility;
        $wrkspc->created_by = Auth::id();
        $wrkspc->save();
        session()->flash('success', 'Workspace Added Successfully.');
        
        $this->emit('updateWorkspaceList');

        $this->resetCreateForm();
    }

    public function setWorkspace($selectValue){
        $this->workspace = $selectValue;
        
    }

    public function render()
    {
        return view('livewire.add-workspace');
    }
}
