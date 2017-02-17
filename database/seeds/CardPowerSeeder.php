<?php

use App\CardPower;
use Illuminate\Database\Seeder;

class CardPowerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CardPower::create(['name'=>'Plus 2', 'Adds 2 cards to oponents']);
        CardPower::create(['name'=>'Plus 4', 'Adds 4 cards to oponents']);
        CardPower::create(['name'=>'Change Color', 'Changes the color']);
        CardPower::create(['name'=>'Reverse', 'Reverse the turns order']);
    }
}
