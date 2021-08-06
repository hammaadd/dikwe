<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteTag extends Model
{
    use HasFactory;

    protected $table = 'notes_tags';
    protected $guarded = [];

    public function notes(){
        return $this->belongsTo(Note::class,'note');
    }

    public function taga(){
        return $this->belongsTo(Tag::class,'tag','id');
    }

    
}
