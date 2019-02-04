<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePreguntasRequest;
use App\Http\Requests\UpdatePreguntasRequest;
use App\Repositories\PreguntasRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Categoria;

class PreguntasController extends AppBaseController
{
    /** @var  PreguntasRepository */
    private $preguntasRepository;

    public function __construct(PreguntasRepository $preguntasRepo)
    {
        $this->preguntasRepository = $preguntasRepo;
    }

    /**
     * Display a listing of the Preguntas.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->preguntasRepository->pushCriteria(new RequestCriteria($request));
        $preguntas = $this->preguntasRepository->all();

        return view('preguntas.index')
            ->with('preguntas', $preguntas);
    }

    /**
     * Show the form for creating a new Preguntas.
     *
     * @return Response
     */
    public function create()
    {
        return view('preguntas.create');
    }

    /**
     * Store a newly created Preguntas in storage.
     *
     * @param CreatePreguntasRequest $request
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        //dd($input);
        //dd($input['descripcion']);
        $sql="INSERT INTO preguntas(descripcion,estado,orden,categoria,tipo_pregunta,dependiente) VALUES('".$input['descripcion']."','".$input['estado']."','".$input['orden']."','".$input['categoria']."','".$input['tipo_pregunta']."','".$input['siono']."')";
        //return $sql;
        DB::select($sql);


        Flash::success('Preguntas Guardado exitosamente.');

        return back();

    }

    /**
     * Display the specified Preguntas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $preguntas = $this->preguntasRepository->findWithoutFail($id);
        $posiblesRespuestas = DB::select("
            SELECT 
                p.id,
                p.`descripcion`,
                p.pregunta,
                p.`orden`,
                p.`valor`,
                preguntas.`categoria`
                FROM
                `posibles_respuestas` p,
                preguntas
                WHERE 
                `p`.`pregunta`=`preguntas`.id AND
                `p`.`pregunta`=".$id."
                ORDER BY p.orden ASC
        ");


        if (empty($preguntas)) {
            Flash::error('Preguntas not found');

            return redirect(route('preguntas.index'));
        }
        $preguntadependiente = DB::table('preguntas')
            ->pluck('descripcion','id');

        return view('preguntas.show')->with('preguntas', $preguntas)->with('posiblesRespuestas', $posiblesRespuestas)->with('preguntadependiente', $preguntadependiente);
    }

    /**
     * Show the form for editing the specified Preguntas.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $preguntas = $this->preguntasRepository->findWithoutFail($id);

        if (empty($preguntas)) {
            Flash::error('Preguntas not found');

            return redirect(route('preguntas.index'));
        }
        $Categoria=Categoria::pluck('titulo','id');
                $tipo_pregunta = DB::table('tipo_pregunta')
            ->pluck('descripcion','id');

        $siono = DB::table('siono')
            ->pluck('descripcion','id');
        return view('preguntas.edit')->with('preguntas', $preguntas)->with('Categoria', $Categoria)->with('tipo_pregunta', $tipo_pregunta)->with('siono', $siono);
    }

    /**
     * Update the specified Preguntas in storage.
     *
     * @param  int              $id
     * @param UpdatePreguntasRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePreguntasRequest $request)
    {
        $preguntas = $this->preguntasRepository->findWithoutFail($id);

        if (empty($preguntas)) {
            Flash::error('Preguntas not found');

            return redirect(route('preguntas.index'));
        }

        $preguntas = $this->preguntasRepository->update($request->all(), $id);

        Flash::success('Preguntas Actualizado con exito.');

        return back();
    }

    /**
     * Remove the specified Preguntas from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $preguntas = $this->preguntasRepository->findWithoutFail($id);

        if (empty($preguntas)) {
            Flash::error('Preguntas not found');

            return redirect(route('preguntas.index'));
        }

        $this->preguntasRepository->delete($id);

        Flash::success('Preguntas Borrado con exito.');

        return back();
    }
}
