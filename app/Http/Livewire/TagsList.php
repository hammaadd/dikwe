<?php

namespace App\Http\Livewire;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TagsList extends Component
{
    protected $listeners = ['updateTags' => 'render','updateVisibility'=>'updateVisiblityOfTags'];
    public $tags, $visi_type = null , $tagg;

    public function updateVisiblityOfTags($visi_type){
        $this->visi_type = $visi_type;
        if($this->visi_type=='A'){
            $this->tags = $this->tag->where('status','=','active')->limit(5)->orderBy('created_at','DESC')->where('user_id',Auth::id())->get();
        }else{
            $this->tags = $this->tag->('status','=','active')->where('visibility','=',$visi_type)->limit(5)->orderBy('created_at','DESC')->where('user_id',Auth::id())->get();
        }
        
    }
    public function mount(){
        $this->initializeTag();
        $this->updateVisiblityOfTags('A');
    }
    public function initializeTag(){
        $this->tagg = Tag::query();
    }
    public function render()
    {
        if($this->visi_type != null){
            $this->updateVisiblityOfTags($this->visi_type);
        }
        return view('livewire.tags-list');
    }

    public function passTagId($tagId){
        $this->emit('editTag',$tagId);
    }
}
