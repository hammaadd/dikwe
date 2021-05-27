<?php

namespace App\Http\Livewire;

use App\Models\Workspace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChildWorkspaces extends Component
{
    public $childs, $parent;

    public function mount($childs){
        $this->$childs = $childs;
        $this->parent = 0;
    }
    public function render()
    {
        if($this->parent != 0){
            $childs1 = Workspace::where('parent','=',$this->parent)->where('created_by','=',Auth::id())->get();
            if($childs1){
                return view('livewire.child-workspaces',['childs'=>$childs1]);
            }
            
        }
        return view('livewire.child-workspaces');
    }
    public function loadChilds($id){
        if($id > 0){
            $this->parent = $id;
        }
    }
}
