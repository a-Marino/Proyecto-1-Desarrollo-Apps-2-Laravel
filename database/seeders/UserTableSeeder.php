<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Enfermero;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usuario = new User();
        $usuario->apelnom='Administrador 1';
        $usuario->DNI=100;
        $usuario->email='admin@email.com';
        $usuario->role='admin';
        $usuario->password = bcrypt('100');
        $usuario->save();

        $usuario = new User();
        $usuario->apelnom='Enfermero 1';
        $usuario->DNI=101;
        $usuario->email='enfermero1@email.com';
        $usuario->role='enfermero';
        $usuario->password = bcrypt('101');
        $usuario->save();
        $enfermero = new Enfermero();
        $enfermero->user_id=2;
        $enfermero->RUP=100200;
        $enfermero->telefono=2926100101;
        $enfermero->save();

        $usuario = new User();
        $usuario->apelnom='Enfermero 2';
        $usuario->DNI=102;
        $usuario->email='enfermero2@email.com';
        $usuario->role='enfermero';
        $usuario->password = bcrypt('102');
        $usuario->save();
        $enfermero = new Enfermero();
        $enfermero->user_id=3;
        $enfermero->RUP=100201;
        $enfermero->telefono=2926100102;
        $enfermero->save();

        $usuario = new User();
        $usuario->apelnom='Gestion 1';
        $usuario->DNI=103;
        $usuario->email='gestion@email.com';
        $usuario->role='gestion';
        $usuario->password = bcrypt('103');
        $usuario->save();
    }
}
