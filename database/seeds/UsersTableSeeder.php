<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

    foreach (range(1,5) as $index) {

        User::create([
            'name'  => $faker->firstNameMale,
            'email'   => $faker->unique()->safeEmail,
            'email_verified_at' => now(),
            'password' => Str::random(6),
            'nik' => $faker->randomDigit(17),
            'role' => $faker->randomDigit(1),
            'remember_token' => Str::random(10),
        ]);

    }
    }
}
