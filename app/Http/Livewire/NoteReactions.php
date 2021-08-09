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
        // Check if already liked or not
        if(Auth::check()):
        $ret = Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'like'
        ])->first();

        if($ret){
            // If liked then no action
        }else{
        //Removed the dislike so we can add like
        Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'dislike'
        ])->delete();
        //Add like in table based on user and KA (Knowledge asset ID)
        Reaction::create([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'like'
        ]);
        //Dispatch browser event to show notification
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'You liked a note.']);
        }
        //Refresh view to update like changes on the screen
        $this->emit('refreshNoteReactions');
        else:
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Login to perform this action']);
        endif;
    }

    public function mount($note,$type){
        $this->note = $note;
        $this->type = $type;
    }

    public function unlikeKa($id){
        //Delete Like From like table this is called when already user liked the KA
        if(Auth::check()):
        Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'like'
        ])->delete();
        //Dipatch browser event for notification
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Like removed from "Liked Notes".']);
        $this->emit('refreshNoteReactions');
        else:
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Login to perform this action']);
        endif;
    }

    public function dislike($id){
        //Check if this KA is already disliked or not
        if(Auth::check()):
        $ret = Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'dislike'
        ])->first();
        if($ret):
            //If yes then no action is required
        else:
            //Do delete the like added if its present for the same KA from Auth user
            Reaction::where([
                'ka'=>$id,
                'reacted_by'=>Auth::id(),
                'ka_type'=>'note',
                'reaction_type'=>'like'
            ])->delete();
            //Create new entry in database for dislike
            Reaction::create([
                'ka'=>$id,
                'reacted_by'=>Auth::id(),
                'ka_type'=>'note',
                'reaction_type'=>'dislike'
            ]);
            //Dispatch browser event for showing notification
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'You disliked a note.']);
        endif;
        $this->emit('refreshNoteReactions');
    else:
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Login to perform this action']);
    endif;

    }

    public function undislike($id){
        //Delete the dislike entry it'll only happen when KA is disliked already
        if(Auth::check()):
        Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'dislike'
        ])->delete();
        //Dispatch notification
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Disliked note removed from']);
        $this->emit('refreshNoteReactions');
        else:
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Login to perform this action']);
        endif;
    }

    // public function upvote($id){
    //     $ret = Reaction::where([
    //         'ka'=>$id,
    //         'reacted_by'=>Auth::id(),
    //         'ka_type'=>'note',
    //         'reaction_type'=>'upvote'
    //     ])->first();
    //     if($ret):

    //     else:
    //         Reaction::create([
    //             'ka'=>$id,
    //             'reacted_by'=>Auth::id(),
    //             'ka_type'=>'note',
    //             'reaction_type'=>'upvote'
    //         ]);
    //     endif;
    //     $this->emit('refreshNoteReactions');

    // }

    // public function downvote($id){
    //     Reaction::where([
    //         'ka'=>$id,
    //         'reacted_by'=>Auth::id(),
    //         'ka_type'=>'note',
    //         'reaction_type'=>'upvote'
    //     ])->delete();
    //     $this->emit('refreshNoteReactions');
    // }
    public function addToFav($id){
        //Add to favourite functionality
        //Check if already added in favorites list
        if(Auth::check()):
        $ret = Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'favorite'
        ])->first();
        if($ret):
            //If yes then no action is required
        else:
            // Reaction::where([
            //     'ka'=>$id,
            //     'reacted_by'=>Auth::id(),
            //     'ka_type'=>'note',
            //     'reaction_type'=>'favorite'
            // ])->delete();
            //If not added then add in the database and create entry for Favorite in Database
            Reaction::create([
                'ka'=>$id,
                'reacted_by'=>Auth::id(),
                'ka_type'=>'note',
                'reaction_type'=>'favorite'
            ]);
            //Dispatch success notification
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Added to favorite successfully.']);
        endif;
        $this->emit('refreshNoteReactions');
    else:
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Login to perform this action']);
    endif;
    }

    public function unFav($id){
        //This will un-favorite the already favorited by deleting the entry from database
        if(Auth::check()):
        Reaction::where([
            'ka'=>$id,
            'reacted_by'=>Auth::id(),
            'ka_type'=>'note',
            'reaction_type'=>'favorite'
        ])->delete();
        //Dispatch broser event for notification
        $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Removed from "Favorite Notes".']);
        $this->emit('refreshNoteReactions');
        else:
            $this->dispatchBrowserEvent('alert', ['type' => 'success', 'message' => 'Login to perform this action']);
        endif;
    }

    public function showShareModal($id){
        $this->emit('passShareNoteId',$id);
    }


    

}
