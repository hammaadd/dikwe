<?php

namespace App\Http\Livewire;

use App\Models\Tag;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class TagsList extends Component
{
    protected $listeners = ['updateTags' => 'render', 'updateVisibility' => 'updateVisiblityOfTags', 'updateColor' => 'updateVisiblityOfTags', "updateMultiFilter" => "updatefilers", 'updateNoteOrder' => 'updateNoteOrder'];
    public $tags, $visi_type = null, $color = null, $tagId, $order;
    protected  $tagg;

    public function updateVisiblityOfTags($visi_type, $color)
    {
        $this->visi_type = $visi_type;
        $this->color = $color;
        $colors = array('purple', 'yellow', 'blue', 'green');
        $tagg = Tag::query();




        if ($this->order == 'ASC') {
            $tagg->where('status', '=', 'active')
                ->limit(5)
                ->orderBy('tag', 'ASC')
                ->where('user_id', Auth::id());
        } elseif ($this->order == 'DESC') {
            $tagg->where('status', '=', 'active')
                ->limit(5)
                ->orderBy('tag', 'DESC')
                ->where('user_id', Auth::id());
        } else {
            $tagg->where('status', '=', 'active')
                ->limit(5)
                ->orderBy('created_at', 'DESC')
                ->where('user_id', Auth::id());
        }

        // $tagg->where('status', '=', 'active')
        //     ->limit(5)
        //     ->orderBy('created_at', 'DESC')
        //     ->where('user_id', Auth::id());

        if ($this->visi_type == 'A' || $this->visi_type == null) {
        } else {
            $tagg->where('visibility', '=', $visi_type);
        }

        if (in_array($color, $colors)) {
            $tagg->where('color', '=', $color);
        }


        $this->tags = $tagg->get();
    }




    public function updatefilers($status, $colors, $fav)
    {
        $this->visi_type = null;
        $this->color = null;
        $tagg = Tag::query();




        if ($status == 'all'  && $colors == null) {
            if ($fav != false) {
                $tagg
                    ->limit(5)
                    ->orderBy('created_at', 'DESC')
                    ->where('user_id', Auth::id());
            } else {
                $tagg
                    ->limit(5)
                    ->orderBy('created_at', 'DESC')
                    ->where('user_id', Auth::id());
            }
        } elseif ($status == 'used' && $colors == null) {
            if ($fav != false) {
                $tagg->where('status', '=', 'active')
                    ->limit(5)
                    ->orderBy('created_at', 'DESC')
                    ->where('user_id', Auth::id());
            } else {
                $tagg->where('status', '=', 'active')
                    ->limit(5)
                    ->orderBy('created_at', 'DESC')
                    ->where('user_id', Auth::id());
            }
        } elseif ($status == 'unused'  && $colors == null) {
            if ($fav != false) {
                $tagg->where('status', '=', 'active')
                    ->limit(5)
                    ->orderBy('created_at', 'DESC')
                    ->where('user_id', Auth::id());
            } else {
                $tagg->where('status', '=', 'active')
                    ->limit(5)
                    ->orderBy('created_at', 'DESC')
                    ->where('user_id', Auth::id());
            }
        } elseif ($status == 'used' || $fav != false && $colors != null) {
            $tagg
                ->whereIn('color', $colors)->where('status', '=', 'active')
                ->limit(5)
                ->orderBy('created_at', 'DESC')
                ->where('user_id', Auth::id());
        } elseif ($status == 'unused' || $fav != false && $colors != null) {
            $tagg
                ->whereIn('color', $colors)->where('status', '=', 'inactive')
                ->limit(5)
                ->orderBy('created_at', 'DESC')
                ->where('user_id', Auth::id());
        } elseif ($status == 'all' || $fav != false && $colors != null) {
            $tagg
                ->whereIn('color', $colors)
                ->limit(5)
                ->orderBy('created_at', 'DESC')
                ->where('user_id', Auth::id());
        }


        $this->tags = $tagg->get();
    }


    public function updateNoteOrder($order)
    {
        // dd($order);
        $this->order = $order;
        $this->render();
    }

    // public function updateColors($color){
    //     $this->updateVisiblityOfTags($this->visi_type, $color);

    // }

    // public function updateVisib($visi_type){
    //     $this->updateVisiblityOfTags($visi_type, $this->color);
    // }
    public function mount()
    {
        $this->updateVisiblityOfTags('A', 'A');
    }

    public function render()
    {
        if ($this->visi_type != null || $this->color != null) {
            $this->updateVisiblityOfTags($this->visi_type, $this->color);
        }

        return view('livewire.tags-list');
    }

    public function passTagId($tagId)
    {
        $this->tagId = $tagId;
        $this->emit('editTag', $tagId);
    }
}
