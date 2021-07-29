<?php

namespace App\Http\Livewire;

use App\Models\Note;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class NoteSearchGrid extends Component
{

    use WithPagination;
    protected $listeners = ['updateNoteSet'=> 'updateSet','setNoteStyle'=>'setNoteStyle','updateNoteGrid'=> 'render','updateNoteVisibility'=>'noteVisiblity','updateNoteColor'=>'updateColor','noteSelectAll'=>'noteSelectAll','makeAllPublic'=>'makeAllPublic','makeAllPrivate','makeAllPrivate'
    ,'updateQueryNoteSet'=>'updateQueryNoteSet','deletAllSelectedNotes'=>'deletAllSelectedNotes'];
    public  $note_set ='M', $noteStyle , $noteHeading ,$noteId,$settings = 0 , $visibility = 'A',$color = 'A',$note_selected, $select_note = [],$query;
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
        elseif($this->note_set == 'Q'):
            
                $this->notes1 = Note::query();
                $this->notes = Note::query();

                $this->notes->where('title','like',$this->query.'%');
                $this->notes1->where('title','like','%'.$this->query.'%');
                $this->notes->union($this->notes1);
                // $this->isVisible = true;
          
            // $this->notes = Note::query();
            // $this->notes->where('status','active')
            //             ->orderBy('created_at','DESC');
            //dd($this->notes);
            $this->noteHeading = 'Search Results For "'.$this->query.'"';
        
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

    public function updateQueryNoteSet($ns, $q){
        if(!empty($q)){
            $this->note_set = $ns;
            $this->query = $q;
            $this->render();
        }

    }

    public function mount(){
        // $this->notes = Note::query();
        // $this->notes->where('status','active')
        //                 ->where('created_by',Auth::id())
        //                 ->orderBy('created_at','DESC')
        //                 ->paginate(4);
        $this->noteStyle = 'grid';
        $this->noteHeading = 'My Notes';
        $this->note_selected = false;
        $this->select_note = [];
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

    public function noteSelectAll(){
        $this->note_selected = true;
    }

    public function makeAllPublic(){
        //dd($this->select_note);
        if(count($this->select_note) > 0){
            $res = Note::whereIn('id',$this->select_note)->update(['visibility'=>'P']);
            if($res){
                session()->flash('success', 'Visibility Set To Public Successfully.');
            }else{
                session()->flash('error', 'Unable to set visibility. Try again later');
            }
            // foreach($this->select_note as $sn){
            //     Note::where('id','=',$this->select_note)->update(['visibility'=>'P']);
            // }
            
        }else{
            session()->flash('error', 'Please select notes to proceed');
        }

        $this->mount();
    }

    public function deletAllSelectedNotes(){
        if(count($this->select_note) > 0){
            $res = Note::whereIn('id',[$this->select_note])->where('created_by',Auth::id())->delete();
            // dd($this->select_note);
            if($res){
                session()->flash('success', 'Notes Deleted Successfully.');
            }else{
                session()->flash('error', 'Unable to delete notes. Try again later');
            }
        }else{
            session()->flash('error', 'Please select notes to proceed');
        }

    }

    public function makeAllPrivate(){
        //dd($this->select_note);
        if(count($this->select_note) > 0){
            $res = Note::whereIn('id',$this->select_note)->update(['visibility'=>'PR']);
            if($res){
                session()->flash('success', 'Visibility Set To Private Successfully.');
            }else{
                session()->flash('error', 'Unable to set visibility. Try again later');
            }
        }else{
            session()->flash('error', 'Please select notes to proceed');
        }

        $this->mount();
    }

    public function delete($noteId){
        if($noteId){
            $res = Note::where('id',$noteId)->where('created_by',Auth::id())->delete();
             
            if($res){
                session()->flash('success', 'Note Deleted Successfully.');
            }else{
                session()->flash('error', 'Unable to delete note. Try again later');
            }
        }
    }


}
