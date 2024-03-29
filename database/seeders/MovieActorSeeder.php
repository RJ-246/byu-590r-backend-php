<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Actor;
use Illuminate\Support\Facades\DB;

class MovieActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movie_actors = [
            [
                'movie_id'=> Movie::where('title', 'Blade Runner 2049')->firstOrFail()->id,
                'actor_id'=> Actor::where('name', "Ryan Gosling")->firstOrFail()->id
            ],
            [
                'movie_id'=> Movie::where('title', 'Blade Runner 2049')->firstOrFail()->id,
                'actor_id'=> Actor::where('name', "Ana de Armas")->firstOrFail()->id
            ],
            [
                'movie_id'=> Movie::where('title', 'Blade Runner 2049')->firstOrFail()->id,
                'actor_id'=> Actor::where('name', "Harrison Ford")->firstOrFail()->id
            ],
            [
                'movie_id'=> Movie::where('title', 'Dune')->firstOrFail()->id,
                'actor_id'=> Actor::where('name', "Timothee Chalamet")->firstOrFail()->id
            ],
            [
                'movie_id'=> Movie::where('title', 'Dune')->firstOrFail()->id,
                'actor_id'=> Actor::where('name', "Zendaya")->firstOrFail()->id
            ],
            [
                'movie_id'=> Movie::where('title', 'Dune: Part Two')->firstOrFail()->id,
                'actor_id'=> Actor::where('name', "Timothee Chalamet")->firstOrFail()->id
            ],
            [
                'movie_id'=> Movie::where('title', 'Dune: Part Two')->firstOrFail()->id,
                'actor_id'=> Actor::where('name', "Zendaya")->firstOrFail()->id
            ],
            [
                'movie_id'=> Movie::where('title', 'Interstellar')->firstOrFail()->id,
                'actor_id'=> Actor::where('name', "Timothee Chalamet")->firstOrFail()->id
            ],
            [
                'movie_id'=> Movie::where('title', 'Interstellar')->firstOrFail()->id,
                'actor_id'=> Actor::where('name', "Matthew McConaughey")->firstOrFail()->id
            ],
            [
                'movie_id'=> Movie::where('title', 'Inception')->firstOrFail()->id,
                'actor_id'=> Actor::where('name', "Leonardo DiCaprio")->firstOrFail()->id
            ],
        ];
        DB::table('movie_actors')->insert($movie_actors);
    }
}
