<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public function movies() {
        return $this->belongsToMany(Movie::class, 'movies_categories',
            'categories_id', 'movies_id')->withTimestamps();
    }
    public function isCategories($id) {
        foreach ($this->movies as $movie) {
            if($movie->id == $id) {
                return true;
            }
        }
        return false;
    }
}
