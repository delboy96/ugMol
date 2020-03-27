<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    public const DEFAULT_PICTURE = 'assets/img/zima.jpg';

    /**
     * Run the database seeds.
     *
     * @param \Faker\Generator $generator
     * @return void
     */
    public function run(\Faker\Generator $generator)
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('articles')->insert([
                'title' => $generator->sentence($nbWords = 2, $variableNbWords = true),
                'body' => $generator->text,
                'img' => self::DEFAULT_PICTURE,
                'type' => 'članak',
                'date' => now()
            ]);
        }
    }
}
