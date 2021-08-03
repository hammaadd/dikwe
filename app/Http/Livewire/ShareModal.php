<?php

namespace App\Http\Livewire;
use App\Models\Note;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShareModal extends Component
{
    public $note;
    protected $listeners = ['passShareNoteId'=>'getNote'];
    public function render()
    {
        return view('livewire.share-modal');
    }

    public function getNote(Note $note){
        $this->note = $note;
    }

    public function copyLink($id){
        $ret = Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'copied'
        ])->first();
        if($ret){

        }else{
        Reaction::create([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'copied'
        ]);
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Link copied successfully.']);
        }
        
}
}
