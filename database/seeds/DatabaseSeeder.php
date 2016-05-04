<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('boards')->insert([
            [
                'board_name'=>'Politically Incorrect',
                'board_url'=>'pol'
            ],
            [
                'board_name'=>'Random',
                'board_url'=>'b'
            ]
         ]);

        DB::table('threads')->insert([
            [
                'board_id'=>1,
                'title'=>'Welcome to /pol/!',
                'author'=>'DeeJay',
                'comment'=>'Make sure you read the rules before you start!',
                'image'=>'4chan.png',
            ],
            [
                'board_id'=>2,
                'title'=>'Welcome to /b/!',
                'author'=>'DeeJay',
                'comment'=>'Make sure you read the rules before you start!',
                'image'=>'4chan.png',
            ]
        ]);
    }
}
