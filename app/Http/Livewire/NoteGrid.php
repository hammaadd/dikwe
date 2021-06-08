<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NoteGrid extends Component
{
    public $notes,$noteId;
    protected $listeners = ['updateNoteGrid'=> 'updateGrid'];
    public function render()
    {
        return view('livewire.note-grid');
    }

    public function mount(){
        $this->notes = Note::where('status','active')
                        ->where('created_by',Auth::id())
                        ->orderBy('created_at','DESC')
                        ->limit(4)
                        ->get();
    }

    public function updateGrid(){
        $this->notes = Note::where('status','active')
                        ->where('created_by',Auth::id())
                        ->orderBy('created_at','DESC')
                        ->limit(4)
                        ->get();
    }

    public function passNoteId($noteId){
        $this->noteId = $noteId;
        $this->emit('getNoteData',$noteId);
    }
}
