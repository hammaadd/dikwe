<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Cviebrock\EloquentSluggable\Sluggable;

class Workspace extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Sluggable;

    protected $fillable = [
        'title','description','parent','visibility','color','created_by','status','slug'	
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['owner.firstname','title']
            ]
        ];
    }

    public function owner(){
        return $this->belongsTo(User::class,'created_by','id');
    }

    public function parent()
    {
        return $this->hasMany(WorkSpace::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(WorkSpace::class,'parent');
    }

    public function notes(){
        return $this->hasMany(Note::class,'id','note');
    }


}
