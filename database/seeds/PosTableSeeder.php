<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PosTableSeeder extends Seeder
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
        for ($i = 0; $i < 15; $i++) {
            DB::table('posts')->insert([
                'title' => $generator->sentence($nbWords = 3, $variableNbWords = true),
                'subtitle' => $generator->sentence($nbWords = 5, $variableNbWords = true),
                'body' => $generator->text,
                'citat' => $generator->sentence($nbWords = 6, $variableNbWords = true),
                'datum' => now(),
                'time' => now(),
                'img' => self::DEFAULT_PICTURE
            ]);
        }
    }
}
