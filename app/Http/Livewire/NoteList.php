<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NoteList extends Component
{

    protected $listeners = ['updateNotes' => 'render','updateNoteVisibility'=>'updateVisiblityOfNotes','updateNoteColor'=>'updateVisiblityOfNotes'];
    public $notes, $visi_type = null, $color = null,$noteId;
    protected  $nott;

    public function render()
    {
        if($this->visi_type != null || $this->color !=null){
            $this->updateVisiblityOfNotes($this->visi_type,$this->color);
        }
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
            ->where('created_by',Auth::id());
        if($this->visi_type=='A' || $this->visi_type == null){
            
        }else{
            $nott->where('visibility','=',$visi_type);
        }

        if(in_array($color, $colors)){
            $nott->where('color','=',$color);
        }


        $this->notes = $nott->get();
        
    }

    public function mount(){
        $this->updateVisiblityOfNotes('A','A');
    }

    public function passNoteId($noteId){
        $this->noteId = $noteId;
        $this->emit('editNote',$noteId);
    }

    
}
