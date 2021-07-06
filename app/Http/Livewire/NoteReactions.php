<?php

namespace App\Http\Livewire;

use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NoteReactions extends Component
{
    public $note,$type;
    protected $listeners = ['refreshNoteReactions' => '$refresh'];
    public function render()
    {
        return view('livewire.note-reactions');
    }

    public function likeKa($id){
        $ret = Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'like'
        ])->first();
        if($ret){

        }else{
        Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'dislike'
        ])->delete();
        Reaction::create([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'like'
        ]);
        }
        $this->emit('refreshNoteReactions');
    }

    public function mount($note,$type){
        $this->note = $note;
        $this->type = $type;
    }

    public function unlikeKa($id){
        Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'like'
        ])->delete();
        $this->emit('refreshNoteReactions');
    }

    public function dislike($id){
        $ret = Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'dislike'
        ])->first();
        if($ret):

        else:
            Reaction::where([
                'ka'=>$id,
                'reacted_by'=>Auth::id(),
                'ka_type'=>'note',
                'reaction_type'=>'like'
            ])->delete();
            Reaction::create([
                'ka'=>$id,
                'reacted_by'=>Auth::id(),
                'ka_type'=>'note',
                'reaction_type'=>'dislike'
            ]);
        endif;
        $this->emit('refreshNoteReactions');

    }

    public function undislike($id){
        Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'dislike'
        ])->delete();
        $this->emit('refreshNoteReactions');
    }


    public function upvote($id){
        $ret = Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'upvote'
        ])->first();
        if($ret):

        else:
            Reaction::create([
                'ka'=>$id,
                'reacted_by'=>Auth::id(),
                'ka_type'=>'note',
                'reaction_type'=>'upvote'
            ]);
        endif;
        $this->emit('refreshNoteReactions');

    }

    public function downvote($id){
        Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'upvote'
        ])->delete();
        $this->emit('refreshNoteReactions');
    }


    

}
