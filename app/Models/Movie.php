<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'picture',
        'created_at',
        'updated_at'
    ];

    public function genre(): HasOne{
        return $this->HasOne(Genre::class, 'id', 'genre_id');
    }
    public function director(): HasOne{
        return $this->HasOne(Director::class, 'id', 'director_id');
    }

    public function actors(): BelongsToMany {
        return $this->belongsToMany(Actor::class, 'movie_actors', "movie_id", "actor_id");
    }
}
