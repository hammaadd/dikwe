<?php

namespace App\Http\Livewire;
use App\Models\Note;
use App\Models\Reaction;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ShareModal extends Component
{
    public $note,$og_url,$og_title,$og_description,$og_image,$article_author;
    protected $listeners = ['passShareNoteId'=>'getNote'];
    public function render()
    {
        return view('livewire.share-modal');
    }

    public function getNote(Note $note){
        $this->note = $note;
        // $this->og_url = route('view.note',$note);
        // $this->og_title = $note->title;
        // $this->og_description = $note->description;
        // if($note->owner->profile_img == null):
        //     $profile_image = asset('images/logo-dikwe.png');
        // else:
        //     $profile_image = asset('user_profile_images/'.$note->owner->profile_img);
        // endif;
        // $this->og_image = $profile_image ;
        // $this->article_author = $note->owner->name ;
        // $this->dispatchBrowserEvent('ogDataUpdate');
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
