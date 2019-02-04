<?php 

  $S_depresion=null;


  foreach ($rowdata_h as $rdh) {
    $depresion=$rdh->depresion;
    $fecha=$rdh->fechaencuesta;

  if($depresion<17){
      $c_depresion='verde';
    }
  if($depresion>=17 & $depresion <=22){
      $c_depresion='amarillo';
    }
  if($depresion>=23 & $depresion <=32){
      $c_depresion='naranja';
    } 
  if($depresion>=33){
      $c_depresion='rojo';
    } 
    $S_depresion=$S_depresion.$c_depresion;

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
    @media (max-width: 600px) {
      .col-md-12 {
        padding-right: 0px;
        padding-left: 0px;
      }
      p{
        padding: 0px !important;
      }
        h3,h2{
    font-size: 16px;
        font-weight: bold;
  }
  p{
    font-size: 10px !important;
  }
    }
    </style>
  </head>
  <body onload="window.parent.parent.scrollTo(0,0)">
    <div class="container">
      <h3 style="text-align:right;color:#333;;font-weight: lighter;">Tu Resultado {{$nombre}} {{$apellido}} 
        <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/analisis" class="btn btn-warning">Atras</a>
        <a href="http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/salir" class="btn btn-danger">Salir</a>
      </h3>
      <div class="row" style="background-color: #fff;padding: 2em;border-radius: 2em;padding-bottom: 5em">
        <div class="col-md-12">
          <div id="chart_div"></div>

          <div class="row">
            <div class="col-md-12">
              <h4 style="color: #333;" id="tt_depresion"></h4>
              <p style="font-size: 16px;padding: 1em;" id="t_depresion"></p>
            </div>
          </div>
          

          










        </div>
      </div>
    </div>

    <script>
      
      $(function() {
        cargar_cambio1('{!!$S_depresion!!}','depresion');
      });

      $(window).resize(function(){
          drawChart();
      });

      google.charts.load('current', {'packages':['line']});
      google.charts.setOnLoadCallback(drawChart);

    function drawChart() {

      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Fechas de realizacion del test');
      data.addColumn('number', 'Depresión');
    
      datos = [
      <?php
        foreach ($rowdata as $rd){ 
          echo "['".$rd->fechaencuesta."',".$rd->depresion."],";
        }
      ?>
      ];


      console.log(datos);

      data.addRows(datos);

      var options = {
        chart: {
          title: 'Gráfico histórico',
          subtitle: ''
        },
        axes: {
            y: {
                all: {
                    range: {
                        max: 40,
                        min: 1             
                    }
                }
            }
        },
        width: '100%',
        height: 400
      };

      var chart = new google.charts.Line(document.getElementById('chart_div'));

      chart.draw(data, options);
    }   

    function cargar_cambio1(cambio,dimension){
      console.log(cambio,dimension);
      $.getJSON('http://xplorate.unisinu.edu.co/XplorateTrabajadores/public/consulta_cambio', {t_cambio:cambio,t_dimension:dimension}, function(json){
        $.each(json, function( key, value ) {
          //console.log(value);
          $('#tt_depresion').text(value.titulo);
          $('#t_depresion').text(value.texto);
        });
      });
    }


  </script>
  </body>
</html>