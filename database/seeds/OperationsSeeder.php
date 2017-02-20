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
        Operation::create(['name'=>'suma', 'symbol'=>'+', 'description'=>'add one number to another']);
        Operation::create(['name'=>'resta', 'symbol'=>'-', 'description'=>'substract one number to another']);
        Operation::create(['name'=>'multiplicación', 'symbol'=>'*', 'description'=>'multiply one number to another']);
        Operation::create(['name'=>'división', 'symbol'=>'/', 'description'=>'divide one number to another']);
    }
}
