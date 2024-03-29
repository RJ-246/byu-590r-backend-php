<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Director;

class DirectorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $directors  =[
            [
                "name"=>"Unknown",
                "birthdate"=>'1900-01-01',
                "phone"=>''
            ],
            [
                "name"=> "Denis Villeneuve",
                "birthdate"=> "1967-10-03",
                "phone"=> "555-555-5555"
            ],
            [
                "name"=> "Christopher Nolan",
                "birthdate"=> "1970-06-30",
                "phone"=> "555-555-5556"
            ],

        ];
        Director::insert($directors);
    }
}
