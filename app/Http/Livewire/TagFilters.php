<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TagFilters extends Component
{
    public $visi_type, $color, $visi_tag, $order;
    public $status = 'all', $colors = [], $fav = false;
    public function mount()
    {
        $this->visi_type = 'A';
        $this->color = 'A';
        $this->visi_tag = "MT";
        $this->status = "all";
        $this->fav = false;
        $this->colors = [];
        $this->order = false;
    }
    public function render()
    {
        return view('livewire.tag-filters');
    }

    public function updateOrder($order)
    {
        $this->order = $order;
        if ($this->order == 'ASC') {
            $this->order = 'DESC';
            $this->emit('updateNoteOrder', $this->order);
        } elseif ($this->order == 'DESC') {
            $this->order = false;
            $this->emit('updateNoteOrder', $this->order);
        } else {
            $this->order = 'ASC';
            $this->emit('updateNoteOrder', $this->order);
        }
    }

    public function updateTags($visi_tag)
    {
        $this->visi_tag = $visi_tag;
    }

    public function updateVisib($visib_type)
    {
        $this->visi_type = $visib_type;
        $this->emit('updateVisibility', $visib_type, $this->color);
    }

    public function submit()
    {
        $this->emit('updateMultiFilter', $this->status, $this->colors, $this->fav);
        $this->mount();
    }

    public function updateColor($color)
    {
        $this->color = $color;
        $this->emit('updateColor', $this->visi_type, $color);
    }
}
