<?php

namespace App\Http\Livewire;

use App\Models\Workspace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WorkspaceList extends Component
{
    public $wrkspcs , $parent,$wsId;
    public $visi_type = null, $color = null;
    protected $listeners = ['updateWorkspaceList' => 'updateWorkspace','updateWsVisibility'=>'updateVisiblityOfWs','updateWsColor'=>'updateVisiblityOfWs'];
    public function render()
    {
        if($this->visi_type != null || $this->color !=null){
            $this->updateVisiblityOfWs($this->visi_type,$this->color);
        }

        if($this->parent != 0){
            $childs = Workspace::where('parent','=',$this->parent)->where('created_by','=',Auth::id())->get();
            if($childs){
                return view('livewire.workspace-list',['childs'=>$childs]);
            }
            
        }
        
        return view('livewire.workspace-list');
    }

    public function updateVisiblityOfWs($visi_type,$color){
        $this->visi_type = $visi_type;
        $this->color = $color;
        // $this->wrkspcs = Workspace::where('created_by','=',Auth::id())->where('parent','=',null)->limit(5)->orderBy('created_at','DESC')->get();
        $colors = array('purple','yellow','blue','green');
        $wss = Workspace::query();
        $wss->where('status','=','active')
            ->limit(5)
            ->where('parent','=',null)
            ->orderBy('created_at','DESC')
            ->where('created_by',Auth::id());
        if($this->visi_type=='A' || $this->visi_type == null){
            
        }else{
            $wss->where('visibility','=',$visi_type);
        }

        if(in_array($color, $colors)){
            $wss->where('color','=',$color);
        }


        $this->wrkspcs = $wss->get();
        
    }

    public function mount(){
        $this->updateVisiblityOfWs('A','A');
        $this->parent = 0;
        //$this->wrkspcs = Workspace::where('created_by','=',Auth::id())->where('parent','=',null)->limit(5)->orderBy('created_at','DESC')->get();
    }

    public function updateWorkspace(){
        $this->wrkspcs = Workspace::where('created_by','=',Auth::id())->where('parent','=',null)->limit(5)->orderBy('created_at','DESC')->get();
    }

    public function loadChilds($id){
        if($id > 0){
            $this->parent = $id;
        }
    }

    public function passWsId($id){
        $this->wsId = $id;
        $this->emit('editWs',$id);
    }


}
