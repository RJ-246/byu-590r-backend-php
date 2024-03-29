<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Actor;

class ActorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $actors = [
            [
                "name"=>"Ryan Gosling",
                "birthdate"=>"1980-11-12",
                "phone"=>""
            ],
            [
                "name"=>"Harrison Ford",
                "birthdate"=>"1942-07-13",
                "phone"=>""
            ],
            [
                "name"=>"Ana de Armas",
                "birthdate"=>"1988-04-30",
                "phone"=>""
            ],
            [
                "name"=>"Zendaya",
                "birthdate"=>"1996-09-01",
                "phone"=>""
            ],
            [
                "name"=>"Timothee Chalamet",
                "birthdate"=>"1995-12-27",
                "phone"=>""
            ],
            [
                "name"=>"Leonardo DiCaprio",
                "birthdate"=>"1974-11-11",
                "phone"=>""
            ],
            [
                "name"=>"Matthew McConaughey",
                "birthdate"=>"1969-11-04",
                "phone"=>""
            ],
        ];
        Actor::insert($actors);

    }
}
