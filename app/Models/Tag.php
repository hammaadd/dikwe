<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'tag',
        'note',
        'visibility',
        'color',
        'slug'
        
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'tag'
            ]
        ];
    }

    public function owner(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function notes(){
        return $this->hasMany(Note::class,'id','note');
    }
}
