<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePersonaCategoriaRequest;
use App\Http\Requests\UpdatePersonaCategoriaRequest;
use App\Repositories\PersonaCategoriaRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;
use Session;
use Flash;
use Exception;
class PersonaCategoriaController extends AppBaseController
{
    /** @var  PersonaCategoriaRepository */
    private $personaCategoriaRepository;

    public function __construct(PersonaCategoriaRepository $personaCategoriaRepo)
    {
        $this->personaCategoriaRepository = $personaCategoriaRepo;
    }

    /**
     * Display a listing of the PersonaCategoria.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        //$this->personaCategoriaRepository->pushCriteria(new RequestCriteria($request));
        //$personaCategorias=DB::select("SELECT * FROM b_persona_categoria")->get()->paginate(15);
        //$personaCategorias=\App\Models\PersonaCategoria::name($request->get('campo'))->orderBy('persona_categoria','DESC')->paginate();




        $personaCategorias = DB::table('b_persona_categoria')
                ->join('b_tipoempleado', 'b_persona_categoria.tipoempleado', '=', 'b_tipoempleado.tipoempleado')
                ->join('b_cargo', 'b_persona_categoria.cargo', '=', 'b_cargo.cargo')
                ->orWhere('cedula', 'like', '%' .$request->get('campo'). '%')
                ->orWhere('nombres', 'like', '%' .$request->get('campo'). '%')
                ->select('b_persona_categoria.persona_categoria','b_persona_categoria.cedula',
                        'b_tipoempleado.desctipoempleado as tipoempleado',
                        'b_cargo.desccargo as cargo',
                        'b_persona_categoria.campus',
                        'b_persona_categoria.acad_prog',
                        'b_persona_categoria.nombres')
                //->toSql();
                ->paginate(12);



        return view('persona_categorias.index')
            ->with('personaCategorias', $personaCategorias);
    }

    /**
     * Show the form for creating a new PersonaCategoria.
     *
     * @return Response
     */
    public function create()
    {
        return view('persona_categorias.create');
    }

    /**
     * Store a newly created PersonaCategoria in storage.
     *
     * @param CreatePersonaCategoriaRequest $request
     *
     * @return Response
     */
    public function store(CreatePersonaCategoriaRequest $request)
    {
        $input = $request->all();

        $personaCategoria = $this->personaCategoriaRepository->create($input);

        Flash::success('Persona Categoria saved successfully.');

        return redirect(route('personaCategorias.index'));
    }

    /**
     * Display the specified PersonaCategoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $personaCategoria = $personaCategorias=DB::select("SELECT * FROM b_persona_categoria where persona_categoria=$id");

        if (empty($personaCategoria)) {
            Flash::error('Persona Categoria not found');

            return redirect(route('personaCategorias.index'));
        }

        return view('persona_categorias.show')->with('personaCategoria', $personaCategoria);
    }

    /**
     * Show the form for editing the specified PersonaCategoria.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $personaCategoria=DB::select("SELECT * FROM b_persona_categoria where persona_categoria=$id");

        if (empty($personaCategoria)) {
            Flash::error('Persona Categoria not found');

            return redirect(route('personaCategorias.index'));
        }

        return view('persona_categorias.edit')->with('personaCategoria', $personaCategoria);
    }

    /**
     * Update the specified PersonaCategoria in storage.
     *
     * @param  int              $id
     * @param UpdatePersonaCategoriaRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatePersonaCategoriaRequest $request)
    {
        $personaCategoria = $this->personaCategoriaRepository->findWithoutFail($id);

        if (empty($personaCategoria)) {
            Flash::error('Persona Categoria not found');

            return redirect(route('personaCategorias.index'));
        }

        $personaCategoria = $this->personaCategoriaRepository->update($request->all(), $id);

        Flash::success('Persona Categoria updated successfully.');

        return redirect(route('personaCategorias.index'));
    }

    /**
     * Remove the specified PersonaCategoria from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $personaCategoria = DB::select("DELETE FROM b_persona_categoria where persona_categoria=$id");

        Flash::success('Persona Categoria deleted successfully.');

        return redirect(route('personaCategorias.index'));
    }
}
