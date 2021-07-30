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
    public $color,$title, $description,$source,$url,$visibility = 'P',$tagsG,$wrkspcs, $workspaces = [], $tags = [];
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
        $this->dispatchBrowserEvent('updateTrixDesc', ['description' => $description]);
    }

    public function resetCreateForm(){
        $this->title = '';
        $this->description = '';
        $this->color = '';
        $this->visibility = 'P';
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

        // $this->emit('refreshDropdown');
        
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
            if(count($this->workspaces) > 0):
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
                    $nw->note = $note->id;
                    $nw->workspace = $nws->id;
                    $nw->save();
                    $nsRes++;
                }
            endif;

            // Add tags of notes using the method below
            if(count($this->tags) > 0):
            $nts = NoteTag::select('id')->where('note',$note->id)->get()->toArray();
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
                    $nt->note = $note->id;
                    $nt->tag = $taags->id;
                    $nt->save();
                    $nsRes++;
                }
            endif;

        }

        if($nsRes){
            session()->flash('success', 'Note Added Successfully.');
        }else{
            session()->flash('error', 'Note Added Successfully.');
        }

        

        // $this->resetCreateForm();
        // $this->emit('updateNoteGrid');
        // $this->emit('updateNotes');
        return redirect()->route('notes');
    }




    

    






}
