<?php

namespace App\Http\Livewire;

use App\Models\BookMark;
use App\Models\BookmarkTag;
use App\Models\BookmarkWorkspace;
use App\Models\Tag;
use App\Models\Workspace;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class EditBookmark extends Component
{
    protected $listeners = ['passEditData' => 'editbookmark', 'setWorkspaces' => 'setWorkspaces', 'setTags' => 'setTags',];
    public $tags = [], $workspaces = [], $tg = [], $wk = [];
    public $title = "", $source = "", $description = "", $color = "", $visibility = "P", $bid = 0, $status = "active";
    public $bookmark = '',  $tagsG = [], $wrkspcs = [];

    public function mount()
    {

        if (isset($_GET['m'])) {
            if ($_GET['m'] == 'edit') {
                if (isset($_GET['id'])) {
                    $this->bid = $_GET['id'];
                }
            }
        }
        if ($this->bid > 0) {

            $bm = BookMark::where('id', $this->bid)->where('created_by', '=', Auth::id())->with('tags')->first();
            $this->bookmark = $bm;
            $tags = [];
            $workspaces = [];

            $wrkspc = $bm->workspace->toArray();
            $tag = $bm->tags->toArray();
            for ($i = 0; $i < count($tag); $i++) {
                array_push($tags, $tag[$i]['tag']);
            }

            for ($i = 0; $i < count($wrkspc); $i++) {
                array_push($workspaces, $wrkspc[$i]['workspace']);
            }
            if ($bm) {
                $this->title = $bm->title;
                $this->description = $bm->description;
                $this->source = $bm->source;

                $this->color = $bm->color;
                $this->visibility = $bm->visibility;
                $this->tags = $tags;
                $this->workspaces = $workspaces;
                $this->emit('update-tags-ev');
            } else {
            }
        }
    }
    public function render()
    {
        $this->tagsG = Tag::where('user_id', Auth::id())->where('status', 'active')->get();
        $this->wrkspcs = Workspace::where('created_by', Auth::id())->where('status', 'active')->get();
        return view('livewire.edit-bookmark');
    }
    public function editbookmark($bid)
    {
        $this->bid = $bid;

        $this->mount();
    }


    public function updateBookmark()
    {
        // print_r($request->all());
        $this->validate([
            'title' => 'required',
            'source' => 'required',
            'description' => 'required',
            'color' => 'required|in:purple,yellow,blue,green',
            'visibility' => 'required',

        ]);
        if ($this->bid) {
            $bm =  BookMark::find($this->bid);
            $bm->title = $this->title;
            $bm->description = $this->description;
            $bm->source = $this->source;
            $bm->status = $this->status;
            $bm->color = $this->color;
            $bm->visibility = $this->visibility;
            $bm->update();
        }
        // Work On tags

        $newtags = $this->tg;

        $deleteabletag = BookmarkTag::where('bookmark', '=', $this->bid)->whereNotIn('tag', $newtags)->get();
        foreach ($deleteabletag as $deletetag) {
            BookmarkTag::where('id', $deletetag->id)->delete();
        }
        foreach ($newtags as $tag) {
            $checkexisttag = BookmarkTag::find($tag);
            if ($checkexisttag != NULL) {
                BookmarkTag::updateOrCreate(
                    ['bookmark' => $this->bid, 'tag' => $tag],
                    ['bookmark' => $this->bid, 'tag' => $tag],
                );
            } else {
                $tags = new Tag;
                $tags->user_id = Auth::id();
                $tags->tag = $tag;
                $tags->save();
                $this->createbookmarktag($tags->id, $this->bid);
            }
        }
        dd($this->wk);
        $newworkspace = $this->wk;
        $deleteableworkspace = BookmarkWorkspace::where('bookmark', $this->bid)->whereNotIn('workspace', $newworkspace)->get();
        foreach ($deleteableworkspace as $deleteworkspace) {
            BookmarkWorkspace::where('id', $deleteworkspace->id)->delete();
        }
        foreach ($newworkspace as $newws) {
            $checkexistworkspace = BookmarkWorkspace::find($newws);
            if ($checkexistworkspace != NULL) {
                BookmarkWorkspace::updateOrCreate(
                    ['bookmark' => $this->bid, 'workspace' => $newws],
                    ['bookmark' => $this->bid, 'workspace' => $newws],
                );
            } else {
                $newwspace = new Workspace;
                $newwspace->title = $newws;
                $newwspace->save();
                $this->createbookmarworkspace($newwspace->id, $this->bid);
            }
        }
        return redirect()->route('bookmarks');
    }
    public function setWorkspaces($wkspcs)
    {

        $this->wk = $wkspcs;
    }

    public function setTags($tgs)
    {

        $this->tg = $tgs;
    }

    public function createbookmarktag($tag_id, $bookmark_id)
    {
        $bookmarktag = new BookmarkTag;
        $bookmarktag->bookmark = $bookmark_id;
        $bookmarktag->tag = $tag_id;
        $bookmarktag->save();
    }
    public function createbookmarworkspace($workspace, $bookmark_id)
    {
        $bookmarkworkspace = new BookmarkWorkspace;
        $bookmarkworkspace->bookmark = $bookmark_id;
        $bookmarkworkspace->workspace = $workspace;
        $bookmarkworkspace->save();
    }
}
