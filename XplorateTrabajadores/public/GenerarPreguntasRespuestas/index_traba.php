<?php
set_time_limit(0);
$servername = "localhost";

$username = "xplorate_trabajadores";
$password = "xplorate_trabajadores";
$dbname = "xplorate_t_2017";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$resultado= array();
$puntero=0;
//if  ( (isset($_POST["fini"])) && (isset($_POST["ffin"]))&& (isset($_POST["campus"]))  ){



$query_encuestas = " SELECT pc.campus,rh1.`respuestas_historic_1`,p.`cedula`,p.`nombre`,p.`apellido`,p.edad,g.`nombre` descgenero,ec.`nombre` estadocivil,
        re.`nombre` razaetnica,de.`nombre` nacimientodepartamento,m.`nombreMunicipio` ciudadnacimien,p.`correo`,rh1.fechaencuesta,pc.acad_prog
FROM `b_respuestas_historic_1` rh1,
      persona p,
      `estado_civil` ec,
      `raza_etnicidad` re,
      `municipio` m,
       `departamento` de,
        `genero` g,
        b_persona_categoria pc
      
WHERE 
 rh1.`persona`=p.cedula       
AND p.`estado_civil`=ec.`idestado_civil` 
AND p.`raza_etnicidad`=re.`idraza_etnicidad` 
AND p.`lugar_nacimiento`=m.`idmunicipio`
AND m.`departamento_iddepartamento`=de.`iddepartamento`
AND p.`genero`=g.`idgenero`
AND rh1.persona=pc.cedula";
$query_encuestas.=" AND rh1.fechaencuesta  BETWEEN  '".$_POST["fini"]." 00:00:01' AND '".$_POST["ffin"]." 23:59:59'  " ;

//return var_dump($query_encuestas);

$r_query_encuestas = $conn->query($query_encuestas);

if ($r_query_encuestas->num_rows > 0) 
{
    // output data of each row
    while($rw_query_encuestas = $r_query_encuestas->fetch_assoc()) 
    {
    	 $puntero++;       
         $resultado[$puntero] = $rw_query_encuestas;
		$sql_demograficos1=		"   
				  SELECT c.id idcategoria,c.`titulo` desc_categoria,p.id idpregunta,concat(c.`titulo`,' - ', p.`descripcion`) descpregunta
				  FROM  `preguntas` p,
				        categoria c
				  WHERE p.categoria=c.`id`
				  ORDER BY c.orden,p.orden ";
	       $r_sql_demograficos1 = $conn->query($sql_demograficos1);
	       if ($r_sql_demograficos1->num_rows > 0) 
				{
				    // output data of each row
				    while($rw_sql_demograficos1 = $r_sql_demograficos1->fetch_assoc()) 
				    {
							$sql_demograficos2=" 
 
							 SELECT rh1.`persona`, p.`id` idpregunta,p.`descripcion` descpregunta,pr.`id` idrespuesta,pr.`valor` descrespuesta
							 FROM  `b_respuestas_historic_1` rh1,
							       b_respuestas_historic_2 rh2,
							       posibles_respuestas pr,
							       `preguntas` p,
							       `categoria` c
							   WHERE  rh1.`respuestas_historic_1`  =rh2.`respuestas_historic_1`   
							   AND rh2.`posibles_respuesta`=pr.id
							   AND rh2.`pregunta`=pr.pregunta
							   AND pr.`pregunta`=p.id
							   AND p.`categoria`=c.`id`
							   AND rh1.`persona`='".$rw_query_encuestas["cedula"]."'
							   AND rh1.`respuestas_historic_1`='".$rw_query_encuestas["respuestas_historic_1"]."'
							   AND p.id=".$rw_sql_demograficos1["idpregunta"]."
							   ORDER BY c.`orden`,p.`orden`,pr.`orden`
							";
							$resultado[$puntero][$rw_sql_demograficos1["descpregunta"]]="";
							$r_sql_demograficos2 = $conn->query($sql_demograficos2);
					       if ($r_sql_demograficos1->num_rows > 0) 
								{
								    // output data of each row
								    while($rw_sql_demograficos2 = $r_sql_demograficos2->fetch_assoc()) 
								    {
								    	$res_valor=$rw_sql_demograficos2["descrespuesta"];
								    	$resultado[$puntero][$rw_sql_demograficos1["descpregunta"]]=$res_valor;
								    }
								}

				    }
				}

      //  var_dump($row);
    }
}

//}
$conn->close();


	 $fileName = 'row_data.csv';
 
header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
header('Content-Description: File Transfer');
header("Content-type: text/csv");
header("Content-Disposition: attachment; filename={$fileName}");
header("Expires: 0");
header("Pragma: public");

$fh = @fopen( 'php://output', 'w' );

$headerDisplayed = false;

foreach ( $resultado as $data ) {
    // Add a header row if it hasn't been added yet
    if ( !$headerDisplayed ) {
        // Use the keys from $data as the titles
        fputcsv($fh, array_keys($data));
        $headerDisplayed = true;
    }
 
    // Put the data into the stream
    fputcsv($fh, $data);
}
// Close the file
fclose($fh);
// Make sure nothing else is sent, our file is done
exit;



?>