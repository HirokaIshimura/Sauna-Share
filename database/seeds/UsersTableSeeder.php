<?php

use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //一括削除
        User::truncate();

        $faker = Faker::create('en_US');
        for($i = 0; $i < 50; $i++){
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('password')
            ]);
        }
    }
}
