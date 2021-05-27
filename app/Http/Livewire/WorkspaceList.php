<?php

namespace App\Http\Livewire;

use App\Models\Workspace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WorkspaceList extends Component
{
    public $wrkspcs;
    public function render()
    {
        return view('livewire.workspace-list');
    }

    public function mount(){
        $this->wrkspcs = Workspace::where('created_by','=',Auth::id())->get();
    }
}
