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
        Color::create(['name'=>'Azul']);
        Color::create(['name'=>'Amarillo']);
        Color::create(['name'=>'Rojo']);
        Color::create(['name'=>'Verde']);
    }
}
