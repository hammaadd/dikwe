<?php

namespace App\Http\Livewire;

use App\Models\Note;
use App\Models\NoteTag;
use App\Models\NoteWorkspace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddNote extends Component
{
    public $color,$title, $description,$source,$url,$visibility,$tagsG,$wrkspcs, $workspaces = [], $tags = [];
    protected $listeners = ['passMoreInfo'=> 'passMoreInfo'];
    public function render()
    {
        return view('livewire.add-note');
    }

    public function moreInfo(){
        $this->emit('getQuillValue');
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
            if(count($this->workspaces) > 0):
                foreach($this->workspaces as $ws){
                    $nw = new NoteWorkspace;
                    $nw->note = $note->id;
                    $nw->workspace = $ws;
                    $nw->save();
                    $nsRes++;
                }
            else:
                $nsRes++;
            endif;

            // Add tags of notes using the method below
            if(count($this->tags) > 0):
                foreach($this->tags as $tg){
                    $nt = new NoteTag;
                    $nt->note = $note->id;
                    $nt->tag = $tg;
                    $nt->save();
                    $nsRes++;
                }
            else:
                $nsRes++;
            endif;

            
            
        }
        
        if($nsRes){
            session()->flash('success', 'Note Added Successfully.');
        }else{
            session()->flash('error', 'Unable to add note. Try again later');
        }

        

        $this->resetCreateForm();
        $this->emit('updateNoteGrid');
        $this->emit('updateNotes');
    }

    public function cancelForm(){
        $this->resetCreateForm();
        $this->emit('cancelFormInfo');
        return redirect()->route('notes',['m'=>'add']);
    }
}
