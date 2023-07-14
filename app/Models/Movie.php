<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    public function admin() {
        return $this->belongsTo(User::class, 'admin_id','id');
    }

    public function categories() {
        return $this->belongsToMany(Category::class, 'movies_categories',
            'movies_id', 'categories_id')->withTimestamps();
    }

    public function actors() {
        return $this->belongsToMany(Actor::class, 'actors', 'actors_id', 'movies_id');
    }
    public function isCategories($id) {
        foreach ($this->categories as $category) {
            if($category->id == $id) {
                return true;
            }
        }
        return false;
    }

    public function director() {
        return $this->belongsTo(Director::class);
    }


}
