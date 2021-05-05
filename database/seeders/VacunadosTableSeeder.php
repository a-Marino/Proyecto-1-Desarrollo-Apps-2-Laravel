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
        $vacunado->apelnom='Juan Garcia';
        $vacunado->DNI=4100100;
        $vacunado->domicilio='Alsina 100';
        $vacunado->edad=66;
        $vacunado->grupo_riesgo = 1;
        $vacunado->save();

        $vacunado = new Vacunado();
        $vacunado->apelnom='Maria Lopez';
        $vacunado->DNI=5100100;
        $vacunado->domicilio='Rivadavia 220';
        $vacunado->edad=72;
        $vacunado->grupo_riesgo = 2;
        $vacunado->save();
    }
}
