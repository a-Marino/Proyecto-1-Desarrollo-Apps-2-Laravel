<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Centro;


class CentrosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $centro = new Centro();
      $centro->id =2030039;
      $centro->nombre='Hospital Municipal “Dr. Raúl Caccavo"';
      $centro->localidad= 'Coronel Suárez';
      $centro->save();

      $centro = new Centro();
      $centro->id =20300055;
      $centro->nombre='Hospital Municipal “Lucero del Alba”';
      $centro->localidad='Huanguelén';
      $centro->save();

      $centro = new Centro();
      $centro->id =20300098;
      $centro->nombre='Unidad Sanitaria Pueblo San José';
      $centro->localidad= 'San José';
      $centro->save();

      $centro = new Centro();
      $centro->id =23300063;
      $centro->nombre='Unidad Sanitaria Dr. Lew Frandzman';
      $centro->localidad= 'Santa María';
      $centro->save();

      $centro = new Centro();
      $centro->id =23300080;
      $centro->nombre='Unidad Sanitaria Santa Trinidad';
      $centro->localidad= 'Santa Trinidad';
      $centro->save();

    }
}
