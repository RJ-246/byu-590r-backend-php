<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GenresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = [
            [
                'name'=>"Unknown",
                "description"=>"A genre hasn't been selected for this movie."
            ],
            [
                "name" => "Fantasy",
                "description" => "Magical beasts and spells."
            ],
            [
                "name" => "Sci-Fi",
                "description" => "Flying cars and other cool stuff."
            ],
            [
                'name' => "Mystery",
                "description" => "Try to solve the mystery."
            ],
            [
                'name'=> "Documentary",
                'description'=> "A real event that happened."
            ]
        ];

        Genre::insert($genres);
    }
}
