<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\WorkSpace;
use App\Models\BookMark;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\BookmarkTag;
use App\Models\BookmarkWorkspace;

class BookmarkController extends Controller
{
    //

    public function index()
    {
        $bookmarks = BookMark::where('created_by', Auth::id())->get();
        return view('user.content.bookmarks', compact('bookmarks'));
    }
    public function addbookmark()
    {
        $tags = Tag::where('user_id', Auth::id())->get();
        $workspaces = WorkSpace::where('created_by', Auth::id())->get();
        return view('user.content.add-bookmark', compact('tags', 'workspaces'));
    }
    public function createbookmark(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'source' => 'required',
            'status' => 'required',
            'visibility' => 'required',
            'tags' => 'required'
        ]);
        $bookmark = new BookMark;
        $bookmark->title = $request->input('title');
        $bookmark->description = $request->input('description');
        $bookmark->source = $request->input('source');
        $bookmark->status = $request->input('status');

        $bookmark->color = $request->input('color');
        $bookmark->visibility = $request->input('visibility');
        if ($request->file('thumbnail')) {
            $file = $request->file('thumbnail');
            $filename = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $imgname = uniqid() . $filename;
            $destinationPath = public_path('/book_mark_thumbnail');
            $file->move($destinationPath, $imgname);

            $bookmark->thumbnail = $imgname;
        }
        $bookmark->created_by = Auth::id();
        $bookmark->save();
        // Tags
        $tags = $request->input('tags');
        foreach ($tags as $tag) {
            $tagdata = Tag::find($tag);
            if (empty($tagdata)) {
                $tags = new Tag;
                $tags->user_id = Auth::id();
                $tags->tag = $tag;
                $tags->save();
                $this->createbookmarktag($tags->id, $bookmark->id);
            } else {
                $this->createbookmarktag($tag, $bookmark->id);
            }
        }
        $workspaces = $request->input('workspace');
        foreach ($workspaces as $workspace) {
            $workspacedata = Workspace::find($workspace);
            if (empty($workspacedata)) {
                $newws = new Workspace;
                $newws->title = $workspace;
                $newws->save();
                $this->createbookmarworkspace($newws->id, $bookmark->id);
            } else {
                $this->createbookmarworkspace($workspace, $bookmark->id);
            }
        }
        return redirect()->route('bookmarks');
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
    public function editbookmark(Request $request, BookMark $bookmark)
    {
        $tags = Tag::where('user_id', Auth::id())->get();
        $workspaces = WorkSpace::where('created_by', Auth::id())->get();
        return view('user.content.bookmark-info', compact('tags', 'workspaces', 'bookmark'));
    }
    public function updatebookmark(Request $request, BookMark $bookmark)
    {
        // print_r($request->all());
        $request->validate([
            'title' => 'required',
            'source' => 'required',
            'status' => 'required',
            'visibility' => 'required',
            'tags' => 'required'
        ]);
        $bookmark->title = $request->input('title');
        $bookmark->description = $request->input('description');
        $bookmark->source = $request->input('source');
        $bookmark->status = $request->input('status');
        $bookmark->title = $request->input('title');
        $bookmark->visibility = $request->input('visibility');
        $bookmark->update();
        // Work On tags
        $newtags = $request->input('tags');

        $deleteabletag = BookmarkTag::where('bookmark', '=', $bookmark->id)->whereNotIn('tag', $newtags)->get();
        foreach ($deleteabletag as $deletetag) {
            BookmarkTag::where('id', $deletetag->id)->delete();
        }
        foreach ($newtags as $tag) {
            $checkexisttag = BookmarkTag::find($tag);
            if ($checkexisttag != NULL) {
                BookmarkTag::updateOrCreate(
                    ['bookmark' => $bookmark->id, 'tag' => $tag],
                    ['bookmark' => $bookmark->id, 'tag' => $tag],
                );
            } else {
                $tags = new Tag;
                $tags->user_id = Auth::id();
                $tags->tag = $tag;
                $tags->save();
                $this->createbookmarktag($tags->id, $bookmark->id);
            }
        }
        $newworkspace = $request->input('workspaces');
        $deleteableworkspace = BookmarkWorkspace::where('bookmark', $bookmark->id)->whereNotIn('workspace', $newworkspace)->get();
        foreach ($deleteableworkspace as $deleteworkspace) {
            BookmarkWorkspace::where('id', $deleteworkspace->id)->delete();
        }
        foreach ($newworkspace as $newws) {
            $checkexistworkspace = BookmarkWorkspace::find($newws);
            if ($checkexistworkspace != NULL) {
                BookmarkWorkspace::updateOrCreate(
                    ['bookmark' => $bookmark->id, 'workspace' => $newws],
                    ['bookmark' => $bookmark->id, 'workspace' => $newws],
                );
            } else {
                $newwspace = new Workspace;
                $newwspace->title = $newws;
                $newwspace->save();
                $this->createbookmarworkspace($newwspace->id, $bookmark->id);
            }
        }
        return redirect()->route('bookmarks');
    }
}
