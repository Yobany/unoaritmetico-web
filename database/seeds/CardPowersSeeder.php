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
        CardPower::create(['name'=>'Plus 2', 'description' => 'Adds 2 cards to oponents']);
        CardPower::create(['name'=>'Plus 4', 'description' => 'Adds 4 cards to oponents']);
        CardPower::create(['name'=>'Change Color', 'description' => 'Changes the color']);
        CardPower::create(['name'=>'Reverse', 'description' => 'Reverse the turns order']);
    }
}
