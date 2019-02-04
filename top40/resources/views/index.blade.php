<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Xplorate Winners</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    </head>
    <body>

    <div class="container mt-5">
        <h5 class="display-5">GANADORES XPLORATE</h5>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form id="formfiltro">
        <div class="form-row my-3">
            @csrf
            <div class="col-md-6">
                <div class="form-group">
                    <label for="">Campus</label>
                    <select type="date" id="campus" name="campus" class="form-control form-control-sm">
                        @foreach($campus as $cm)
                        <option value="{{$cm->campus}}">{{$cm->descr}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Fecha Inicio</label>
                    <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control form-control-sm" value="2018-01-01">
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="">Fecha Fin</label>
                    <input type="date" id="fecha_fin" name="fecha_fin" class="form-control form-control-sm" value="<?php echo date('Y-m-d'); ?>">
                </div>
            </div>
            <div class="col-md-3">
                <button class="btn btn-primary btn-sm" type="submit">Consultar Ganadores</button>
            </div>
        </div>
        </form>
        <table class="table table-bordered table-hover table-striped table-sm" id="tablafiltro">
            <thead>
              <th>ID</th>
              <th>Nombres</th>
              <th>Apellidos</th>
              <th>Cedula</th>
              <th>Correo</th>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    <script>
        $(function () {
            $("#formfiltro").submit(function (e) {
               e.preventDefault();
               $.post('{{url('/filtrar')}}', $(this).serialize(), function (response) {
                   var tbody = '';
                   $(response).each(function (index, value) {
                      tbody += `<tr><td>${value.idpersona}</td>
                               <td>${value.nombre}</td>
                               <td>${value.apellido}</td>
                               <td>${value.cedula}</td>
                               <td>${value.correo}</td></tr>`;
                   });
                   $("#tablafiltro > tbody").html(tbody);
               }).fail(function (response) {
                   swal(
                       'Oops..',
                       'Por favor ingresar fecha inicial y fecha final.',
                       'error'
                   );
               });
            });
        });
    </script>
    </body>
</html>
