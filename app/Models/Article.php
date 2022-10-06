<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name','description','type','image'];

    public function getImageAttribute($key)
    {
        return asset((Storage::url($key)));
    }
}
