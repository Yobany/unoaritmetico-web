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
        CardPower::create(['name'=>'Más 1', 'description' => 'Hace que el siguiente jugador tome 1 carta extra']);
        CardPower::create(['name'=>'Más 2', 'description' => 'Hace que el siguiente jugador tome 2 cartas extras']);
        CardPower::create(['name'=>'Cambio de color', 'description' => 'Cambia el color de la carta del centro']);
        CardPower::create(['name'=>'Reversa', 'description' => 'Invierte el orden de los turnos']);
        CardPower::create(['name'=>'Bloqueo', 'description' => 'Salta el siguiente turno']);
    }
}
