<?php

namespace App\Http\Livewire;
use App\Models\Tag;

use Livewire\Component;

class TagsList extends Component
{
    protected $listeners = ['updateTags' => 'render'];
    public function render()
    {
        $tags = Tag::where('status','=','active')->limit(5)->orderBy('created_at','DESC')->get();
        return view('livewire.tags-list',['tags'=>$tags]);
    }
}
