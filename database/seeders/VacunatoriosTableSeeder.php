<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacunatorio;

class VacunatoriosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vacunatorio = new Vacunatorio();
        $vacunatorio->nombre = 'Vacunatorio 1';
        $vacunatorio->centro_id = 2030039;
        $vacunatorio->medico = 'Dr. Sergio R. Mainini';
        $vacunatorio->horario = '9:00hs a 13:30hs';
        $vacunatorio->telefono = 2923132456;
        $vacunatorio->save();

        $vacunatorio = new Vacunatorio();
        $vacunatorio->nombre = 'Vacunatorio 2';
        $vacunatorio->centro_id = 20300055;
        $vacunatorio->medico = 'Dr. Facundo H. Bello';
        $vacunatorio->horario = '8:00hs a 12:45hs';
        $vacunatorio->telefono = 2923132463;
        $vacunatorio->save();

        $vacunatorio = new Vacunatorio();
        $vacunatorio->nombre = 'Vacunatorio 3';
        $vacunatorio->centro_id = 20300098;
        $vacunatorio->medico = 'Dr. Alberto Traveria';
        $vacunatorio->horario = '9:30hs a 14:00hs';
        $vacunatorio->telefono = 2923132267;
        $vacunatorio->save();

        $vacunatorio = new Vacunatorio();
        $vacunatorio->nombre = 'Vacunatorio 4';
        $vacunatorio->centro_id = 23300063;
        $vacunatorio->medico = 'Dr. Néstor A. Caccavo';
        $vacunatorio->horario = '13:00hs a 18:00hs';
        $vacunatorio->telefono = 2923132987;
        $vacunatorio->save();

        $vacunatorio = new Vacunatorio();
        $vacunatorio->nombre = 'Vacunatorio 5';
        $vacunatorio->centro_id = 23300080;
        $vacunatorio->medico = 'Dr. Juan C. Coria';
        $vacunatorio->horario = '14:00hs a 17:30hs';
        $vacunatorio->telefono = 2923138146;
        $vacunatorio->save();
    }
}
