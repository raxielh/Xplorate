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
      body{     background-color: #F9F9F9;  }
      @media (max-width: 600px) {
        #login {
            background-color: rgba(255, 255, 255, 0.96);
            margin-left: auto;
            margin-right: auto;
            margin-top: 2em;
            box-shadow: 0px 0px 7px -2px #505050;
            max-width: 700px;
            padding: 1em;
            padding-top: 0em;
        }
      }
    </style>
  </head>
  <body>
    <div class="container-fluid">
      <div id="login">
          <div class="row">
              <div class="col-md-12">
                <h3>Cambiar correo</h3>
                </div>
            </div>
          <div class="row">
              <div class="col-md-12">
                  <div>
                        <form ACTION="{{route('recuperar_correo')}}" METHOD="POST" class="form-inline" name="recuperar">
                          @csrf
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-male"></i></div>
                              <input type="number" class="form-control" name="cedula" required placeholder="Ingresa tu identificacion">

                            </div><br>
                            <div class="input-group">
                              <div class="input-group-addon"><i class="fa fa-male"></i></div>
                              <input type="email" class="form-control" name="correo" required placeholder="Nuevo Correo">

                            </div>
                            <div class="espacio-arriba">
                              <a href="/XplorateTrabajadores/public/test" class="btn btn-warning"><i class="glyphicon glyphicon-chevron-left"></i> Atras</a>
                              <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-send"></i> Cambiar correo</button>
                            </div><br>
                            @include('flash::message')
                          </div>
                        </form>
                    </div>

                </div>
            </div>  
        </div>  
  </div>
  </body>
</html>