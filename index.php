<?php
	// Abriendo el archivo
	$archivo = fopen("fecha.txt", "r");
	// Recorremos todas las lineas del archivo
	while(!feof($archivo)){
	    // Leyendo una linea
	    $fechaTxt = fgets($archivo);
	}
	// Cerrando el archivo
	fclose($archivo);
	$fp = fopen ("carga.csv","r");
	$arreglo= array();
	$contar=0;
	$numPrimeroA=0;
	$numPrimeroB=0;
	$numPrimeroC=0;
	$numSegundoA=0;
	$numSegundoB=0;
	$numSegundoC=0;
	$numTerceroA=0;
	$numTerceroC=0;
	$numTerceroD=0;
	$numTerceroE=0;
	$numCuartoA=0;
	$numCuartoC=0;
	$numCuartoD=0;
	$numCuartoE=0;

	while ($data = fgetcsv ($fp, 1000, ";")) {
		if ($contar!=0) {
			$datos = explode(",", $data[0]);
			$rut=str_replace('.', '',str_replace('-', '', $datos[3]));
			if($rut<>"175270914"){
				$arreglo[$rut] = array(
										"curso"=>$datos[1],
										"rut"=>$rut,
										"nombre"=>$datos[2],
										"fecha"=>$datos[0],
										"numFamilia"=>$datos[4],
										"numEstudiante"=>$datos[5],
										"computadora"=>$datos[6],
										"tablet"=>$datos[7],
										"celular"=>$datos[8],
										"impresora"=>$datos[9],
										"horatio"=>$datos[10],
										"externo"=>$datos[11],
										"internet"=>$datos[12],
										"estado"=>$datos[13],

									);
			}
		}
		$contar++;		
	}
	fclose ($fp);
	foreach ($arreglo as $key ) {
		switch ($key["curso"]) {
		    case "1º Medio A":
		    	$numPrimeroA++;
		        break;
		    case "1º Medio B":
		        $numPrimeroB++;
		        break;
		   	case "1º Medio C":
		        $numPrimeroC++;
		        break;
		    case "2º Medio A":
		    	$numSegundoA++;
		        break;
		    case "2º Medio B":
		        $numSegundoB++;
		        break;
		   	case "2º Medio C":
		        $numSegundoC++;
		        break;
		    case "3º Medio A":
		        $numTerceroA++;
		        break;
		    case "3º Medio C":
		        $numTerceroC++;
		        break;
		    case "3º Medio D":
		        $numTerceroD++;
		        break;
		    case "3º Medio E":
		        $numTerceroE++;
		        break;
		    case "4º Medio A":
		        $numCuartoA++;
		        break;
		    case "4º Medio C":
		        $numCuartoC++;
		        break;
		    case "4º Medio D":
		        $numCuartoD++;
		        break;
		    case "4º Medio E":
		        $numCuartoE++;
		        break;
		}
	}
	echo "son ".count($arreglo);
	//<div class="card col-sm-2" style="width: 18rem;">
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Resumen</title>
		<link rel="stylesheet" href="">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
	    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!--
	   	<link href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"></link>	
	    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

-->	
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
  
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>


	</head>
	<body>
		<div class="container">
			<div class="row">
			<div class="card col-sm-4">
			  <ul class="list-group list-group-flush">
				<?php
				echo "<li class='list-group-item'>1º Medio A =".$numPrimeroA."</li><li class='list-group-item'> 1º Medio B =".$numPrimeroB."</li><li class='list-group-item'> 1º Medio C =".$numPrimeroC."</li><li class='list-group-item'> 2º Medio A =".$numSegundoA."</li><li class='list-group-item'> 2º Medio B =".$numSegundoB."</li><li class='list-group-item'> 2º Medio C =".$numSegundoC."</li><li class='list-group-item'> 3º Medio A =".$numTerceroA."</li><li class='list-group-item'> 3º Medio C =".$numTerceroC."</li><li class='list-group-item'> 3º Medio D =".$numTerceroD."</li><li class='list-group-item'> 3º Medio E =".$numTerceroE."</li><li class='list-group-item'> 4º Medio A =".$numCuartoA."</li><li class='list-group-item'> 4º Medio C =".$numCuartoC."</li><li class='list-group-item'> 4º Medio D =".$numCuartoD ."</li><li class='list-group-item'> 4º Medio E =".$numCuartoE."</li>";
				?>
			  </ul>
			</div>
			<div class="card col-sm-8">
			  <div class="card-header">
			    Opciones
			  </div>
			  <div class="card-body">
			    <h5 class="card-title">Personas</h5>
			    <p class="card-text">
				 <?php 
					if(count($arreglo==0)){
						echo "tienes que cargar archivos";
					}else{ 
						echo "La ultima actualizacion fue". $fechaTxt;
					}
					?>
			   </p>
					<form action="suburArchivo.php" method="post" enctype="multipart/form-data" class="form">
					
							<div class="input-group  col-sm-4">
								<div class="input-group-prepend">
									<span class="input-group-text" id="inputGroupFileAddon01">Archivo</span>
								</div>
								<div class="custom-file">
									<input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="archivo">
									<label class="custom-file-label" for="inputGroupFile01">carga</label>
									<input type="submit" id="btnEnviar" class="btn btn-primary" name="submit" disabled value="Subir">
									<a href="#" class="btn btn-secondary" id="botonCarga">Generar archivos DAEM</a>
								</div>
							</div>
					</form>
					<p></p>
					<div class="container">
					<div class="bd-example">
						<table class="table table-striped table-bordered" id="tabla">
							<thead>
								<tr>
									<th scope="col">CURSO</th>
									<th scope="col">NOMBRE</th>
									<th scope="col">FECHA</th>
								</tr>
							</thead>
							<tbody>
								<?php
									foreach ($arreglo as $key) {
										echo "	<tr>
													<td>".$key["curso"]."</td>
													<td>".strtoupper($key["nombre"])."</td>
													<td>".$key["fecha"]."</td>
												</tr>";
									}	
								?>
							</tbody>
						</table>
					</div>
					</div>
					
			  </div>
			</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	$(document).on('change', '#inputGroupFile01', function(event) {
		var archivo =$(this).val();
		var extensiones = archivo.substring(archivo.lastIndexOf("."));
		if(extensiones != ".CSV" && extensiones != ".csv"){
			$("#btnEnviar").attr('disabled',true);
			$(this).val("");
			alert("El archivo de tipo " + extensiones + " no es válido");
		}else{
			$("#btnEnviar").attr('disabled',false);
		}	
	});
	$(document).ready(function() {
    	$('#tabla').DataTable();
	} );
	$(document).on('click', '#botonCarga', function(event) {
		$.post('descarga.php', {}, function(data) {
			window.open('descarga.xlsx', 'Download');
		});
	});
</script>
