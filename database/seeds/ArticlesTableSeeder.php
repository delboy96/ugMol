<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @param \Faker\Generator $generator
     * @return void
     */
    public function run(\Faker\Generator $generator)
    {
        for ($i = 0; $i < 50; $i++) {
            DB::table('articles')->insert([
                'title' => $generator->title,
                'body' => $generator->text,
                'img' => $generator->imageUrl(),
                'type' => $generator->boolean ? 'članak' : 'vest',
                'date' => now()
            ]);
        }
    }
}
