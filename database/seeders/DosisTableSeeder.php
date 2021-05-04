<?php

namespace Database\Seeders;

use App\Models\Dosis;
use Illuminate\Database\Seeder;

class DosisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dosis = new Dosis();
        $dosis->DNI=100;
        $dosis->Id_vacunatorio=2;
        $dosis->tipo_vacuna;
        $dosis->Id_vacunatorio;
        $dosis->save();

    }
}
