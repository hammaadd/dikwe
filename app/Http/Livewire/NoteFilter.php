<?php

namespace App\Http\Livewire;

use App\Models\Note;
use App\Models\Tag;
use Livewire\Component;

class NoteFilter extends Component
{
    protected $listeners = ['resetSearch'=>'resetSearch','setSearchesEqual'=>'setSearchesEqual'];

    public $visi_type,$color,$notes_set = 'M', $search,$results,$isVisible, $all_checked,$order,$rTags,$searches;
    // protected $queryString = ['search'];

    
    public function mount(){
        $this->visi_type = 'A';
        $this->color = 'A';
        $this->notes_set = 'M';
        $this->isVisible = false;
        $this->all_checked = false;
        $this->order = false;
        $this->resetSearch();
    }

    public function resetSearch() {  
        $this->search = '';
        $this->results = [];
        $this->rTags = [];
        $this->searches = [];
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

            $this->rTags = Tag::where('tag','like',$this->search.'%')->take(10)->get();
            $rTags2 = Tag::where('tag','like','%'.$this->search.'%')->take(10)->get();
            $this->rTags = $this->rTags->merge($rTags2);
            
            $this->isVisible = true;
        }
    }

    public function updateOrder($order){
        $this->order = $order;

        if($this->order == 'ASC'){
            $this->order = 'DESC';
            $this->emit('updateNoteOrder',$this->order);
        }elseif($this->order == 'DESC'){
            $this->order = false;
            $this->emit('updateNoteOrder',$this->order);
        }else{
            $this->order = 'ASC';
            $this->emit('updateNoteOrder',$this->order);
        }
        
    }

    public function search(){
        // $data[0]['type'] = 'tag';
        // $data[0]['search'] = $this->search;
        //Keep array to track the searches applied on notes
        //array_push($this->searches,$data[0]);
        //Pass searched query and also the searches array to NoteSearchGrid
        $this->emit('updateQueryNoteSet',$this->search,$this->search);
    }

    public function setSearchesEqual($searches){
        $this->searches = $searches;
    }

    

    

}
