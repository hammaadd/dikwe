<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BookMark extends Model
{
    use HasFactory,SoftDeletes;
    public function tags(){
        return $this->hasMany(BookmarkTag::class,'tag');
    }
    public function workspace(){
        return $this->hasMany(BookmarkWorkspace::class,'bookmark');
    }
}
