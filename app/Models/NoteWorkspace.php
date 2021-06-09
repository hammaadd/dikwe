<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteWorkspace extends Model
{
    use HasFactory;

    protected $table = 'notes_workspaces';
    protected $guarded = [];

    public function notes(){
        return $this->belongsTo(Note::class,'note');
    }
}
