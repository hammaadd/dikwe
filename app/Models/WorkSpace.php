<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
class WorkSpace extends Model
{
    use HasFactory;
    use SoftDeletes;
    
    public function parent()
    {
        return $this->hasMany(WorkSpace::class, 'parent');
    }
}
