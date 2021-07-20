<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class SearchNetwork extends Component
{
    public $search, $results;
    public function mount(){
        $this->resetSearch();
    }
    public function render()
    {
        return view('livewire.search-network');
    }

    public function resetSearch() {  
        $this->search = '';
        $this->results = [];
}

    public function updatedSearch(){
        if(!empty($this->search)){
            $this->results = User::where('name','like',$this->search.'%')->take(5)->get();
            $results2 = User::where('name','like','%'.$this->search.'%')->take(5)->get();
            $this->results = $this->results->merge($results2);
            
        }
    }


}
