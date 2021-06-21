<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NoteSearchGrid extends Component
{

    
    protected $listeners = ['updateNoteSet'=> 'updateSet','setNoteStyle'=>'setNoteStyle'];
    public $notes, $note_set, $noteStyle , $noteHeading ;
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
        $this->noteStyle = 'grid';
        $this->noteHeading = 'My Notes';
    }

    public function updateSet($noteSet){
        $this->note_set = $noteSet;
        //dd($this->note_set);
        if($this->note_set == 'M'):
            $this->notes = Note::where('status','active')
                        ->where('created_by',Auth::id())
                        ->orderBy('created_at','DESC')
                        ->limit(6)
                        ->get();
            $this->noteHeading = 'My Notes';

        elseif($this->note_set == 'S'):

            $this->noteHeading = 'Subscribed Notes';
        
        elseif($this->note_set == 'SR'):
            $this->notes = Note::where('status','active')
                        ->orderBy('created_at','ASC')
                        ->limit(6)
                        ->get();
            $this->noteHeading = 'Service Notes';

        else:
            $this->notes = Note::where('status','active')
                        ->where('created_by',Auth::id())
                        ->orderBy('created_at','DESC')
                        ->limit(6)
                        ->get();
            $this->noteHeading = 'My Notes';

        endif;
    }

    public function setNoteStyle($style){
        $this->noteStyle = $style;
        //dd($style);
    }


}
