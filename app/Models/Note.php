<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Note extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    // protected $fillable = [
    //     'title','source','source_url','visibility','color', 'created_at','updated_at'

    // ];
    protected $guarded = [];


    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function tags()
    {
        return $this->hasMany(NoteTag::class, 'note');
    }
    public function workspace()
    {
        return $this->hasMany(NoteWorkspace::class, 'note');
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class, 'ka', 'id');
    }

    public function likes()
    {
        return $this->reactions->where('reaction_type', 'like');
    }

    public function likedBy($userId)
    {
        return $this->likes()->contains('reacted_by', $userId);
    }

    public function dislikes()
    {
        return $this->reactions->where('reaction_type', 'dislike');
    }

    public function dislikedBy($userId)
    {
        return $this->dislikes()->contains('reacted_by', $userId);
    }

    public function upvotes()
    {
        return $this->reactions->where('reaction_type', 'upvote');
    }

    public function upvotedBy($userId)
    {
        return $this->upvotes()->contains('reacted_by', $userId);
    }

    public function userLikes()
    {
        return $this->reactions->where('reaction_type', 'like')->where('reacted_by', Auth::id());
    }

    public function favorites()
    {
        return $this->reactions->where('reaction_type', 'favorite');
    }

    public function favoritedBy($userId)
    {
        return $this->favorites()->contains('reacted_by', $userId);
    }
}
