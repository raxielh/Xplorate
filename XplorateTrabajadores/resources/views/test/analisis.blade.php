<?php 
  foreach ($rowdata as $rd) {
    $salud=$rd->physical; $social=$rd->social; $financiero=$rd->financial;
    $emocional=$rd->emotional; $significado=$rd->significance; $fecha=$rd->fechaencuesta;
    $ansiedad=$rd->ansiedad;$depresion=$rd->depresion;
  }

  if($depresion<17){
    $c_depresion='green';
    $d_depresion='Se siente bien, vive feliz, tranquilo(a) y activo(a). En algunas ocasiones experimenta sentimientos
de tristeza, pero dispone de las herramientas necesarias para hacer frente a cualquier problema y
no deja que nada impida sentirse bien. Es consciente de la importancia de vivir feliz. Continúa
participando en las actividades que lo(a) ayudan a sentirse positivo(a) y satisfecho(a) con la vida.';
  }
  if($depresion>=17 & $depresion <=22){
    $c_depresion='#e0e037';
    $d_depresion='Es posible que sienta tristeza, apatía, cansancio, falta de interés y desilusión, pero de una forma
leve que no afecta su vida cotidiana o sus actividades diarias. Según lo que está aconteciendo en
su vida, puede ser útil pensar en realizar las actividades que le brinden mayor alegría, lo(a) hagan
sentirse vivo(a) o lo(a) ayuden a sentirse positivo de manera regular.';
  }
  if($depresion>=23 & $depresion <=32){
    $c_depresion='orange';
    $d_depresion='Siente tristeza, apatía, cansancio, falta de interés, desilusión, desesperación, entre otros. En éste
punto se paraliza un poco la vida, afectando las actividades sociales, familiares y laborales. La
investigación ha demostrado que experimentar éstos sentimientos negativos está relacionado con
resultados pobres en la vida. Busque maneras de cambiar a un estado de mayor alegría. Podría ser
útil el apoyo de un consejero, amigo de confianza o especialista de la salud.';
  } 
  if($depresion>=33){
    $c_depresion='red';
    $d_depresion='Siente una pérdida total de interés por la vida y desaparición de las fuerzas físicas que afecta las
actividades sociales, familiares y laborales. La investigación en psicología positiva está
demostrando que las actividades positivas pueden ayudar a generar emociones positivas, lo cual le
ayudará a mejorar su estado. Le recomendamos buscar apoyo de un profesional de la salud que
lo(a) ayude a tratar de mejorar lo que está viviendo de manera eficaz y también realizar
actividades que le generen bienestar.';
  } 

  if($ansiedad<=15){
    $c_ansiedad='green';
    $d_ansiedad='Se siente bien, por lo general vive tranquilo(a) y relajado(a). En algunas ocasiones puede tener
leves sensaciones emocionales y físicas ante determinadas situaciones, pero dispone de las
herramientas necesarias para hacer frente a los problemas manteniendo la calma. Es consciente
de la importancia de vivir tranquilo(a) y sabe cómo evitar la preocupación excesiva y los agobios.
Continúa participando en las actividades que lo(a) ayudan a sentirse bien y satisfecho(a).';
  }
  if($ansiedad>=16 & $ansiedad <=19){
    $c_ansiedad='#e0e037';
    $d_ansiedad='Generalmente está tranquilo(o), aunque en ocasiones se siente nervioso(a) por las presiones del
día a día. Esto lo(a) mantiene alerta, debido a la activación de su organismo frente a una situación,
pero por lo general consigue descansar mientras duerme y por la mañana se levanta con la energía
para afrontar el día. No se preocupe, un poco de ansiedad puede en ocasiones ayudar a
mantenerse activo(a) y dispuesto(a).';
  }
  if($ansiedad>=20 & $ansiedad <=27){
    $c_ansiedad='orange';
    $d_ansiedad='Tiene la sensación de que vive días difíciles. En ocasiones se siente nervioso(a), pesimista,
preocupado(a), agobiado(a) y empieza a sentir síntomas físicos en los momentos de más
preocupación, aunque también tiene ganas de seguir adelante. Busque maneras de cambiar a un
estado de mayor tranquilidad y considere buscar orientación de un consejero o especialista de la
salud que lo(a) ayude a manejar la ansiedad.';
  } 
  if($ansiedad>=28){
    $c_ansiedad='red';
    $d_ansiedad='Generalmente se siente preocupado(a), con miedo, piensa que no va a poder afrontar el día a día y
tiene la sensación de que cada día se vuelve más angustiante, lo cual a menudo detiene cualquier
iniciativa o decisión. Los síntomas físicos y psicológicos se hacen evidentes. A nivel social es posible
que experimente dificultades en mantener buenas relaciones con sus amigos. La investigación ha
demostrado que tener éstos sentimientos negativos frecuentemente, está relacionado con
resultados negativos en la vida y la salud. Es importante que busque ayuda por parte de un
profesional de la salud para tratar de manejar lo que está viviendo de una manera eficaz.';
  } 




  if($salud>=4){
    $c_salud='green';
    $d_salud='Tiene un estado físico excelente y es capaz de desempeñar las actividades diarias. Continua manteniendo el buen estado físico mediante el ejercicio regular moderado, come saludablemente, duerme adecuadamente, y realiza otras actividades que encuentra útil. ';
  }
  if($salud>2 & $salud <4){
    $c_salud='#e0e037';
    $d_salud='Generalmente goza de buena salud física, aunque puede estar manejando dolor o padeciendo alguna afección de salud que afecte sus actividades diarias en el trabajo o en lo social. Consultar con su médico para contar con las estrategias del manejo del dolor y para apoyar las actividades cotidianas podría ser útil. Apoya su salud física mediante el ejercicio moderado regular, y come saludablemente; duerme adecuadamente, y realiza otras actividades que encuentra que ayudan a la salud. ';
  }
  if($salud<=2){
    $c_salud='red';
    $d_salud='No goza de buena salud física y esto afecta su capacidad para realizar sus actividades cotidianas. Si no ha consultado un doctor recientemente, considere recibir ayuda de un especialista o de otro profesional de la salud. Si está trabajando con un doctor, hable con él (ella) acerca de estrategias sobre cómo manejar el dolor y ayudar a que sea efectivo. El ejercicio leve,  comer saludablemente, dormir adecuadamente pueden ser un apoyo.  ';
  } 

  if($social>=4){
    $c_social='green';
    $d_social='Tiene relaciones fuertes que le brindan apoyo. Se siente cercana(o) a los demás, y está segura(o) de que sus amistades /familia estarán ahí cuando los necesite. Sigue invirtiendo en sus relaciones personales actuales – invierte tiempo en sus seres queridos; les deja saber que aprecia el apoyo recibido y los tiene como prioridad en su vida.';
  }
  if($social>2 & $social <4){
    $c_social='#e0e037';
    $d_social='Tiene buenas relaciones en su vida, pero quizás a veces se siente más conectada(o) y que recibe más apoyo de otros. Continúa invirtiendo en sus relaciones personales actuales – invierte tiempo en sus seres queridos; muestra su aprecio cuando otros le brindan apoyo y los hace una prioridad en la vida. También considera establecer nuevas amistades. ';
  }
  if($social<=2){
    $c_social='red';
    $d_social='Lucha con las relaciones personales de su vida, donde siente que está como desconectada(o) y no cuenta con apoyo de los demás. Las relaciones personales que le brindan apoyo son un ingrediente clave para su felicidad y bienestar. Trabaja en conectarse con los demás – invierte tiempo con la gente; muestra su aprecio cuando otros le brindan apoyo y, establecer relaciones positivas es una prioridad en su vida.';
  }   

  if($financiero>=4){
    $c_financiero='green';
    $d_financiero='Se siente bien con su estado financiero actual y tiene pocas o nada de deudas. Utiliza lo que tiene para construir un futuro mediante la inversión y tiene ahorros.  Quizás desee consultar un consejero financiero que pueda proveerle sugerencias para mantener fuerte su estado financiero.  ';
  }
  if($financiero>2 & $financiero <4){
    $c_financiero='#e0e037';
    $d_financiero='No tiene inquietudes sobre su estado financiero actual o sobre el nivel de deudas. Considera rastrear sus gastos y cerciorarse de que sólo gaste el dinero que posee. Quizás sea útil consultar un consejero financiero que pueda proveerle métodos para consolidar algunas de sus deudas y mejorar su estado financiero. ';
  }
  if($financiero<=2 ){ 
    $c_financiero='red';
    $d_financiero='Le inquieta su situación financiera actual y puede estar en la lucha con sus deudas.  Considera útil rastrear sus gastos y cerciorarse de que sólo gaste el dinero que posee, y se concentra en pagar las deudas. Debe consultar un consejero financiero que pueda ayudarla(o) a mejorar su estado financiero. ';
  }

  if($emocional>=4){
    $c_emocional='green';
    $d_emocional='Está satisfecha(o) con la vida y experimenta sentimientos positivos de manera regular. La investigación muestra que sentirse positivamente promueven la salud física, las buenas relaciones personales e inclusive el éxito en el trabajo. Continua participando en las actividades que lo(a) ayudan a sentirse positivo(a) y satisfecho(a) con la vida.  ';
  }
  if($emocional>2 & $emocional <4){
    $c_emocional='#e0e037';
    $d_emocional='Generalmente está satisfecha(o) con la vida, aunque experimenta una mezcla de emociones positivas y negativas. Según lo que está aconteciendo en la vida, los sentimientos mixtos podrían ser bastante saludables. Le apunta a las actividades que le den un sentido de satisfacción. Considere que con frecuencia experimenta emociones positivas versus negativas, y busca maneras de cambiar a experimentar mayor número de emociones positivas de manera regular. ';
  }
  if($emocional<=2 ){
    $c_emocional='red';
    $d_emocional='Está insatisfecha(o) con la vida y experimenta seguidas emociones negativas. La investigación ha demostrado que frecuentes emociones negativas está relacionado con resultados pobres en  la vida. La investigación en la psicología positiva está encontrando que las actividades positivas pueden ayudar a generar emociones positivas.  Podría ser útil visitar a un consejero para poder atender la falta de saludables emociones. ';
  }

  if($significado>=4){
    $c_significado='green';
    $d_significado='Tiene un sentido de significado, de propósito y dirección en la vida. Le contribuye a los demás y encuentra significado en lo que realiza.  Continua desempeñando actividades que apoyan el propósito propio y busca inspirar a otros, mediante su vida y sus acciones. ';
  }
  if($significado>2 & $significado <4){
    $c_significado='#e0e037';
    $d_significado='Tiene algún sentido de significado, de propósito y dirección en la vida aunque quizás también se pregunte en que medida las metas para su vida estén en realidad llenas de significado. Es bastante común que la gente reflexione sobre del propósito que tiene. Pueda ser útil pensar en qué actividades le brindan la mayor alegría y lo (la) hacen sentir vivo(a), y encuentra maneras de buscar esos asuntos. También pudiera considerar maneras de cómo contribuir con la vida de los demás. ';
  }
  if($significado<=2 ){
    $c_significado='red';
    $d_significado=' No tiene un sentido fuerte de significado, ni de propósito y lucha por encontrar la dirección correcta en la vida. Es bastante común que la gente reflexione sobre del propósito que tiene. Pueda ser útil pensar en qué actividades le brindan la mayor alegría y lo (la) hacen sentir vivo(a), y encuentra maneras de buscar esos asuntos. También pudiera considerar maneras de cómo contribuir con la vida de los demás. Si se encuentra sintiéndose como si la vida no tuviere significado, hable con un consejero o con un amigo en el que confía. ';
  }

