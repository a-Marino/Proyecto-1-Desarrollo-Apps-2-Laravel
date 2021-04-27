<?php

namespace Database\Seeders;

use App\Models\User;
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
        $usuario->role='enfermero';
        $usuario->telefono=2926400100;
        $usuario->password = bcrypt('100');
        $usuario->save();

        $usuario = new User();
        $usuario->apelnom='Enfermero 1';
        $usuario->DNI=101;
        $usuario->email='enfermero1@email.com';
        $usuario->role='enfermero';
        $usuario->RUP=101101;
        $usuario->telefono=2926400101;
        $usuario->password = bcrypt('101');
        $usuario->save();

        $usuario = new User();
        $usuario->apelnom='Enfermero 2';
        $usuario->DNI=102;
        $usuario->email='enfermero2@email.com';
        $usuario->role='enfermero';
        $usuario->RUP=102102;
        $usuario->telefono=2926400102;
        $usuario->password = bcrypt('102');
        $usuario->save();

        $usuario = new User();
        $usuario->apelnom='Gestión 1';
        $usuario->DNI=103;
        $usuario->email='gestion@email.com';
        $usuario->role='gestion';
        $usuario->telefono=2926400103;
        $usuario->password = bcrypt('103');
        $usuario->save();
    }
}
