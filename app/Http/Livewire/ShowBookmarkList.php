<?php

namespace App\Http\Livewire;

use App\Models\BookMark;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShowBookmarkList extends Component
{
    public $bookmarks;
    public $bid;
    public function render()
    {
        $this->bookmarks = BookMark::where('created_by', Auth::id())->get();

        return view('livewire.show-bookmark-list');
    }
    public function editBookmark($bid)
    {
        $this->bid = $bid;

        $this->emit('passEditData', $bid);
    }
}
