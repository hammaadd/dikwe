<?php

namespace App\Http\Livewire;

use App\Models\Note;
use App\Models\NoteTag;
use App\Models\NoteWorkspace;
use App\Models\Tag;
use App\Models\Workspace;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddNoteInfo extends Component
{
    public $color,$title, $description,$source,$url,$visibility,$tagsG,$wrkspcs, $workspaces = [], $tags = [];
    protected $listeners = ['showMoreInfo'=> 'showMoreInfo','setWorkspaces'=> 'setWorkspaces','setTags'=>'setTags','cancelFormInfo'=>'resetCreateForm'];
    public function render()
    {
        $this->tagsG = Tag::where('user_id',Auth::id())->where('status','active')->get();
        $this->wrkspcs = Workspace::where('created_by',Auth::id())->where('status','active')->get();
        return view('livewire.add-note-info');
    }

    public function showMoreInfo($title,$description,$color){
        $this->title = $title;
        $this->description = $description;
        $this->color = $color;
    }

    public function resetCreateForm(){
        $this->title = '';
        $this->description = '';
        $this->color = '';
        $this->visibility = '';
        $this->source = '';
        $this->url = '';
        $this->tags = [];
        $this->workspaces = [];
        


    }

    public function moreAddInfo(){
        
        $this->emit('passMoreInfo',$this->title, $this->description,$this->color,$this->tags,$this->workspaces,$this->source,$this->url,$this->visibility);
        
    }

    public function setWorkspaces($wkspcs){
        $this->workspaces = $wkspcs;
        
    }

    public function setTags($tgs){
        $this->tags = $tgs;
        
    }

    public function store(){

        
        $pretty_names = [
            'title'  =>  'note title',
            'description'  =>  'description'
        ];

        $this->emit('refreshDropdown');
        
        $this->validate([
            'title' => 'required',
            'description' => 'max:50000',
            'color' => 'required|in:purple,yellow,blue,green',
            'visibility' => 'required|in:P,PR,R',
            'workspaces' =>'required',
            'tags' =>'required',
        ],[],$pretty_names);
        $note = new Note;
        $note->title = $this->title;
        $note->description = $this->description;
        $note->source = $this->source;
        $note->source_url = $this->url;
        $note->visibility = $this->visibility;
        $note->color = $this->color;
        $note->created_by = Auth::id();
        $nRes = $note->save();
        if($nRes){
            $nsRes = 0;
            #Add workspaces of notes using loop
            foreach($this->workspaces as $ws){
                
                $nw = new NoteWorkspace;
                $nw->note = $note->id;
                $nw->workspace = $ws;
                $nw->save();
                $nsRes++;
            }

            // Add tags of notes using the method below

            foreach($this->tags as $tg){
                $taags = Tag::find($tg);
                if(!$taags->count() > 0){
                    $taags = new Tag;
                    $taags->user_id = Auth::id() ;
                    $taags->tag = $tg;
                    $taags->visibility = 'PR' ;
                    $taags->color = 'purple';
                    $taags->save();
                }
                $nt = new NoteTag;
                $nt->note = $note->id;
                $nt->tag = $taags->id;
                $nt->save();
                $nsRes++;
            }

            
            
        }

        if($nsRes){
            session()->flash('success', 'Note Added Successfully.');
        }else{
            session()->flash('error', 'Note Added Successfully.');
        }

        

        $this->resetCreateForm();
        $this->emit('updateNoteGrid');
        $this->emit('updateNotes');
    }




    

    






}
