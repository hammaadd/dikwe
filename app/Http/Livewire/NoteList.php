<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NoteList extends Component
{

    protected $listeners = ['updateNotes' => 'render','updateNoteVisibility'=>'updateVisiblityOfNotes','updateNoteColor'=>'updateVisiblityOfNotes'];
    public $tags, $visi_type = null, $color = null,$tagId;
    protected  $nott;

    public function render()
    {
        return view('livewire.note-list');
    }

    public function updateVisiblityOfNotes($visi_type,$color){
        $this->visi_type = $visi_type;
        $this->color = $color;
        $colors = array('purple','yellow','blue','green');
        $nott = Note::query();
        $nott->where('status','=','active')
            ->limit(5)
            ->orderBy('created_at','DESC')
            ->where('user_id',Auth::id());
        if($this->visi_type=='A' || $this->visi_type == null){
            
        }else{
            $nott->where('visibility','=',$visi_type);
        }

        if(in_array($color, $colors)){
            $nott->where('color','=',$color);
        }


        $this->tags = $nott->get();
        
    }
}
