<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NoteSelect extends Component
{
    public function render()
    {
        return view('livewire.note-select');
    }

    public function selectAll(){
        $this->emit('noteSelectAll');
    }

    public function makePublic(){
        $this->emit('makeAllPublic');
    }

    public function makePrivate(){
        $this->emit('makeAllPrivate');
    }




}
