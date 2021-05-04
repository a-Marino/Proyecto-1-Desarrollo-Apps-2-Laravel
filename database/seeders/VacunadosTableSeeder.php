<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Vacunado;

class VacunadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vacunado = new Vacunado();
        $vacunado->apelnom='Juan 1';
        $vacunado->DNI=100;
        $vacunado->domicilio='Alsina 100';
        $vacunado->edad=66;
        $vacunado->grupo_riesgo = 1;
        $vacunado->save();
    }
}
