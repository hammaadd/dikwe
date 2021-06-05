<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddNote extends Component
{
    public $color,$title, $description;
    public function render()
    {
        return view('livewire.add-note');
    }

    public function moreInfo(){
        $this->emit('showMoreInfo',$this->title, $this->description,$this->color);
    }
}
