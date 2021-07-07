<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NoteFilter extends Component
{

    public $visi_type,$color,$notes_set = 'M';
    public function mount(){
        $this->visi_type = 'A';
        $this->color = 'A';
        $this->notes_set = 'M';
    }

    public function render()
    {
        return view('livewire.note-filter');
    }


    public function updateVisib($visib_type){
        $this->visi_type = $visib_type;
        $this->emit('updateNoteVisibility',$visib_type,$this->color);
    }

    public function updateColor($color){
        $this->color = $color;
        $this->emit('updateNoteColor',$this->visi_type,$color);
    }

    public function notesSet($notesSet){
        $this->notes_set = $notesSet;
        $this->emit('updateNoteSet',$this->notes_set);
    }

    

}