?>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Xplorate</title>
    <link href="{{URL::asset('/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('/css/font-awesome.css')}}">
    <link href="{{URL::asset('/css/app2.css')}}" rel="stylesheet">
    <link href="{{URL::asset('/css/sweetalert.css')}}" rel="stylesheet">
    <script src="{{URL::asset('/js/jquery.min.js')}}"></script>
    <script src="{{URL::asset('/js/bootstrap.min.js')}}"></script>
    <script src="{{URL::asset('/js/sweetalert.min.js')}}"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <style>
    body {
      background: url({{URL::asset('/img/bg2.jpg')}}) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;0
    } 
    label {
    
    max-width: 140px !important;

}
    .bg{
background-color: #fff;padding: 2em;border-radius: 2em;padding-bottom: 5em;
    }
.selector {
  position: relative;
  left: 50%;
  top: 50%;
  width: 140px;
  height: 140px;
  margin-top: 160px;
  margin-left: -70px;
}

.selector,
.selector button {
  font-family: 'Oswald', sans-serif;
  font-weight: 300;
}

.selector button {
  position: relative;
  width: 100%;
  height: 100%;
  padding: 10px;
  background: #428bca;
  border-radius: 50%;
  border: 0;
  color: white;
  font-size: 20px;
  cursor: pointer;
  box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
  transition: all .1s;
}

