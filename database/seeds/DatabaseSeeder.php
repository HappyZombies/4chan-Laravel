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
    }
}
