<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class NoteSearchGrid extends Component
{

    use WithPagination;
    protected $listeners = ['updateNoteSet'=> 'updateSet','setNoteStyle'=>'setNoteStyle'];
    public  $note_set, $noteStyle , $noteHeading ;
    private $notes;
    
    public function render()
    {
        if($this->note_set == 'M'):
            $this->notes = Note::where('status','active')
                        ->where('created_by',Auth::id())
                        ->orderBy('created_at','DESC')
                        ->paginate(4);
            $this->noteHeading = 'My Notes';

        elseif($this->note_set == 'S'):

            $this->noteHeading = 'Subscribed Notes';
        
        elseif($this->note_set == 'SR'):
            $this->notes = Note::where('status','active')
                        ->orderBy('created_at','ASC')
                        ->paginate(4);
            $this->noteHeading = 'Service Notes';

        else:
            $this->notes = Note::where('status','active')
                        ->where('created_by',Auth::id())
                        ->orderBy('created_at','DESC')
                        ->paginate(4);
            $this->noteHeading = 'My Notes';

        endif;

        return view('livewire.note-search-grid',['notes' => $this->notes]);
    }

    public function mount(){
        $this->notes = Note::where('status','active')
                        ->where('created_by',Auth::id())
                        ->orderBy('created_at','DESC')
                        ->paginate(4);
        $this->noteStyle = 'grid';
        $this->noteHeading = 'My Notes';
    }

    public function updateSet($noteSet){
        $this->note_set = $noteSet;
        //dd($this->note_set);
        
    }

    public function setNoteStyle($style){
        $this->noteStyle = $style;
        //dd($style);
    }


}
