<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddNoteInfo extends Component
{
    public $color,$title, $description,$source,$url,$visibility,$tagsG;
    protected $listeners = ['showMoreInfo'=> 'showMoreInfo'];
    public function render()
    {
        $this->tagsG = Tag::where('user_id',Auth::id())->where('status','active')->get();
        return view('livewire.add-note-info');
    }

    public function showMoreInfo($title,$description,$color){
        $this->title = $title;
        $this->description = $description;
        $this->color = $color;
    }

    

    






}
