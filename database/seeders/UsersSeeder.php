<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Ryan Jackson',
                'email' => 'rmjackson234@gmail.com',
                'email_verified_at' => null,
                'password' => bcrypt("strongPassword"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ],
            [
                'name' => "John Christiansen",
                'email' => 'johnc@test.com',
                'email_verified_at' => null,
                'password' => bcrypt("strongPassword"),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]
            ];

        User::insert($users);
    }
}
