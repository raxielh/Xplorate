<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Persona;
use App\Models\Respuestas;
use Session;
use Flash;
use Exception;
use Mail; 

class TestController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd(0);
        return view('test.index');
    }

    public function recuperar()
    {
        return view('test.recuperar');
    }

    public function recuperar_correo()
    {
        return view('test.recuperar_correo');
    }

    public function cambiar()
    {
        return view('test.pass');
    }

    public function recuperar_correo_action(Request $request)
    {
        $est=DB::select("SELECT * FROM persona WHERE cedula='$request->cedula' limit 1");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }

        if(count($est)==1){

            $sql="UPDATE 
                    persona 
                    SET
                    correo = '$request->correo'
                    wHERE `cedula` = '$e->cedula' ;
                    ";
            
            DB::select($sql);

            Flash::success('Cambio de correo exitoso');
            return view('test.recuperar_correo');

        }else{
            Flash::error('Este número de identificacion no se registra en nuestra Base de Datos');
            return view('test.recuperar_correo');
            //
        }
    }

    public function pass_action(Request $request)
    {
        $est=DB::select("SELECT * FROM persona WHERE cedula='$request->cedula' limit 1");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }

        if(count($est)==1){

            $sql="UPDATE 
                    persona 
                    SET
                    pass = '$request->pass'
                    wHERE `cedula` = '$e->cedula' ;
                    ";
            
            DB::select($sql);

            Flash::success('Cambio de contraseña exitoso <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/web/?page_id=29">Ir al test</a>');
            return view('test.pass');

        }else{
            Flash::error('Este número de identificacion no se registra en nuestra Base de Datos');
            return view('test.pass');
            //
        }
    }

    public function recuperar_action(Request $request)
    {

        $est=DB::select("SELECT * FROM persona WHERE cedula='$request->cedula' limit 1");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }

        if(count($est)==1){

            $data = array('nombre'=>$e->nombre .' '.$apellido=$e->apellido,'cedula'=>$cedula);

            $co=$e->correo;

            Mail::send('mails.recuperar', $data, function($message) use ($co) {
                $message->to($co, 'Xplorate')
                ->subject('Nueva Contraseña Xplorate');
                $message->from($co,'Xplorate');
            });

            Flash::success('Te hemos  enviado un link a tu correo electronico '.$e->correo);
            return view('test.recuperar');

        }else{
            Flash::error('Este número de identificacion no se registra en nuestra Base de Datos');
            return view('test.recuperar');
            //return view('test.index');
        }

    }

    public function bienvenido()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        $res=DB::select("
            SELECT count(*) as c FROM respuestas WHERE persona='".$cedula."'
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){
            return view('test.bienvenido')->with('res', $res)->with('nombre', $nombre)->with('apellido', $apellido);
        }else{
            return view('test.index');
        }
    }

    public function test()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }

        $cantidad_pregunta=DB::select("
            SELECT count(*) as c FROM preguntas p where p.id<>0
        ");


        $pregunta=DB::select("
            SELECT p.*,c.desc FROM preguntas p,categoria c
            WHERE p.`id` NOT IN(SELECT pregunta FROM respuestas WHERE persona='".$cedula."') 
            AND p.categoria=c.id AND p.id<>0
            ORDER BY c.orden ASC limit 1
        ");

        

        $respuestas=DB::select("
            SELECT count(*) as c FROM respuestas
            WHERE persona='".$cedula."' 
        ");

        //dd($cantidad_pregunta);

       if($pregunta){
        $ps=DB::select("
            SELECT * FROM posibles_respuestas where pregunta=".$pregunta[0]->id." order by orden ASC
        ");
       
        //dd($ps);

        if(count($est)==1){
            return view('test.test')
            ->with('nombre', $nombre)
            ->with('apellido', $apellido)
            ->with('pregunta', $pregunta)
            ->with('cantidad_pregunta', $cantidad_pregunta)
            ->with('respuestas', $respuestas)
            ->with('ps', $ps);
        }else{
            return view('test.index');
        }

       }else{
        if(count($est)==1){
            return view('test.test')
            ->with('nombre', $nombre)
            ->with('apellido', $apellido)
            ->with('pregunta', $pregunta)
            ->with('cantidad_pregunta', $cantidad_pregunta)
            ->with('respuestas', $respuestas);

        }
       }



    }

    public function contestar(Request $request)
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            try {

                $Respuestas = new Respuestas();
                $Respuestas->persona = $cedula;
                $Respuestas->posibles_respuesta = $request->posibles_respuesta;
                $Respuestas->pregunta = $request->pregunta;

                if($request->tipo_pregunta==3){
                    $Respuestas->respuesta_abierta = implode("|",$request->respuesta_abierta);
                }else{
                    $Respuestas->respuesta_abierta = $request->respuesta_abierta;
                }


                if($Respuestas->posibles_respuesta==3718){
                    $sql="INSERT INTO respuestas(`persona`,`posibles_respuesta`,`pregunta`,`respuesta_abierta`)
                        SELECT '".$e->cedula."' `persona`,
                        0`posibles_respuesta`,
                        p.id `pregunta`,
                        '' `respuesta_abierta`
                        FROM preguntas p,categoria c
                        WHERE p.`id` NOT IN(SELECT pregunta FROM respuestas WHERE persona='".$e->cedula."' ) 
                        AND p.categoria=c.id AND p.id<>0
                        ORDER BY c.orden ASC";
                    DB::select($sql);
                }else{
                   $Respuestas->save(); 
                }
                
                return back()->withInput();

            } catch (Exception $e) {
            
                return back()->withInput();
            
            }

        }else{
            return view('test.index');
        }
    }

    public function inicio()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            $hizo_test=DB::select("
                SELECT count(*) as c FROM b_respuestas_historic_1 WHERE persona='".$cedula."'
            ");
            foreach ($hizo_test as $h) {
                $hizo=$h->c;
            }
            return view('test.menu')->with('nombre', $nombre)->with('apellido', $apellido)->with('hizo', $hizo);
        }else{
            return view('test.index');
        }
    }

    public function registro()
    {
    	$sexo = DB::select("
            SELECT * from genero
        ");
    	$raza_etnicidad = DB::select("
            SELECT * from raza_etnicidad
        ");
    	$estado_civil = DB::select("
            SELECT * from estado_civil
        ");
    	$departamento = DB::select("
            SELECT * from departamento
        ");
        return view('test.register')
        							->with('sexo', $sexo)
        							->with('raza_etnicidad', $raza_etnicidad)
        							->with('estado_civil', $estado_civil)
        							->with('departamento', $departamento);
    }

    public function buscar_municipio($id)
    {
    	return DB::select("
            SELECT * from municipio where departamento_iddepartamento=".$id."
        ");
    }
    
    public function buscar_identificacion($id)
    {
    	return DB::select("
            SELECT count(*) as t from b_persona_categoria where cedula=".$id."
        ");
    }
    
    public function procesar_registro(Request $request)
    {
      try {
        $Persona = new Persona();
        $Persona->nombre = ucwords($request->nombre);
        $Persona->apellido =ucwords($request->apellido);
        $Persona->cedula = $request->cedula;
        $Persona->pass = $request->pass;
        $Persona->edad = $request->edad;
        $Persona->genero = $request->genero;
        $Persona->estado_civil = $request->estado_civil;
        $Persona->raza_etnicidad = $request->raza;
        $Persona->lugar_nacimiento = $request->municipio;
        $Persona->estado = 1;
        $Persona->correo = $request->correo;
        $Persona->save();
        Flash::success('Felicitaciones te has registrado!, Que esperas ingresa tu cedula y contraseña');
        return view('test.index');
      } catch (Exception $e) {
        return "error fatal ->".$e->getMessage();
      }
    }

    public function calcular()
    {

        $cedula = Session::get('estudiante');

        $cantidad_pregunta=DB::select("
            SELECT count(*) as c FROM preguntas p where p.id<>0
        ");

        $respuestas=DB::select("
            SELECT count(*) as c FROM respuestas
            WHERE persona='".$cedula."'
        ");


        foreach ($respuestas as $r) {
            $respondidas = $r->c;
        }

        foreach ($cantidad_pregunta as $cp) {
            $total = $cp->c;
        }

        if($respondidas==$total){

            DB::select("CALL proc_historico_respuesta('".$cedula."')");

            $est=DB::select("
                SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
            ");


            foreach ($est as $e) {
                $cedula=$e->cedula;
                $nombre=$e->nombre;
                $apellido=$e->apellido;
            }
            if(count($est)==1){
                $rowdata=DB::select("
                    SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                    FROM b_rowdata_1 
                    WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 DESC LIMIT 1
                ");
                return view('test.analisis')->with('rowdata', $rowdata)->with('nombre', $nombre)->with('apellido', $apellido);
            }else{
                return view('test.index');
            }

        }else{

            return redirect('/test');

        }

    }

    public function analisis()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            $rowdata=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 DESC LIMIT 1
            ");

            //dd($rowdata);

            return view('test.analisis')
                    ->with('nombre', $nombre)
                    ->with('apellido', $apellido)
                    ->with('rowdata', $rowdata);
        
        }else{
            return view('test.index');
        }
    }

    public function historico()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            $rowdata=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 ASC
            ");

            $rowdata_h=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 DESC limit 2
            ");

            return view('test.historicos')
                    ->with('nombre', $nombre)
                    ->with('apellido', $apellido)
                    ->with('rowdata', $rowdata)
                    ->with('rowdata_h', $rowdata_h);
        
        }else{
            return view('test.index');
        }
    }

    public function historico_social()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            $rowdata=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 ASC
            ");

            $rowdata_h=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 DESC limit 2
            ");

            return view('test.historico_social')
                    ->with('nombre', $nombre)
                    ->with('apellido', $apellido)
                    ->with('rowdata', $rowdata)
                    ->with('rowdata_h', $rowdata_h);
        
        }else{
            return view('test.index');
        }
    }

    public function historico_proposito()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            $rowdata=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 ASC
            ");

            $rowdata_h=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 DESC limit 2
            ");

            return view('test.historico_proposito')
                    ->with('nombre', $nombre)
                    ->with('apellido', $apellido)
                    ->with('rowdata', $rowdata)
                    ->with('rowdata_h', $rowdata_h);
        
        }else{
            return view('test.index');
        }
    }
  
    public function historico_fisico()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            $rowdata=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 ASC
            ");

            $rowdata_h=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 DESC limit 2
            ");

            return view('test.historico_fisico')
                    ->with('nombre', $nombre)
                    ->with('apellido', $apellido)
                    ->with('rowdata', $rowdata)
                    ->with('rowdata_h', $rowdata_h);
        
        }else{
            return view('test.index');
        }
    }

    public function historico_financiero()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            $rowdata=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 ASC
            ");

            $rowdata_h=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 DESC limit 2
            ");

            return view('test.historico_financiero')
                    ->with('nombre', $nombre)
                    ->with('apellido', $apellido)
                    ->with('rowdata', $rowdata)
                    ->with('rowdata_h', $rowdata_h);
        
        }else{
            return view('test.index');
        }
    }

    public function historico_emocional()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            $rowdata=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 ASC
            ");

            $rowdata_h=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 DESC limit 2
            ");

            return view('test.historico_emocional')
                    ->with('nombre', $nombre)
                    ->with('apellido', $apellido)
                    ->with('rowdata', $rowdata)
                    ->with('rowdata_h', $rowdata_h);
        
        }else{
            return view('test.index');
        }
    }

    public function historico_depresion()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            $rowdata=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 ASC
            ");

            $rowdata_h=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 DESC limit 2
            ");

            return view('test.historico_depresion')
                    ->with('nombre', $nombre)
                    ->with('apellido', $apellido)
                    ->with('rowdata', $rowdata)
                    ->with('rowdata_h', $rowdata_h);
        
        }else{
            return view('test.index');
        }
    }

    public function historico_ansiedad()
    {
        $cedula = Session::get('estudiante');

        $est=DB::select("
            SELECT cedula,nombre,apellido FROM persona WHERE cedula='".$cedula."' LIMIT 1
        ");

        foreach ($est as $e) {
            $cedula=$e->cedula;
            $nombre=$e->nombre;
            $apellido=$e->apellido;
        }
        if(count($est)==1){

            $rowdata=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 ASC
            ");

            $rowdata_h=DB::select("
                SELECT physical,social,financial,emotional,significance,ansiedad,depresion,fechaencuesta 
                FROM b_rowdata_1 
                WHERE persona='".$cedula."' ORDER BY respuestas_historic_1 DESC limit 2
            ");

            return view('test.historico_ansiedad')
                    ->with('nombre', $nombre)
                    ->with('apellido', $apellido)
                    ->with('rowdata', $rowdata)
                    ->with('rowdata_h', $rowdata_h);
        
        }else{
            return view('test.index');
        }
    }

    public function consulta_cambio(Request $request)
    {
        return DB::select("
            SELECT * FROM detalle_historic WHERE cambio='".$request->t_cambio."' AND dimencion='".$request->t_dimension."'
        ");

    }

}
