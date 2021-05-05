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
        $dosis->DNI=4100100;
        $dosis->Id_vacunatorio=2;
        $dosis->Id_usuario=2;
        $dosis->tipo_vacuna=1;
        $dosis->Id_vacunatorio=1;
        $dosis->save();

        $dosis = new Dosis();
        $dosis->DNI=4100100;
        $dosis->Id_vacunatorio=2;
        $dosis->Id_usuario=3;
        $dosis->tipo_vacuna=1;
        $dosis->Id_vacunatorio=1;
        $dosis->save();

        $dosis = new Dosis();
        $dosis->DNI=5100100;
        $dosis->Id_vacunatorio=2;
        $dosis->Id_usuario=3;
        $dosis->tipo_vacuna=1;
        $dosis->Id_vacunatorio=1;
        $dosis->save();

    }
}