.selector button:hover { background: #3071a9; }

.selector button:focus { outline: none; }

.selector ul {
  position: absolute;
  list-style: none;
  padding: 0;
  margin: 0;
  top: -10px;
  right: -20px;
  bottom: -10px;
  left: -20px;
}
.bt1{
    background-color: #333;
    color: #fff;
    /* margin-top: 40px; */
    height: 110px;
    padding-top: 7px;
border-radius: 40px 0px 0px 40px;
-moz-border-radius: 40px 0px 0px 40px;
-webkit-border-radius: 40px 0px 0px 40px;
border: 0px solid #000000;
}
.bt2{
    background-color: #333;
    color: #fff;
    /* margin-top: 40px; */
    height: 110px;
    padding-top: 7px;
border-radius: 0px 40px 40px 0px;
-moz-border-radius: 0px 40px 40px 0px;
-webkit-border-radius: 0px 40px 40px 0px;
border: 0px solid #000000;
}
.bolas{
  margin-bottom: 0px;
  }
.b
{margin:0px auto;margin-top: 140px;}

@media only screen and (max-width: 600px) {
  .b
{margin-top: 40px;}
.bolas {
    margin-bottom: 0px;
}
  .bt1{border-radius: 40px 40px 0px 0px;
-moz-border-radius: 40px 40px 0px 0px;
-webkit-border-radius: 40px 40px 0px 0px;
border: 0px solid #000000;}
  .bt2{border-radius: 0px 0px 40px 40px;
-moz-border-radius: 0px 0px 40px 40px;
-webkit-border-radius: 0px 0px 40px 40px;
border: 0px solid #000000;}
  .selector.open li input + label {
    width: 100px !important;
    height: 100px !important;
  }
  .selector.open li input + label img {
    width: 30px !important;
  }
.selector {
    margin-top: 89px !important;
    margin-bottom: 86px !important;
}
  .selector ul{
      top: 0px;
  bottom: 0px;
  }
  .selector.open li input + label {

    margin-left: -49px !important;
    text-shadow: 1px 1px #333;
}


}

.selector li {
  position: absolute;
  width: 0;
  height: 100%;
  margin: 0 50%;
  -webkit-transform: rotate(-360deg);
  transition: all 0.8s ease-in-out;
}

.selector li input { display: none; }

.selector li input + label {
  position: absolute;
  left: 50%;
  bottom: 100%;
  width: 0;
  height: 0;
  line-height: 1px;
  margin-left: 0;
  background: #fff;
  border-radius: 50%;
  text-align: center;
  font-size: 1px;
  overflow: hidden;
  cursor: pointer;
  box-shadow: none;
  transition: all 0.8s ease-in-out, color 0.1s, background 0.1s;
}

.selector li input + label:hover { background: #f0f0f0; }

.selector li input:checked + label {
  background: #5cb85c;
  color: white;
}

.selector li input:checked + label:hover { background: #449d44; }

.selector.open li input + label {
  width: 140px;
  height: 140px;
  line-height: 16px;
  margin-left: -66px;
  box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
  font-size: 14px;
}
div.table-title {
   display: block;
  margin: auto;
  max-width: 600px;
  padding:5px;
  width: 100%;
}

.table-title h3 {
   color: #fafafa;
   font-size: 30px;
   font-weight: 400;
   font-style:normal;
   font-family: "Roboto", helvetica, arial, sans-serif;
   text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
   text-transform:uppercase;
}


/*** Table Styles **/

.table-fill {
  background: white;
  border-radius:3px;
  border-collapse: collapse;
  margin: auto;
  width: 100%;
  box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
  animation: float 5s infinite;
}
 
th {
  color:#FFF;;
  background:#268bcf;
  font-size:16px;
  font-weight: 300;
  padding:11px;
  text-align:left;
  text-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
  vertical-align:middle;
}

th:first-child {
  border-top-left-radius:3px;
}
 
th:last-child {
  border-top-right-radius:3px;
  border-right:none;
}
  
tr {
  border-top: 1px solid #C1C3D1;
  border-bottom-: 1px solid #C1C3D1;
  color:#666B85;
  font-size:16px;
  font-weight:normal;
  text-shadow: 0 1px 1px rgba(256, 256, 256, 0.1);
}
 
tr:hover td {
  background:#b7b7b7;
  color:#FFFFFF;
  border-top: 1px solid #22262e;
}
 
tr:first-child {
  border-top:none;
}

tr:last-child {
  border-bottom:none;
}
 
tr:nth-child(odd) td {
  background:#EBEBEB;
}
 
tr:nth-child(odd):hover td {
  background:#b7b7b7;
}

tr:last-child td:first-child {
  border-bottom-left-radius:3px;
}
 
tr:last-child td:last-child {
  border-bottom-right-radius:3px;
}
 
td {
  background:#FFFFFF;
  padding:5px;
  text-align:left;
  vertical-align:middle;
  font-weight:300;
  font-size:16px;
  text-shadow: -1px -1px 1px rgba(0, 0, 0, 0.1);
  border-right: 1px solid #C1C3D1;
}

td:last-child {
  border-right: 0px;
}

th.text-left {
  text-align: left;
}

th.text-center {
  text-align: center;
}

th.text-right {
  text-align: right;
}

td.text-left {
  text-align: left;
}

td.text-center {
  text-align: center;
}

td.text-right {
  text-align: right;
}
.modal-dialog{
  z-index: 9999999;
}

</style>
  </head>
  <body onload="window.parent.parent.scrollTo(0,0)">
    <div class="container">
      <h3 style="text-align:right;color:#333;font-weight: lighter;">Tu Resultado {{$nombre}} {{$apellido}} 
        <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/inicio" class="btn btn-warning">Atras</a>
        <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/salir" class="btn btn-danger">Salir</a>
      </h3>
      <div class="row bg">

        <div class="row bolas">
        <div class="col-md-6">
        <div class='selector'>
          <ul>
            <li >
              <input id='c1' type='checkbox'>
              <label for='c1' style="background:{{$c_significado}};color: #fff"  data-toggle="modal" data-target="#cero">
                <img src="{{URL::asset('/img/proposito.png')}}" width="70px" style="margin-top: 10px"><br>
                Propósito
              </label>
            </li>
            <li>
              <input id='c2' type='checkbox'>
              <label for='c2'style="background:{{$c_financiero}};color: #fff"  data-toggle="modal" data-target="#primero">
                <img src="{{URL::asset('/img/finanzas.png')}}" width="60px" style="margin-top: 2px"><br>
                Bienestar<br> Financiero</label>
            </li>
            <li>
              <input id='c3' type='checkbox'>
              <label for='c3' style="background:{{$c_emocional}};color: #fff"  data-toggle="modal" data-target="#segundo">
                <img src="{{URL::asset('/img/emocional.png')}}" width="60px" style="margin-top: 2px"><br>
                Bienestar<br> Emocional</label>
            </li>
            <li>
              <input id='c4' type='checkbox'>
              <label for='c4' style="background:{{$c_social}};color: #fff"  data-toggle="modal" data-target="#tercero">
                <img src="{{URL::asset('/img/social.png')}}" width="60px" style="margin-top: 2px"><br>
                Bienestar<br> Social</label>
            </li>
            <li>
              <input id='c5' type='checkbox'>
              <label for='c5' style="background:{{$c_salud}};color: #fff"  data-toggle="modal" data-target="#cuarto">
                <img src="{{URL::asset('/img/salud.png')}}" width="60px" style="margin-top: 2px"><br>
                Salud<br> Fisica</label>
            </li>
          </ul>
          <button><div style="font-size: 65px">5</div><div style="font-size: 15px;margin-top: -15px;">Dimensiones del bienestar</div></button>
        </div>
        </div>
        <div class="col-md-6">
          <div id="chart_div"></div>
        </div>
        <div class="col-md-6">

        <div class="row b">
          <div class="col-md-6 col-sm-4 text-center bt1" style="background:{{$c_ansiedad}}" data-toggle="modal" data-target="#an"><img src="{{URL::asset('/img/ansiedad.png')}}" width="55px" style="margin-top: 2px;"><br>Ansiedad</div>
          <div class="col-md-6 col-sm-4 text-center bt2" style="background:{{$c_depresion}}" data-toggle="modal" data-target="#de"><img src="{{URL::asset('/img/depresion.png')}}" width="70px" style="margin-top: 2px;"><br>Depresión</div>
        </div>

        </div>

        <div class="col-md-6">

        <div id="chart_div2"></div>

        </div>


        </div>


        <div class="row" style="margin-top: 0em">
          <div style="text-align: right;margin-bottom: 10px">
            <a href="historico"  class="btn btn-default">Histórico Global</a>
          </div>
          
          <table class="table-fill">
            <thead>
            <tr>
            <th class="text-left" width="65%">Dimensión</th>
            <th class="text-center" width="10%">Puntaje</th>
            <th class="text-center"width="25%">Resultado</th>
            </tr>
            </thead>
            <tbody class="table-hover">
              <tr>
                <td class="text-left">Bienestar Social</td>
                <td class="text-center">{!! ($social) !!}</td>
                <td class="text-center"><a href="#" class="btn btn-info" data-toggle="modal" data-target="#tercero" onclick="window.parent.parent.scrollTo(0,0)" >Ver Resultado</a> <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/historico_social"  class="btn btn-warning">Ver Histórico</a></td>
              </tr>
              <tr>
                <td class="text-left">Bienestar Físico</td>
                <td class="text-center">{!! ($salud) !!}</td>
                <td class="text-center"><a href="#" class="btn btn-info" data-toggle="modal" data-target="#cuarto" onclick="window.parent.parent.scrollTo(0,0)">Ver Resultado</a> <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/historico_fisico"  class="btn btn-warning">Ver Histórico</a></td>
              </tr>
              <tr>
                <td class="text-left">Bienestar Financiero</td>
                <td class="text-center">{!! ($financiero) !!}</td>
                <td class="text-center"><a href="#" class="btn btn-info" data-toggle="modal" data-target="#primero" onclick="window.parent.parent.scrollTo(0,0)">Ver Resultado</a> <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/historico_financiero"  class="btn btn-warning">Ver Histórico</a></td>
              </tr>
              <tr>
                <td class="text-left">Bienestar Emocional</td>
                <td class="text-center">{!! ($emocional) !!}</td>
                <td class="text-center"><a href="#" class="btn btn-info" data-toggle="modal" data-target="#segundo" onclick="window.parent.parent.scrollTo(0,0)">Ver Resultado</a> <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/historico_emocional"  class="btn btn-warning">Ver Histórico</a></td>
              </tr>
              <tr>
                <td class="text-left">Propósito</td>
                <td class="text-center">{!! ($significado) !!}</td>
                <td class="text-center"><a href="#" class="btn btn-info" data-toggle="modal" data-target="#cero" onclick="window.parent.parent.scrollTo(0,0)">Ver Resultado</a> <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/historico_proposito"  class="btn btn-warning">Ver Histórico</a></td>
              </tr>
              <tr>
                <td class="text-left">Ansiedad</td>
                <td class="text-center">{!! ($ansiedad) !!}</td>
                <td class="text-center"><a href="#" class="btn btn-info" data-toggle="modal" data-target="#an" onclick="window.parent.parent.scrollTo(0,0)">Ver Resultado</a> <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/historico_ansiedad"  class="btn btn-warning">Ver Histórico</a></td>
              </tr>
              <tr>
                <td class="text-left">Depresión</td>
                <td class="text-center">{!! ($depresion) !!}</td>
                <td class="text-center"><a href="#" class="btn btn-info" data-toggle="modal" data-target="#de" onclick="window.parent.parent.scrollTo(0,0)">Ver Resultado</a> <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/historico_depresion"  class="btn btn-warning">Ver Histórico</a></td>
              </tr>
            </tbody>
          </table>        

        </div>  

  <div class="modal fade" id="tercero" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Bienestar Social</h4>
        </div>
        <div class="modal-body">
          <p>{!!$d_social!!}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="cero" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Propósito</h4>
        </div>
        <div class="modal-body">
          <p>{!!$d_significado!!}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="cuarto" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Bienestar Físico</h4>
        </div>
        <div class="modal-body">
          <p>{!!$d_salud!!}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="primero" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Bienestar Financiero </h4>
        </div>
        <div class="modal-body">
          <p>{!!$d_financiero!!}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="segundo" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Bienestar Emocional</h4>
        </div>
        <div class="modal-body">
          <p>{!!$d_emocional!!}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="de" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Depresión</h4>
        </div>
        <div class="modal-body">
          <p>{!!$d_depresion!!}</p>
        </div>
      </div>
    </div>
  </div>
  <div class="modal fade" id="an" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Ansiedad</h4>
        </div>
        <div class="modal-body">
          <p>{!!$d_ansiedad!!}</p>
        </div>
      </div>
    </div>
  </div>


        <script>
          var nbOptions = 8;
        var angleStart = -360;

        // jquery rotate animation
        function rotate(li,d) {
            $({d:angleStart}).animate({d:d}, {
                step: function(now) {
                    $(li)
                       .css({ transform: 'rotate('+now+'deg)' })
                       .find('label')
                          .css({ transform: 'rotate('+(-now)+'deg)' });
                }, duration: 0
            });
        }

        // show / hide the options
        function toggleOptions(s) {
            $(s).toggleClass('open');
            var li = $(s).find('li');
            var deg = $(s).hasClass('half') ? 180/(li.length-1) : 360/li.length;
            for(var i=0; i<li.length; i++) {
                var d = $(s).hasClass('half') ? (i*deg)-90 : i*deg;
                $(s).hasClass('open') ? rotate(li[i],d) : rotate(li[i],angleStart);
            }
        }

        $('.selector button').click(function(e) {
            toggleOptions($(this).parent());
        });

        setTimeout(function() { toggleOptions('.selector'); }, 100);//@ sourceURL=pen.js
        </script>

    <script>
      $(window).resize(function(){
          drawColColors();
      });
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawColColors);

    function drawColColors() {

          var data = google.visualization.arrayToDataTable([
            ["Element", "Valor", { role: "style" } ],
            ['Bienestar Social', {!!$social!!},'{!!$c_social!!}'],
            ['Bienestar Fisico ',{!!$salud!!},'{!!$c_salud!!}'],
            ['Bienestar Financiero ',{!!$financiero!!},'{!!$c_financiero!!}'],
            ['Bienestar Emocional  ',{!!$emocional!!},'{!!$c_emocional!!}'],
            ['Proposito',{!!$significado!!},'{!!$c_significado!!}']
          ]);

          var view = new google.visualization.DataView(data);
          view.setColumns([0, 1,
                           { calc: "stringify",
                             sourceColumn: 1,
                             type: "string",
                             role: "annotation" },
                           2]);
        
          var options = {
            title: "",
            width: '100%',
            height: 350,
            bar: {groupWidth: '95%'},
            vAxis: {
              scaleType: 'mirrorLog',
              ticks: [1,1.2,1.5,2,2.5,3,3.5,4,4.5,5],
              format:'short'
            },
            legend: { position: "none" },
          };

          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
          chart.draw(view, options);
          
        }

    $(window).resize(function(){
      drawColColors();
    });


    </script>



    <script>
      $(window).resize(function(){
          drawColColors2();
      });
    google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawColColors2);

    function drawColColors2() {

          var data = google.visualization.arrayToDataTable([
            ["Element", "Valor", { role: "style" } ],
            ['Ansiedad', {!!$ansiedad!!},'{!!$c_ansiedad!!}'],
            ['Depresión',{!!$depresion!!},'{!!$c_depresion!!}'],
          ]);

          var view = new google.visualization.DataView(data);
          view.setColumns([0, 1,
                           { calc: "stringify",
                             sourceColumn: 1,
                             type: "string",
                             role: "annotation" },
                           2]);
        
          var options = {
            title: "",
            width: '100%',
            height: 350,
            bar: {groupWidth: '95%'},
            vAxis: {
              scaleType: 'mirrorLog',
              ticks: [5,10,20,30,40],
              format:'short'
            },
            legend: { position: "none" },
          };

          var chart = new google.visualization.ColumnChart(document.getElementById('chart_div2'));
          chart.draw(view, options);
          
        }

    $(window).resize(function(){
      drawColColors2();
    });


    </script>
      </div>
    </div>
  </body>
</html>