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
    public  $note_set, $noteStyle , $noteHeading ,$noteId,$settings = 0;
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
                        ->orderBy('created_at','DESC')
                        ->paginate(4);
            $this->noteHeading = 'Service Notes';
        
        elseif($this->note_set == 'LN'):

            $this->notes = Note::whereHas('reactions',function ($query){
                return $query->where('reaction_type','like')->where('reacted_by',Auth::id());
            })
            ->orderBy('created_at','DESC')
            ->paginate(4);
            $this->noteHeading = 'Liked Notes';
            // $this->settings = 1;

            // dd($this->notes);
        elseif($this->note_set == 'DN'):

                $this->notes = Note::whereHas('reactions',function ($query){
                    return $query->where('reaction_type','dislike')->where('reacted_by',Auth::id());
                })
                ->orderBy('created_at','DESC')
                ->paginate(4);
                $this->noteHeading = 'Disliked Notes';

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

    public function passNoteId($noteId){
        $this->noteId = $noteId;
        $this->emit('passNoteIdFromList',$noteId);
    }


}
