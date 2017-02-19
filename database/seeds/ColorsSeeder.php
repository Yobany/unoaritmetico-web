<?php

use App\Color;
use Illuminate\Database\Seeder;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create(['name'=>'Blue']);
        Color::create(['name'=>'Yellow']);
        Color::create(['name'=>'Red']);
        Color::create(['name'=>'Green']);
    }
}
