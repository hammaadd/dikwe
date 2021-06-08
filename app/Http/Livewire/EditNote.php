<?php

namespace App\Http\Livewire;

use App\Models\Note;
use App\Models\Tag;
use App\Models\Workspace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditNote extends Component
{

    public $color,$title, $description,$source,$url,$visibility,$tagsG,$wrkspcs, $workspaces = [], $tags = [],$noteId;
    protected $listeners = ['getNoteData'=>'getData'];
    public function render()
    {
        $this->tagsG = Tag::where('user_id',Auth::id())->where('status','active')->get();
        $this->wrkspcs = Workspace::where('created_by',Auth::id())->where('status','active')->get();
        return view('livewire.edit-note');
    }

    public function mount(){
        if($this->noteId > 0){
            $note = Note::where('id',$this->noteId)->where('created_by','=',Auth::id())->with('tags')->first();
            $tags = [];
            $tag = $note->tags->toArray();
            for($i = 0; $i < count($tag) ; $i++){
                array_push($tags,$tag[$i]['tag']);
            }
            if($note){
                    $this->title = $note->title;
                    $this->description = $note->description;
                    $this->source = $note->source;
                    $this->url = $note->source_url;
                    $this->color = $note->color;
                    $this->visibility = $note->visibility;
                    $this->tags = $tags;
                    $this->emit('update-tags-ev');
            }else{
                
            }
        }
    }

    public function getData($noteId){
        $this->noteId = $noteId;
        $this->mount();
    }






}
