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
        $now = date('Y-m-d H:i:s', strtotime('now'));
        DB::table('boards')->insert([
            [
                'board_name'=>'Politically Incorrect',
                'board_url'=>'pol',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'board_name'=>'Random',
                'board_url'=>'b',
                'created_at'=> $now,
                'updated_at'=> $now,
            ]
         ]);

        DB::table('threads')->insert([
            [
                'board_id'=>1,
                'title'=>'Welcome to /pol/!',
                'author'=>'DeeJay',
                'comment'=>'Make sure you read the rules before you start!',
                'file'=>'4chan.jpg',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'board_id'=>2,
                'title'=>'Welcome to /b/!',
                'author'=>'DeeJay',
                'comment'=>'Make sure you read the rules before you start!',
                'file'=>'4chan.jpg',
                'created_at'=> $now,
                'updated_at'=> $now,
            ]
        ]);

        DB::table('comments')->insert([
            [
                'thread_id'=>1,
                'author'=>'DEEJAY',
                'comment'=>'I am comment without an image.',
                'file'=>'',
                'created_at'=> $now,
                'updated_at'=> $now,
            ],
            [
                'thread_id'=>2,
                'author'=>'DEEJAY',
                'comment'=>'I am comment with an image.',
                'file'=>'4chan.jpg',
                'created_at'=> $now,
                'updated_at'=> $now,
            ]
        ]);

    }
}
