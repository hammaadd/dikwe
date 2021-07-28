<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookmarkTag extends Model
{
    use HasFactory;
    public function bookmark(){
        return $this->belongsTo(BookMark::class,'bookmark');
    }
    public function tag_name(){
        return $this->belongsTo(Tag::class,'tag');
    }
}
