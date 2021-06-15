<?php

namespace App\Http\Livewire;

use App\Models\Note;
use App\Models\NoteTag;
use App\Models\NoteWorkspace;
use App\Models\Tag;
use App\Models\Workspace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditNote extends Component
{

    public $color,$title, $description,$source,$url,$visibility,$tagsG,$wrkspcs, $workspaces = [], $tags = [],$noteId , $note;
    protected $listeners = ['getNoteData'=>'getData','setWorkspaces2'=> 'setWorkspaces','setTags2'=>'setTags','editNote'=> 'getData'];
    public function render()
    {
        $this->tagsG = Tag::where('user_id',Auth::id())->where('status','active')->get();
        $this->wrkspcs = Workspace::where('created_by',Auth::id())->where('status','active')->get();
        return view('livewire.edit-note');
    }

    public function mount(){
        if($this->noteId > 0){
            $note = Note::where('id',$this->noteId)->where('created_by','=',Auth::id())->with('tags')->first();
            $this->note = $note;
            $tags = [];
            $workspaces = [];
            $wrkspc = $note->workspaces->toArray();
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
                    $this->emit('update-tags-ev');
            }else{
                
            }
            
        }
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
            'description' => 'max:500',
            'color' => 'required|in:purple,yellow,blue,green',
            'visibility' => 'required|in:P,PR,R',
        ],[],$pretty_names);
        
        $this->note->title = $this->title;
        $this->note->description = $this->description;
        $this->note->source = $this->source;
        $this->note->source_url = $this->url;
        $this->note->visibility = $this->visibility;
        $this->note->color = $this->color;
        $this->note->created_by = Auth::id();
        $nRes = $this->note->update();
        if($nRes){
            $nsRes = 0;
            #Add workspaces of notes using loop
            $nws = NoteWorkspace::select('id')->where('note',$this->note->id)->get()->toArray();
            NoteWorkspace::destroy($nws);
            foreach($this->workspaces as $ws){
                $nw = new NoteWorkspace;
                $nw->note = $this->note->id;
                $nw->workspace = $ws;
                $nw->save();
                $nsRes++;
            }

            // Add tags of notes using the method below
            $nts = NoteTag::select('id')->where('note',$this->note->id)->get()->toArray();
            NoteTag::destroy($nts);
            foreach($this->tags as $tg){
                $nt = new NoteTag;
                $nt->note = $this->note->id;
                $nt->tag = $tg;
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
        $this->emit('updateNoteGrid');
        $this->emit('updateNotes');
    }





}
