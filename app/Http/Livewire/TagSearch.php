<?php

namespace App\Http\Livewire;

use App\Models\Note;
use App\Models\Tag;
use Livewire\Component;

class TagSearch extends Component
{
    public $search, $result = [], $rTags = [], $searches = [], $tagId;

    public function render()
    {
        return view('livewire.tag-search');
    }

    public function updatedSearch()
    {
        if (!empty($this->search)) {
            $this->results = Note::where('title', 'like', $this->search . '%')->take(5)->get();
            $results2 = Note::where('title', 'like', '%' . $this->search . '%')->take(5)->get();
            $this->results = $this->results->merge($results2);

            $this->rTags = Tag::where('tag', 'like', $this->search . '%')->take(10)->get();
            $rTags2 = Tag::where('tag', 'like', '%' . $this->search . '%')->take(10)->get();
            $this->rTags = $this->rTags->merge($rTags2);

            $this->isVisible = true;
        }
    }



    public function mount()
    {
        $this->resetSearch();
    }
    public function resetSearch()
    {
        $this->search = '';
        $this->results = [];
        $this->rTags = [];
        $this->searches = [];
    }
    public function search()
    {
    }
    public function passTagId($tagId)
    {
        $this->tagId = $tagId;
        $this->emit('editTag', $tagId);
        $this->mount();
    }
}
