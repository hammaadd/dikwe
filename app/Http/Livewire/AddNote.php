<?php

namespace App\Http\Livewire;

use Livewire\Component;

class AddNote extends Component
{
    public $color,$title, $description;
    protected $listeners = ['passMoreInfo'=> 'passMoreInfo'];
    public function render()
    {
        return view('livewire.add-note');
    }

    public function moreInfo(){
        $this->emit('showMoreInfo',$this->title, $this->description,$this->color);
    }

    public function passMoreInfo( $title,$description,$color){
        
        $this->title = $title;
        $this->description = $description;
        $this->color = $color;  
    
    }

    public function store(){
        
    }
}
