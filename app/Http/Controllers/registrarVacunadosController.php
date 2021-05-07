<?php

namespace App\Http\Controllers;

use App\Models\Dosis;
use App\Models\Vacuna;
use App\Models\Vacunado;
use App\Models\Vacunatorio;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registrarVacunadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $vacuna = array();
        $vacunatorios = array();
        $DNI = '';
        $vacunado = array();

        $apelnom = '';
        $edad = '';
        $domicilio = '';
        $grupo_riesgo = '';
        $tipo_vacuna = '';
        $dosis = array();
        $cant_dosis = 0;
        $cant_vacunados = 1;
        return view('registrarVacunados.index', compact('DNI', 'apelnom', 'edad', 'domicilio', 'grupo_riesgo', 'tipo_vacuna', 'vacunado', 'dosis', 'cant_dosis', 'cant_vacunados', 'vacuna', 'vacunatorios'));
    }


    public function buscar(Request $request)
    {

        $boton = $request->input('boton');

        if ($boton == 'grabar') {

            if ($request->input('cant_vacunados') == 0) {
                $vacunado = new Vacunado;

                $vacunado->DNI = $request->input('DNI');
                $vacunado->apelnom = $request->input('apelnom');
                $vacunado->edad = $request->input('edad');
                $vacunado->domicilio = $request->input('domicilio');
                $vacunado->grupo_riesgo = $request->input('grupo_riesgo');

                $vacunado->save();
            }

            $dosis = new Dosis();
            $dosis->tipo_vacuna = $request->input('tipo_vacuna');
            $dosis->DNI = $request->input('DNI');
            $dosis->Id_vacunatorio = $request->input('Id_vacunatorio');
            $dosis->Id_usuario = auth()->user()->id;

            $dosis->save();

            $boton = 'buscar';
        }


        if ($boton == 'buscar') {

            $vacunatorios = DB::table('asignaciones')
                ->where('user_id', auth()->user()->id)
                ->join('vacunatorios', 'asignaciones.vacunatorio_id', '=', 'vacunatorios.id')
                ->get();

            $DNI = $request->input('DNI');

            $vacunas_aplicadas = DB::table('dosis')
                ->select(DB::raw('tipo_vacuna,count(*) as aplicada'))
                ->WHERE('DNI', '=', $DNI)
                ->groupBy('tipo_vacuna');

            $vacuna = DB::table('vacunas')
                ->leftJoinSub($vacunas_aplicadas, 'vac_aplicadas', function ($join) {
                    $join->on('vacunas.id', '=', 'vac_aplicadas.tipo_vacuna');
                })
                ->whereRaw('aplicada IS NULL or dosis>aplicada')
                ->get();


            $vacunado = Vacunado::where('DNI', $DNI)->get();

            $cant_vacunados = count($vacunado);

            if ($cant_vacunados == 1) {

                $apelnom = $vacunado[0]->apelnom;
                $edad = $vacunado[0]->edad;
                $domicilio = $vacunado[0]->domicilio;
                $grupo_riesgo = $vacunado[0]->grupo_riesgo;
                $tipo_vacuna = $vacunado[0]->tipo_vacuna;


                $dosis = DB::table('dosis')
                    ->join('vacunas', 'dosis.tipo_vacuna', '=', 'vacunas.id')
                    ->join('enfermeros', 'dosis.Id_usuario', '=', 'enfermeros.user_id')
                    ->where('DNI', $DNI)
                    ->get();

                $cant_dosis = count($dosis);
            } else {
                $apelnom = '';
                $edad = '';
                $domicilio = '';
                $grupo_riesgo = '';
                $tipo_vacuna = '';
                $dosis = array();
                $cant_dosis = 0;
            }

            return view('registrarVacunados.index', compact('DNI', 'apelnom', 'edad', 'domicilio', 'grupo_riesgo', 'tipo_vacuna', 'vacunado', 'dosis', 'cant_dosis', 'cant_vacunados', 'vacuna', 'boton', 'vacunatorios'));
        }
    }
}
