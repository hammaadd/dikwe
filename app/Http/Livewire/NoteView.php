<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NoteView extends Component
{
    public $noteId;
    public function render()
    {
        return view('livewire.note-view');
    }

    public function show($id){
        $this->dispatchBrowserEvent('showView');
        $this->noteId = $id;
    }



}
