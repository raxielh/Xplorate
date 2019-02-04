<?php

namespace App\Http\Controllers;

use App\Http\Requests\Top40Request;
use Illuminate\Support\Facades\DB;

class Top40Controller extends Controller
{
    function index(){
        $campus = DB::table('ps_campus')->get();
        return view('index', compact('campus'));
    }

    function mostrarEstudiantes(Top40Request $request){
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        $campus = $request->input('campus');
        $ganadores = array();
        $respondidos = DB::table('persona AS per')
            ->join('b_rowdata_1 AS br1', 'br1.persona', '=', 'per.cedula')
            ->join('b_persona_categoria AS bpc', 'bpc.cedula', '=','per.cedula')
            ->whereBetween('fechaencuesta', [$fecha_inicio, $fecha_fin])
            ->where('bpc.campus','=', $campus)
            ->count();
        for ($i=39; $i < $respondidos; $i++){
            $query =  DB::table('persona AS per')
                ->join('b_rowdata_1 AS br1', 'br1.persona', '=', 'per.cedula')
                ->join('b_persona_categoria AS bpc', 'bpc.cedula', '=','per.cedula')
                ->whereBetween('fechaencuesta', [$fecha_inicio, $fecha_fin])
                ->where('bpc.campus','=', $campus)
                ->skip($i)
                ->take(1)
                ->first();
                if ($query){
                    $ganadores[] = $query;
                }
            $i = $i+39;
        }

        return $ganadores;
    }
}
