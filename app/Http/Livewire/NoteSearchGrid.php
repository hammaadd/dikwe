<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NoteSearchGrid extends Component
{

    
    protected $listeners = ['updateNoteSet'=> 'updateSet'];
    public $notes, $note_set;
    public function render()
    {
        return view('livewire.note-search-grid');
    }

    public function mount(){
        $this->notes = Note::where('status','active')
                        ->where('created_by',Auth::id())
                        ->orderBy('created_at','DESC')
                        ->limit(4)
                        ->get();
    }

    public function updateSet($noteSet){
        $this->note_set = $noteSet;

        if($noteSet == 'M'){
            $this->notes = Note::where('status','active')
                        ->where('created_by',Auth::id())
                        ->orderBy('created_at','DESC')
                        ->limit(4)
                        ->get();
        }elseif($noteSet == 'S'){

        }elseif($noteSet == '')
    }
}
