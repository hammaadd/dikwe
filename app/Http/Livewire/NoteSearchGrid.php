<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class NoteSearchGrid extends Component
{

    use WithPagination;
    protected $listeners = ['updateNoteSet'=> 'updateSet','setNoteStyle'=>'setNoteStyle','updateNoteGrid'=> 'render','updateNoteVisibility'=>'noteVisiblity','updateNoteColor'=>'updateColor'];
    public  $note_set ='M', $noteStyle , $noteHeading ,$noteId,$settings = 0 , $visibility = 'A',$color = 'A';
    private $notes;
    
    public function render()
    {
        if($this->note_set == 'M'):
            $this->notes = Note::query();
            $this->notes->where('status','active')
                        ->where('created_by',Auth::id())
                        ->orderBy('created_at','DESC');
            
            $this->noteHeading = 'My Notes';
            if($this->visibility=='A' || $this->visibility == null){
            
            }else{
                $this->notes->where('visibility','=',$this->visibility);
            }

            if($this->color == 'A' || $this->color == null){

            }else{
                $this->notes->where('color','=',$this->color);
            }

        elseif($this->note_set == 'S'):
            $this->noteHeading = 'Subscribed Notes';
        
        elseif($this->note_set == 'SR'):
            $this->notes = Note::query();
            $this->notes->where('status','active')
                        ->orderBy('created_at','DESC');
            $this->noteHeading = 'Service Notes';
        
        elseif($this->note_set == 'LN'):
            $this->notes = Note::query();
            $this->notes->whereHas('reactions',function ($query){
                return $query->where('reaction_type','like')->where('reacted_by',Auth::id());
            })
            ->orderBy('created_at','DESC');
            $this->noteHeading = 'Liked Notes';
            // $this->settings = 1;

            // dd($this->notes);
        elseif($this->note_set == 'DN'):
                $this->notes = Note::query();
                $this->notes->whereHas('reactions',function ($query){
                    return $query->where('reaction_type','dislike')->where('reacted_by',Auth::id());
                })
                ->orderBy('created_at','DESC');
                $this->noteHeading = 'Disliked Notes';

        else:
            $this->notes = Note::query();
            $this->notes->where('status','active')
                        ->where('created_by',Auth::id())
                        ->orderBy('created_at','DESC');
            $this->noteHeading = 'My Notes';

        endif;
        if($this->notes != null){
            return view('livewire.note-search-grid',['notes' =>$this->notes->paginate(4)]);
        }else{
            return view('livewire.note-search-grid',['notes' =>$this->notes]);
        }
            
    }

    public function noteVisiblity($visib){
        $this->visibility = $visib;
        $this->render();
    }

    public function updateColor($color){
        $this->color = $color;
        $this->render();

    }

    public function mount(){
        // $this->notes = Note::query();
        // $this->notes->where('status','active')
        //                 ->where('created_by',Auth::id())
        //                 ->orderBy('created_at','DESC')
        //                 ->paginate(4);
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
        $this->emit('passNoteIdFromSearchGrid',$noteId);
    }

    public function show($id){
        $this->dispatchBrowserEvent('showView');
    }


}
