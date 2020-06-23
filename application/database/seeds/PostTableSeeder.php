<?php

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert(array(
            array(
            'title' => Str::random(10),
            'author'=>Str::random(10),
            'body' => Str::random(100),
            'moreBody'=>Str::random(300),
            ),
            array(
            'title' => Str::random(10),
            'author'=>Str::random(10),
            'body' => Str::random(100),
            'moreBody'=>Str::random(300),
            ),
        ));

    }
}
