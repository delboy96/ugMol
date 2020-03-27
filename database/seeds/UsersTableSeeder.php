<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{

    /**
     * @var Factory
     */
    private $faker;

    public function __construct(Faker\Generator $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('Users')->insert([
                'name' => $this->faker->name,
                'email' => $this->faker->safeEmail,
                'password' => Hash::make('password'),
                'role_id' => $this->faker->boolean ? 1 : 2,
                'active' => $this->faker->boolean ? 1 : 0,
            ]);
        }
    }
}
