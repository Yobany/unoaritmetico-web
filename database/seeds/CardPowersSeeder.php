<?php

use App\CardPower;
use Illuminate\Database\Seeder;

class CardPowersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CardPower::create(['name'=>'Más 2', 'description' => 'Adds 2 cards to oponents']);
        CardPower::create(['name'=>'Más 4', 'description' => 'Adds 4 cards to oponents']);
        CardPower::create(['name'=>'Cambio de color', 'description' => 'Changes the color']);
        CardPower::create(['name'=>'Reversa', 'description' => 'Reverse the turns order']);
    }
}
