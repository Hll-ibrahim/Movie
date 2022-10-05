<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function categories() {
        return $this->belongsToMany(Category::class, 'movies_categories',
            'categories_id', 'movies_id')->withTimestamps();
    }

    public function actors() {
        return $this->belongsToMany(Actor::class, 'actors', 'actors_id', 'movies_id');
    }

    public function director() {
        return $this->belongsTo(Director::class, 'director_id','id');
    }


}
