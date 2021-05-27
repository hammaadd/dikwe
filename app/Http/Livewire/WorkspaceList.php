<?php

namespace App\Http\Livewire;

use App\Models\Workspace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WorkspaceList extends Component
{
    public $wrkspcs , $parent;
    public function render()
    {
        if($this->parent != 0){
            $childs = Workspace::where('parent','=',$this->parent)->where('created_by','=',Auth::id())->get();
            if($childs){
                return view('livewire.workspace-list',['childs'=>$childs]);
            }
            
        }
        
        return view('livewire.workspace-list');
    }

    public function mount(){
        $this->parent = 0;
        $this->wrkspcs = Workspace::where('created_by','=',Auth::id())->get();
    }

    public function loadChilds($id){
        if($id > 0){
            $this->parent = $id;
        }
    }


}
