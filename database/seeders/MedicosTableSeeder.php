<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medico;

class MedicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $medico = new Medico();
        $medico->nombre = 'Dr. Sergio R. Mainini';
        $medico->save();

        $medico = new Medico();
        $medico->nombre = 'Dr. Facundo H. Bello';
        $medico->save();

        $medico = new Medico();
        $medico->nombre = 'Dr. Alberto Traveria';
        $medico->save();

        $medico = new Medico();
        $medico->nombre = 'Dr. Néstor A. Caccavo';
        $medico->save();

        $medico = new Medico();
        $medico->nombre = 'Dr. Juan C. Coria';
        $medico->save();
    }
}
