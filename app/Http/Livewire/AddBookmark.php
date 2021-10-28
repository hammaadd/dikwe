<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tag;
use App\Models\WorkSpace;
use Illuminate\Support\Facades\Auth;

class AddBookmark extends Component
{
    public $tags, $workspaces;
    public function render()
    {
        $this->tags = Tag::where('user_id', Auth::id())->get();
        $this->workspaces = WorkSpace::where('created_by', Auth::id())->get();
        return view('livewire.add-bookmark');
    }
}
