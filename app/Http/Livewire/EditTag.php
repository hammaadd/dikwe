<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditTag extends Component
{
    protected $listeners = ['editTag'=> 'getData'];
    public $tagId, $name, $note, $color, $visibility;
    public function render()
    {
        return view('livewire.edit-tag');
    }

    public function getData($tagId){
        $this->tagId = $tagId;
        $this->mount();
    }

    public function mount(){
        if($this->tagId > 0){
            $tag = Tag::where('id',$this->tagId)->where('user_id','=',Auth::id())->first();
            if($tag){
                    $this->name = $tag->tag;
                    $this->note = $tag->note;
                    $this->color = $tag->color;
                    $this->visibility = $tag->visibility;
            }else{
                return redirect()->route('add-tag');
            }
        }
    }

    public function resetUpdateForm(){
        $this->tagId = 0;
        $this->name = '';
        $this->note = '';
        $this->color = '';
        $this->visibility = '';
    }

    public function update(){
        $pretty_names = [
            'name'  =>  'tag name',
            'note'  =>  'tag_note'
        ];
        
        $this->validate([
            'name' => 'required',
            'note' => 'max:500',
            'color' => 'required|in:purple,yellow,blue,green',
            'visibility' => 'required|in:P,R,PR',
        ],[],$pretty_names);
        
        $tag = Tag::where('id',$this->tagId)->where('user_id','=',Auth::id())->first();
        if($this->tagId > 0 && $tag){
            $tag->tag = $this->name;
            $tag->note = $this->note;
            $tag->color = $this->color;
            $tag->visibility = $this->visibility;
            $tag->user_id = Auth::id();
            $tag->update();
            session()->flash('success', 'Tag Updated Successfully.');
            $this->emit('updateTags');

            $this->resetUpdateForm();
        }else{
            session()->flash('error', 'Unable To Save. Select Tag To Update.');
            $this->resetUpdateForm();
        }

    }

    public function delete(){
        if($this->tagId > 0){
            $res = Tag::where('id',$this->tagId)->where('user_id','=',Auth::id())->delete();
            if($res){
                $this->emit('updateTags');
                session()->flash('success', 'Tag Deleted Successfully.');
                $this->resetUpdateForm();
            }else{
                session()->flash('error', 'Unable To Delete Tag. Try Again');
            }
        }else{
            session()->flash('error', 'Unable To Delete Tag. Try Again');
        }
    }
}
