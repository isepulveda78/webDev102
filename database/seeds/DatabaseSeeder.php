<?php

use Illuminate\Database\Seeder;
use App\Series;
use App\Video;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Series::class, 10)->create()->each(function($series){
            $series->videos()->saveMany(factory(Video::class, 10)->make());
        });
    }
}
