<?php

use App\Operation;
use Illuminate\Database\Seeder;

class OperationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Operation::create(['name'=>'Suma', 'symbol'=>'+', 'description'=>'add one number to another']);
        Operation::create(['name'=>'Resta', 'symbol'=>'-', 'description'=>'substract one number to another']);
        Operation::create(['name'=>'Multiplicación', 'symbol'=>'*', 'description'=>'multiply one number to another']);
        Operation::create(['name'=>'División', 'symbol'=>'/', 'description'=>'divide one number to another']);
    }
}
