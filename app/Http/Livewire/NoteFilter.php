<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Livewire\Component;

class NoteFilter extends Component
{
    protected $listeners = ['resetSearch'=>'resetSearch'];

    public $visi_type,$color,$notes_set = 'M', $search,$results,$isVisible, $all_checked;

    
    public function mount(){
        $this->visi_type = 'A';
        $this->color = 'A';
        $this->notes_set = 'M';
        $this->isVisible = false;
        $this->all_checked = false;
        $this->resetSearch();
    }

    public function resetSearch() {  
        $this->search = '';
        $this->results = [];
}

    public function render()
    {
        return view('livewire.note-filter');
    }


    public function updateVisib($visib_type){
        $this->emit('updateNoteVisibility',$visib_type);
        $this->visi_type = $visib_type;
        
    }

    public function updateColor($color){
        $this->color = $color;
        $this->emit('updateNoteColor',$color);
    }

    public function notesSet($notesSet){
        $this->notes_set = $notesSet;
        $this->emit('updateNoteSet',$this->notes_set);
    }

    public function updatedSearch() {
        if(!empty($this->search)){
            $this->results = Note::where('title','like',$this->search.'%')->take(5)->get();
            $results2 = Note::where('title','like','%'.$this->search.'%')->take(5)->get();
            $this->results = $this->results->merge($results2);
            $this->isVisible = true;
        }
    }

    

    

}
