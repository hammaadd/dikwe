<?php

namespace App\Http\Livewire;
use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TagsList extends Component
{
    protected $listeners = ['updateTags' => 'render','updateVisibility'=>'updateVisiblityOfTags','updateColor'=>'updateVisiblityOfTags'];
    public $tags, $visi_type = null, $color = null,$tagId;
    protected  $tagg;

    public function updateVisiblityOfTags($visi_type,$color){
        $this->visi_type = $visi_type;
        $this->color = $color;
        $colors = array('purple','yellow','blue','green');
        $tagg = Tag::query();
        $tagg->where('status','=','active')
            ->limit(5)
            ->orderBy('created_at','DESC')
            ->where('user_id',Auth::id());
        if($this->visi_type=='A' || $this->visi_type == null){
            
        }else{
            $tagg->where('visibility','=',$visi_type);
        }

        if(in_array($color, $colors)){
            $tagg->where('color','=',$color);
        }


        $this->tags = $tagg->get();
        
    }

    // public function updateColors($color){
    //     $this->updateVisiblityOfTags($this->visi_type, $color);

    // }

    // public function updateVisib($visi_type){
    //     $this->updateVisiblityOfTags($visi_type, $this->color);
    // }
    public function mount(){
        $this->updateVisiblityOfTags('A','A');
    }

    public function render()
    {
        if($this->visi_type != null || $this->color !=null){
            $this->updateVisiblityOfTags($this->visi_type,$this->color);
        }
        
        return view('livewire.tags-list');
    }

    public function passTagId($tagId){
        $this->tagId = $tagId;
        $this->emit('editTag',$tagId);
    }
}
