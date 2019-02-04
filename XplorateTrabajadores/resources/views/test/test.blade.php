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
    <style>
    body {
      background: url({{URL::asset('/img/bg2.jpg')}}) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;0
    }
    p{
      font-size: 16px;
    }
    .bg{
      background-color: #fff;padding: 2em;border-radius: 2em;
    }
    @media (max-width: 600px) {
    .bg{
      background-color: #fff;padding: 1em;border-radius: 0em;
    }
    p{
      font-size: 12px;
    }
    h3{
      font-size: 16px;
    }
    li{
      font-size: 14px !important;
    }
    }
    </style>

  </head>
   <body onload="window.parent.parent.scrollTo(0,0)">
    <div class="container">
      <h3 style="text-align:right;color:#333;font-weight: lighter;">{{$nombre}} {{$apellido}} <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/bienvenido" class="btn btn-warning">Atras</a></h3>
      <div class="row bg">
        <div class="col-md-12">
          
          <?php 
            
            foreach ($respuestas as $r) {
              $respondidas = $r->c;
            }

            foreach ($cantidad_pregunta as $cp) {
              $total = $cp->c;
            }

            //dd($total);

            if($respondidas==$total){

          
          ?>

          <div style="text-align: center;">
            <h2>
              Has terminado el test. Gracias por tu tiempo y atención en la realización de estas preguntas. Realmente apreciamos tus respuestas. En la página siguiente, recibirás información sobre tus resultados a través de distintas áreas.
            </h2>
            <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/calcular" class="btn btn-success">Ver resultado</a>
          </div>
          
          <?php } else{ ?>

          <form action="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/contestar" id="frm" method="post">
            @csrf
         




              @foreach ($pregunta as $p)
                <div id="pregunta-{{$p->id}}">

                  {!! $p->desc !!}
                  <h4 style="color: #4E98D2">{!! $p->descripcion !!}</h4>
                  <input type="hidden" value="{{$p->id}}" name="pregunta">
                  <ul>
                  @foreach ($ps as $pos)

                
                    <input type="hidden" name="tipo_pregunta" value="{{$p->tipo_pregunta}}">
                    @if ($p->tipo_pregunta === 2)

                      <input type="hidden" name="posibles_respuesta" value="{{ $pos->id }}">
                      <textarea name="respuesta_abierta" style="width: 100%;height: 100px;" required=""></textarea>
                    @elseif ($p->tipo_pregunta === 1)
                      <li style="font-size: 18px;list-style: none">
                        <label>
                          <input type="hidden" name="respuesta_abierta" value="">
                          <input type="radio" class="click" name="posibles_respuesta" value="{{ $pos->id }}"> 
                          {{ $pos->descripcion }}                   
                        </label>
                      </li>
                    @elseif ($p->tipo_pregunta === 3)
                      <li style="font-size: 18px;list-style: none">
                        <label>

                          <input type="hidden" name="posibles_respuesta" value="0">
                          <input type="checkbox" class="click" name="respuesta_abierta[]" value="{{ $pos->id }}-{{ $pos->descripcion }}"> 
                          {{ $pos->descripcion }}                   
                        </label>
                      </li>
                    @endif

              
                  @endforeach
                  </ul>

    
                </div>
              @endforeach
             <input type="submit" name="" class="btn btn-info" value="Responder"><br><br>
             <div style="clear: both;"></div>
  


          <progress value="@foreach ($respuestas as $r){{ $r->c }}@endforeach" max="@foreach ($cantidad_pregunta as $cp){{ $cp->c }}@endforeach" style="width: 100%"></progress>




          </form>


          <?php } ?>

        </div>
      </div>
    </div>
    <script>
      $(document).ready(function() {
        /*$( ".click" ).click(function() {
          $( "#frm" ).submit();
        });*/
      });
    </script>
  </body>
</html>