<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    public function movies() {
        return $this->hasMany(Movie::class);
    }
    public function isDirected($id) {
        foreach ($this->movies as $movie) {
            if ($movie->id == $id) {
                return true;
            }
        }
        return false;
    }
}
