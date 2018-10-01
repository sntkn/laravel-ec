<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create('ja_JP');

        // static
        DB::table('users')->insert([
                 'name' => 'foo1',
                 'email' => 'foo1@foo.com',
                 'password' => bcrypt('1234'),
                 'lang' => 'ja',
                 'timezone' => 'Asia/Tokyo',
                 'created_at' => $faker->dateTime(),
                 'updated_at' => $faker->dateTime(),
             ]);
        // random
        for ($i=0; $i < 9; $i++) {
            DB::table('users')->insert([
                     'name' => $faker->unique()->userName(),
                     'email' => $faker->unique()->email(),
                     'password' => bcrypt('1234'),
                     'lang' => $faker->randomElement(['en', 'ja']),
                     'timezone' => $faker->timezone(),
                     'created_at' => $faker->dateTime(),
                     'updated_at' => $faker->dateTime(),
                 ]);
        }
        // use factory
        factory(App\User::class, 10)->create();
    }
}
