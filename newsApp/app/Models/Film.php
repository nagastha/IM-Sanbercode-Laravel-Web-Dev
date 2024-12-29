<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $table = 'films';

    protected $fillable = ['title', 'summary', 'release_year', 'poster', 'genre_id'];

    public function genre()
    {
        return $this->belongsTo(genre::class, 'genre_id');
    }
}
