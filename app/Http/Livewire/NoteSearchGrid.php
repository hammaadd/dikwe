<?php

namespace App\Http\Livewire;

use App\Models\Note;
use App\Models\NoteTag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class NoteSearchGrid extends Component
{

    use WithPagination;
    protected $listeners = ['updateNoteSet'=> 'updateSet','updateNoteSet2'=> 'updateSet2','setNoteStyle'=>'setNoteStyle','updateNoteGrid'=> 'render','updateNoteVisibility'=>'noteVisiblity','updateNoteColor'=>'updateColor','noteSelectAll'=>'noteSelectAll','makeAllPublic'=>'makeAllPublic','makeAllPrivate','makeAllPrivate'
    ,'updateQueryNoteSet'=>'updateQueryNoteSet','deletAllSelectedNotes'=>'deletAllSelectedNotes','setNotificationMessage'=>'setNotificationMessage',
    'updateNoteOrder'=>'updateNoteOrder'];
    public  $note_set ='M', $note_set2 ='N',$noteStyle , $noteHeading ,$noteId,$settings = 0 , $visibility = 'A',$color = 'A',$note_selected, $select_note = [],$query , $message = ' ' , $showNotification,$order
    ,$searches= [],$noteHeading2 = '';
    private $notes;
    
    public function render()
    {
        /* 
        ****Important****
        M = My Notes
        S = Subscribed notes
        Q = Query
        SR = Service notes
        LN = Liked notes
        DN = Disliked notes
        FN = Favorite Notes

        ****Global Variable used****
        $noteHeading == This is used to store heading which is displayed on frontend to identify what type of note is selected
        $notes == Contains all the results for notes
        $note_set == Contains type of the note selected

        */

        //Check if selected is My Notes
        if($this->note_set == 'M'):
            //Create note type query object
            $this->notes = Note::query();
            //Fetch data by checking the conditions
            $this->notes->where('status','active')
                        ->where('created_by',Auth::id());
                        
            //Set Heading Variable to use for displaying heading
            $this->noteHeading = 'My Notes';
            

        //Check if selected is subscribed notes
        elseif($this->note_set == 'S'):
            $this->noteHeading = 'Subscribed Notes';
        
        elseif($this->note_set == 'SR'):
            $this->notes = Note::query();
            $this->notes->where('status','active');
                       
            $this->noteHeading = 'Service Notes';
        else:
            $this->notes = Note::query();
            $this->notes->where('status','active')
                        ->where('created_by',Auth::id());
            $this->noteHeading = 'My Notes';

        endif;
        

        //Visibility fiters
        if($this->visibility=='A' || $this->visibility == null){
            
        }else{
            $this->notes->where('visibility','=',$this->visibility);
        }

        //Color filters
        if($this->color == 'A' || $this->color == null){

        }else{
            $this->notes->where('color','=',$this->color);
        }

        if($this->note_set2 == 'LN'):
            $this->notes->whereHas('reactions',function ($query){
                return $query->where('reaction_type','like')->where('reacted_by',Auth::id());
            });
           
            $this->noteHeading2 = 'Liked Notes';
            // $this->settings = 1;

            // dd($this->notes);
        elseif($this->note_set2 == 'DN'):
                $this->notes->whereHas('reactions',function ($query){
                    return $query->where('reaction_type','dislike')->where('reacted_by',Auth::id());
                });
                $this->noteHeading2 = 'Disliked Notes';

        // It'll filter favorite notes        
        elseif($this->note_set2 == 'FN'):
                $this->notes->whereHas('reactions',function ($query){
                    return $query->where('reaction_type','favorite')->where('reacted_by',Auth::id());
                });
                   
                $this->noteHeading2 = 'Favorite Notes';

        else:
                $this->noteHeading2 = '';

        endif;

        if(!empty($this->query)):
            //dd($this->notes);
            // $this->notes1 = $this->notes;
            // $notes = $this->notes;
            // $notes = $notes->select('id')->get()->toArray();
            // if(count($notes) > 0){
            //     $n_notes = [];
            //     foreach($notes as $nt){
            //         array_push($n_notes,$nt['id']); 
            //     }
            //     $notes = $n_notes;
                
            // }

            // $nnotes = new Note;
            // $nnotes->whereIn('id',[$notes])->whereHas('tags',function($query){
            //     return $query->whereHas('taga', function($query1){
            //         return $query1->where('tag','like','%'.$this->query.'%');
            //     });
            // });
            // $nnotes =  $nnotes->get();

            // // $ttags = new NoteTag;\
            
            // NoteTag::whereIn('note',[$nnotes])->get();

            // dd($nnotes);


            // $this->notes->where('title','like',$this->query.'%');
            $this->notes->where('title','like','%'.$this->query.'%');
            //$this->notes->union($this->notes1);
            $this->noteHeading = 'Search Results For "'.$this->query.'" in '.$this->noteHeading;

        endif;

        //ASC or DESC order codition
        if($this->order == 'ASC'){
            $this->notes->orderBy('title','ASC');
        }elseif($this->order == 'DESC'){
            $this->notes->orderBy('title','DESC');
        }else{
            $this->notes->orderBy('created_at','DESC');
        }
        if($this->notes != null){
            return view('livewire.note-search-grid',['notes' =>$this->notes->paginate(4)]);
        }else{
            return view('livewire.note-search-grid',['notes' =>$this->notes]);
        }
            
    }

    public function noteVisiblity($visib){
        $this->visibility = $visib;
        $this->query = '';
        $this->render();
    }

    public function updateNoteOrder($order){
        $this->order = $order;
        $this->query = '';
        $this->render();
    }

    public function updateColor($color){
        $this->color = $color;
        $this->query = '';
        $this->render();

    }

    public function updateQueryNoteSet($q,$searches){
        if(!empty($q)){
            //$this-searches is received array from NoteFilter
            $this->searches = $searches;
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
        $this->showNotification = false;
        
    }

    public function updateSet($noteSet){
        $this->note_set = $noteSet;
        $this->query = '';
        //dd($this->note_set);
        
    }

    public function updateSet2($noteSet){
        $this->note_set2 = $noteSet;
        $this->query = '';
        //dd($this->note_set);
    }

    public function setNoteStyle($style){
        $this->noteStyle = $style;
        $this->query = '';
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
        if(count($this->select_note) > 0){
            $res = Note::whereIn('id',$this->select_note)->update(['visibility'=>'P']);

            // Checking the returned value and deciding the notification type, and dispatching
            // the browser notification
            if($res){
                $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Visibility Set To Public Successfully.']);
            }else{
                $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Unable to set visibility. Try again later.']);
            }    
            
        }else{
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Please select notes to proceed']);
        }

        $this->mount();
    }

    public function deletAllSelectedNotes(){
        if(count($this->select_note) > 0){
            $res = Note::whereIn('id',[$this->select_note])->where('created_by',Auth::id())->delete();
            //Check returned response
            if($res){
                $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Notes deleted successfully']);
            }else{
                $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Unable to delete notes. Try later!']);
            }
        }else{
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Please notes to proceed']);
        }

    }

    public function makeAllPrivate(){
        //dd($this->select_note);
        if(count($this->select_note) > 0){
            $res = Note::whereIn('id',$this->select_note)->update(['visibility'=>'PR']);
            if($res){
                $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Visibility set to private successfully.']);
            }else{
                $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Unable to set visibility. Try again later']);
            }
        }else{
            $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Please select notes to proceed']);
        }

        $this->mount();
    }

    public function delete($noteId){
        if($noteId){
            $res = Note::where('id',$noteId)->where('created_by',Auth::id())->delete();
             
            if($res){
                $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Note deleted successfully.']);
            }else{
                $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'Unable to delete note. Try again later']);
            }
        }
    }

    public function setNotificationMessage($message){
        $this->message = $message;
        session()->flash('success', $message);
    }

    public function removeSearches($index){
        //Remove searches from specific index in array
        unset($this->searches[$index]);
        //Fire Event to pass value and assign to the NoteFilter $searches variable
        $this->emit('setSearchesEqual',$this->searches);
    }


}
