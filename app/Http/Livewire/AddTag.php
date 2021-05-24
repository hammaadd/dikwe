<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddTag extends Component
{
    use AuthorizesRequests;
    public $name , $note , $color , $visibility;


    public function render()
    {
        return view('livewire.add-tag');
    }

    private function resetCreateForm(){
        $this->name = '';
        $this->note = '';
    }
    
    public function store()
    {
        $pretty_names = [
            'name'  =>  'tag name',
            'note'  =>  'tag_note'
        ];
        
        $this->validate([
            'name' => 'required',
            'note' => 'max:500',
            'color' => 'required|in:purple,yellow,blue,green',
            'visibility' => 'required',
        ],[],$pretty_names);
        
        $tag = new Tag;
        $tag->tag = $this->name;
        $tag->note = $this->note;
        $tag->color = $this->color;
        $tag->visibility = $this->visibility;
        $tag->user_id = Auth::id();
        $tag->save();
        session()->flash('success', 'Tag Added Successfully.');
        $this->emit('updateTags');

        $this->resetCreateForm();
    }
}
