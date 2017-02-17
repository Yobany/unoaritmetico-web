<?php

use App\Operation;
use Illuminate\Database\Seeder;

class OperationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Operation::create(['name'=>'addition', 'symbol'=>'+', 'description'=>'addition']);
        Operation::create(['name'=>'substraction', 'symbol'=>'-', 'description'=>'substraction']);
        Operation::create(['name'=>'multiplication', 'symbol'=>'*', 'description'=>'multiplication']);
        Operation::create(['name'=>'division', 'symbol'=>'/', 'description'=>'division']);
    }
}
