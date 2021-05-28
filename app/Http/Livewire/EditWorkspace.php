<?php

namespace App\Http\Livewire;

use App\Models\Workspace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditWorkspace extends Component
{
    protected $listeners = ['editWs'=> 'getData'];
    public $wsId, $name, $description, $color, $visibility;

    public function render()
    {
        return view('livewire.edit-workspace');
    }

    public function getData($wsId){
        $this->wsId = $wsId;
        $this->mount();
    }

    public function resetUpdateForm(){
        $ws = Workspace::where('id',$this->wsId)->where('created_by','=',Auth::id())->first();
        if($this->wsId > 0 && $ws):
            $this->wsId = $ws->id;
            $this->description = $ws->description;
            $this->title = $ws->title;
            $this->color = $ws->color;
            $this->visibility = $ws->visibility;
        endif;
    }

    public function mount(){
        
        if($this->wsId > 0){
            $ws = Workspace::where('id',$this->wsId)->where('created_by','=',Auth::id())->first();
            if($ws){
                    $this->name = $ws->title;
                    $this->description = $ws->description;
                    $this->color = $ws->color;
                    $this->visibility = $ws->visibility;
            }else{
                return redirect()->route('add-tag');
            }
        }
    }

    public function update(){
        $pretty_names = [
            'name'  =>  'workspace name',
        ];
        
        $this->validate([
            'name' => 'required',
            'description' => 'max:500',
            'color' => 'required|in:purple,yellow,blue,green',
            'visibility' => 'required|in:P,PR,R',
        ],[],$pretty_names);
        
       $ws = Workspace::where('id',$this->wsId)->where('created_by','=',Auth::id())->first();
        if($this->wsId > 0 && $ws){
           $ws->title = $this->name;
           $ws->description = $this->description;
           $ws->color = $this->color;
           $ws->visibility = $this->visibility;
           $ws->created_by = Auth::id();
           $ws->update();
            session()->flash('success', 'Workspace Updated Successfully.');
            $this->emit('updateWorkspaceList');

            $this->resetUpdateForm();
        }else{
            session()->flash('error', 'Unable To Save. Select Workspace To Update.');
            $this->resetUpdateForm();
        }

    }

    public function delete(){
        if($this->wsId > 0){
            $res = Workspace::where('id',$this->wsId)->where('created_by','=',Auth::id())->delete();
            $res2 = Workspace::where('parent',$this->wsId)->where('created_by','=',Auth::id())->delete();
            if($res){
                $this->emit('updateWorkspaceList');
                session()->flash('success', 'Workspace Deleted Successfully.');
                $this->resetUpdateForm();
            }else{
                session()->flash('error', 'Unable To Delete Workspace. Try Again');
            }
        }else{
            session()->flash('error', 'Unable To Delete Workspace. Try Again');
        }
    }
}
