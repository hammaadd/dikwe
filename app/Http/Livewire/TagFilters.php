<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TagFilters extends Component
{
    public $visi_type;
    public function mount(){
        $this->visi_type = 'A';
    }
    public function render()
    {
        return view('livewire.tag-filters');
    }

    public function updateVisib($visib_type){
        $this->visi_type = $visib_type;
        $this->emit('updateVisibility',$visib_type);
    }

    public function updateColor($color){
        
    }
}
