<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NoteSearchGridButtons extends Component
{
    public $noteStyle ='grid';
    public function render()
    {
        return view('livewire.note-search-grid-buttons');
    }

    public function updateNoteStyle($style){
        //dd($style);
        $this->noteStyle = $style;
        $this->emit('setNoteStyle',$style);
    }
}
