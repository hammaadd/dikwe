<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reaction extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function note(){
        return $this->belongsTo(Note::class,'ka');
    }

    

    public function activeNote(){
        return $this->note->where('status','active');
    }
}
