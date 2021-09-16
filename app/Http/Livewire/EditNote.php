<?php

namespace App\Http\Livewire;

use App\Models\Note;
use App\Models\NoteTag;
use App\Models\NoteWorkspace;
use App\Models\RestrictedUser;
use App\Models\Tag;
use App\Models\User;
use App\Models\Workspace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditNote extends Component
{

    public $color,$title, $description,$source,$url,$visibility,$tagsG,$wrkspcs, $workspaces = [], $tags = [],$noteId , $note, $created_at = null , $updated_at = null, $users= [], $restricted = [];
    protected $listeners = ['getNoteData'=>'getData','setWorkspaces2'=> 'setWorkspaces','setTags2'=>'setTags','editNote'=> 'getData', 'refreshEditNote' => '$refresh','passNoteIdFromSearchGrid' => 'getData','getNoteDetails'=>'getNoteDetails'];
    public function render()
    {
        $this->tagsG = Tag::where('user_id',Auth::id())->where('status','active')->get();
        $this->wrkspcs = Workspace::where('created_by',Auth::id())->where('status','active')->get();
        
        
        return view('livewire.edit-note');
    }

    public function mount(){
        if(isset($_GET['m'])){
            if($_GET['m']=='edit'){
                if(isset($_GET['id'])){
                    $this->noteId = $_GET['id'];
                }
            }
        }
        if($this->noteId > 0 ){
            

            $note = Note::where('id',$this->noteId)->where('created_by','=',Auth::id())->with('tags')->first();
            $this->dispatchBrowserEvent('editNoteupdateTrixDesc', ['description' => $note->description]);
            session()->flash('descr',$note->description);
            $this->note = $note;
            $tags = [];
            $workspaces = [];
            
            $wrkspc = $note->workspace->toArray();
            $tag = $note->tags->toArray();
            for($i = 0; $i < count($tag) ; $i++){
                array_push($tags,$tag[$i]['tag']);
            }

            for($i = 0; $i < count($wrkspc) ; $i++){
                array_push($workspaces,$wrkspc[$i]['workspace']);
            }
            if($note){
                    $this->title = $note->title;
                    $this->description = $note->description;
                    $this->source = $note->source;
                    $this->url = $note->source_url;
                    $this->color = $note->color;
                    $this->visibility = $note->visibility;
                    $this->tags = $tags;
                    $this->workspaces = $workspaces;
                    $this->created_at = $note->created_at;
                    $this->updated_at = $note->updated_at;
                    $this->emit('update-tags-ev');
            }else{
                
            }
            if($this->note->visibility == 'R' || $this->visibility == 'R'){
                $res = RestrictedUser::select('restricted_id')->where('ka_id',$this->note->id)->where('type','note')->get()->toArray();
                foreach($res as $re){
                    array_push($this->restricted,$re['restricted_id']);
                }
                $this->users = User::whereIn('id',$this->restricted)->get();
            }
           

            
            
        }

        
    }

    public function updateNoteList(){
        
    }

    public function getNoteDetails(){
        $this->mount();
    }
    public function getData($noteId){
        $this->noteId = $noteId;
        $this->mount();
        
    }

    public function setWorkspaces($wkspcs){
        $this->workspaces = $wkspcs;
        
    }

    public function setTags($tgs){
        $this->tags = $tgs;
        
    }

    public function update(){
        $pretty_names = [
            'title'  =>  'note title',
            'description'  =>  'description'
        ];

        // $this->emit('refreshDropdown');
        
        $this->validate([
            'title' => 'required',
            // 'description' => 'max:500',
            'color' => 'required|in:purple,yellow,blue,green',
            'visibility' => 'required|in:P,PR,R',
        ],[],$pretty_names);
        
        $this->note->title = $this->title;
        $this->note->description = nl2br($this->description);
        $this->note->source = $this->source;
        $this->note->source_url = $this->url;
        $this->note->visibility = $this->visibility;
        $this->note->color = $this->color;
        $this->note->created_by = Auth::id();
        $nRes = $this->note->update();
        if($nRes){
            $nsRes = 1;
            #Add workspaces of notes using loop
            $nws = NoteWorkspace::select('id')->where('note',$this->note->id)->get()->toArray();
            NoteWorkspace::destroy($nws);
            foreach($this->workspaces as $ws){
                $nws = Workspace::find($ws);
                if(!$nws){
                    $nws = new Workspace;
                    // $nws->user_id = Auth::id() ;
                    // $nws->tag = $tg;
                    // $nws->visibility = 'PR' ;
                    // $nws->color = 'purple';
                    // $nws->save();

                    $nws->title = $ws;
                    $nws->color = 'purple';
                    $nws->visibility = 'P';
                    $nws->created_by = Auth::id();
                    $nws->save();
                }
                $nw = new NoteWorkspace;
                $nw->note = $this->note->id;
                $nw->workspace = $nws->id;
                $nw->save();
                $nsRes++;
            }

            // Add tags of notes using the method below
            $nts = NoteTag::select('id')->where('note',$this->note->id)->get()->toArray();
            NoteTag::destroy($nts);
            foreach($this->tags as $tg){
                $taags = Tag::find($tg);
                if(!$taags){
                    $taags = new Tag;
                    $taags->user_id = Auth::id() ;
                    $taags->tag = $tg;
                    $taags->visibility = 'PR' ;
                    $taags->color = 'purple';
                    $taags->save();
                }
                $nt = new NoteTag;
                $nt->note = $this->note->id;
                $nt->tag = $taags->id;
                $nt->save();
                $nsRes++;
            }

            
            
        }


        if($nsRes){
            session()->flash('success', 'Note Updated Successfully.');
        }else{
            session()->flash('error', 'Unable To Update Note. Try Again Later');
        }

        

        // $this->resetCreateForm();
        //$this->emit('updateNoteGrid');
        //$this->emit('updateNotes');
        //$this->emit('refreshEditNote');
        // $this->tagsG = Tag::where('user_id',Auth::id())->where('status','active')->get();
        // $this->wrkspcs = Workspace::where('created_by',Auth::id())->where('status','active')->get();
        return redirect()->route('notes');

    }





}
