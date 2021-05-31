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

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => ['owner.name','title']
            ]
        ];
    }

    public function owner(){
        return $this->hasOne(User::class,'created_by');
    }

    public function parent()
    {
        return $this->hasMany(WorkSpace::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(WorkSpace::class,'parent');
    }


}
