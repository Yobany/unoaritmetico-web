<?php

use App\CardType;
use Illuminate\Database\Seeder;

class CardTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CardType::create(['name' => 'operation', 'card with numeric operations']);
        CardType::create(['name' => 'special', 'card with powers']);
    }
}
