<?php

namespace App\Http\Livewire;

use App\Models\Note;
use App\Models\NoteTag;
use App\Models\NoteWorkspace;
use App\Models\Tag;
use App\Models\Workspace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddNote extends Component
{
    public $color,$title, $description,$source,$url,$visibility,$tagsG,$wrkspcs, $workspaces = [], $tags = [];
    protected $listeners = ['passMoreInfo'=> 'passMoreInfo','setWorkspaces3'=> 'setWorkspaces','setTags3'=>'setTags'];
    public function render()
    {
        return view('livewire.add-note');
    }

    public function moreInfo(){
        //$this->emit('getQuillValue');
        $this->emit('showMoreInfo',$this->title, $this->description,$this->color);
    }

    public function passMoreInfo( $title,$description,$color,$tags,$workspaces,$source,$url,$visibility){
        
        $this->title = $title;
        $this->description = $description;
        $this->color = $color; 
        $this->tags = $tags;
        $this->workspaces = $workspaces;
        $this->source = $source;
        $this->url = $url;
        $this->visibility = $visibility;
        $this->dispatchBrowserEvent('updateTrixDesc1', ['description' => $description]);
    
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

    public function store(){
        $pretty_names = [
            'title'  =>  'note title',
            'description'  => 'description'
        ];
        
        $this->validate([
            'title' => 'required',
            'description' => 'required|max:50000',
        ],[],$pretty_names);
        $note = new Note;
        $note->title = $this->title;
        $note->description = nl2br($this->description);
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
                    $nw->note = $this->note->id;
                    $nw->workspace = $nws->id;
                    $nw->save();
                    $nsRes++;
                }
            else:
                $nsRes++;
            endif;

            // Add tags of notes using the method below
            if(count($this->tags) > 0):
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
            else:
                $nsRes++;
            endif;

            
            #Add workspaces of notes using loop
            // if(count($this->workspaces) > 0):
            //     foreach($this->workspaces as $ws){
            //         $nw = new NoteWorkspace;
            //         $nw->note = $note->id;
            //         $nw->workspace = $ws;
            //         $nw->save();
            //         $nsRes++;
            //     }
            // else:
            //     $nsRes++;
            // endif;

            // // Add tags of notes using the method below
            // if(count($this->tags) > 0):
            //     foreach($this->tags as $tg){
            //         $nt = new NoteTag;
            //         $nt->note = $note->id;
            //         $nt->tag = $tg;
            //         $nt->save();
            //         $nsRes++;
            //     }
            // else:
            //     $nsRes++;
            // endif;

            
            
        }
        
        if($nsRes){
            session()->flash('success', 'Note Added Successfully.');
        }else{
            session()->flash('error', 'Unable to add note. Try again later');
        }

        

        // $this->resetCreateForm();
        // $this->emit('updateNoteGrid');
        // $this->emit('updateNotes');

        return redirect()->route('notes');
    }

    public function cancelForm(){
        $this->resetCreateForm();
        $this->emit('cancelFormInfo');
        return redirect()->route('notes');
    }

    public function setWorkspaces($wkspcs){
        $this->workspaces = $wkspcs;
        
    }

    public function setTags($tgs){
        $this->tags = $tgs;
        
    }
}
