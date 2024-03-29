<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Director;
use Carbon\Carbon;

class MoviesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'title' => 'Blade Runner 2049',
                'genre_id' => Genre::where('name', "Sci-Fi")->firstOrFail()->id,
                'director_id' => Director::where('name', "Denis Villeneuve")->firstOrFail()->id,
                'picture' => '/images/bladerunner2049.jpg',
                'description' => "Young Blade Runner K's discovery of a long-buried secret leads him to track down former Blade Runner Rick Deckard, who's been missing for thirty years.",
                'year_released' => 2017,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Dune',
                'genre_id' => Genre::where('name', "Sci-Fi")->firstOrFail()->id,
                'director_id' => Director::where('name', "Denis Villeneuve")->firstOrFail()->id,
                'picture' => '/images/dune.jpg',
                'description' => "A noble family becomes embroiled in a war for control over the galaxy's most valuable asset while its heir becomes troubled by visions of a dark future.",
                'year_released' => 2021,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Dune: Part Two',
                'genre_id' => Genre::where('name', "Sci-Fi")->firstOrFail()->id,
                'director_id' => Director::where('name', "Denis Villeneuve")->firstOrFail()->id,
                'picture' => '/images/dune2.jpg',
                'description' => 'Paul Atreides unites with Chani and the Fremen while seeking revenge against the conspirators who destroyed his family.',
                'year_released' => 2024,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Interstellar',
                'genre_id' => Genre::where('name', "Sci-Fi")->firstOrFail()->id,
                'director_id' => Director::where('name', "Christopher Nolan")->firstOrFail()->id,
                'picture' => '/images/interstellar.jpg',
                'description' => 'When Earth becomes uninhabitable in the future, a farmer and ex-NASA pilot, Joseph Cooper, is tasked to pilot a spacecraft, along with a team of researchers, to find a new planet for humans.',
                'year_released' => 2014,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'title' => 'Inception',
                'genre_id' => Genre::where('name', "Documentary")->firstOrFail()->id,
                'director_id' => Director::where('name', "Christopher Nolan")->firstOrFail()->id,
                'picture' => '/images/inception.jpg',
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O., but his tragic past may doom the project and his team to disaster.',
                'year_released' => 2010,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
        ];

        Movie::insert($movies);
    }
}
