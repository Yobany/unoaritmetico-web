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
        Operation::create(['name'=>'addition', 'symbol'=>'+', 'description'=>'add one number to another']);
        Operation::create(['name'=>'substraction', 'symbol'=>'-', 'description'=>'substract one number to another']);
        Operation::create(['name'=>'multiplication', 'symbol'=>'*', 'description'=>'multiply one number to another']);
        Operation::create(['name'=>'division', 'symbol'=>'/', 'description'=>'divide one number to another']);
    }
}
