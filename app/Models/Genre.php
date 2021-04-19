<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function relatedFilms(){
        return $this->belongsToMany(Film::class, "genres_films", "genre_id", "film_id");
    }

}
