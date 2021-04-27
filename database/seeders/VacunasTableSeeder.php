<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vacuna;

class VacunasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vacuna = new Vacuna();
        $vacuna->nombre='Pfizer-BioNTech';
        $vacuna->dosis=2;
        $vacuna->save();

        $vacuna = new Vacuna();
        $vacuna->nombre='Moderna';
        $vacuna->dosis=2;
        $vacuna->save();

        $vacuna = new Vacuna();
        $vacuna->nombre='Astrazeneca';
        $vacuna->dosis=2;
        $vacuna->save();

        $vacuna = new Vacuna();
        $vacuna->nombre='Sputnik V';
        $vacuna->dosis=1;
        $vacuna->save();

    }
}
