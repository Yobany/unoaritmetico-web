<?php

use App\User;
use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->role = "ADMIN";
        $user->first_name = "Unoaritmetico";
        $user->last_name = "Administrador";
        $user->email = "admin@unoaritmetico.com";
        $user->active = 1;
        $user->password = "unoaritmeticoadmin";
        $user->save();
    }
}
