<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookmarkWorkspace extends Model
{
    use HasFactory;
    public function bookmark(){
        return $this->belongsTo(BookMark::class,'bookmark');
    }
    public function workspace_name(){
        return $this->belongsTo(Workspace::class,'workspace');
    }
}
