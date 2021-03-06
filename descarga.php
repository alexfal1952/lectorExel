<?php
	
	$fp = fopen ("carga.csv","r");
	$arreglo= array();
	$contar=0;
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
	//Agregamos la libreria para leer
	require 'Classes/PHPExcel/IOFactory.php';
	
	// Creamos un objeto PHPExcel
	$objPHPExcel = new PHPExcel();
	$objReader = PHPExcel_IOFactory::createReader('Excel2007');
	$objPHPExcel = $objReader->load('originalCuatro.xlsx');
	// Indicamos que se pare en la hoja uno del libro
	$objPHPExcel->setActiveSheetIndex(0);
	$lineas=10;
	$cod=1;
	foreach ($arreglo as $key) {
		$objPHPExcel->getActiveSheet()->SetCellValue('A'.$lineas,$cod);
		$objPHPExcel->getActiveSheet()->SetCellValue('B'.$lineas,$key["nombre"]);
		$objPHPExcel->getActiveSheet()->SetCellValue('C'.$lineas,$key["numFamilia"]);
		$objPHPExcel->getActiveSheet()->SetCellValue('D'.$lineas,$key["numEstudiante"]);
		switch ($key["computadora"]) {
		    case "Deficiente":
		    	$objPHPExcel->getActiveSheet()->SetCellValue('E'.$lineas,"x");
		        break;
		    case "Regular":
		        $objPHPExcel->getActiveSheet()->SetCellValue('F'.$lineas,"x");
		        break;
		   	case "Bueno":
		        $objPHPExcel->getActiveSheet()->SetCellValue('G'.$lineas,"x");
		        break;
		}
		switch ($key["tablet"]) {
		    case "Deficiente":
		    	$objPHPExcel->getActiveSheet()->SetCellValue('H'.$lineas,"x");
		        break;
		    case "Regular":
		        $objPHPExcel->getActiveSheet()->SetCellValue('I'.$lineas,"x");
		        break;
		   	case "Bueno":
		        $objPHPExcel->getActiveSheet()->SetCellValue('J'.$lineas,"x");
		        break;
		}
		switch ($key["celular"]) {
		    case "Deficiente":
		    	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$lineas,"x");
		        break;
		    case "Regular":
		        $objPHPExcel->getActiveSheet()->SetCellValue('L'.$lineas,"x");
		        break;
		   	case "Bueno":
		        $objPHPExcel->getActiveSheet()->SetCellValue('M'.$lineas,"x");
		        break;
		}
		switch ($key["celular"]) {
		    case "Deficiente":
		    	$objPHPExcel->getActiveSheet()->SetCellValue('K'.$lineas,"x");
		        break;
		    case "Regular":
		        $objPHPExcel->getActiveSheet()->SetCellValue('L'.$lineas,"x");
		        break;
		   	case "Bueno":
		        $objPHPExcel->getActiveSheet()->SetCellValue('M'.$lineas,"x");
		        break;
		}
		$objPHPExcel->getActiveSheet()->SetCellValue('Q'.$lineas,$key["horatio"]);
		$objPHPExcel->getActiveSheet()->SetCellValue('R'.$lineas,$key["externo"]);
		switch ($key["internet"]) {
		    case "Contratan una empresa que proveen INTERNET HOGAR":
		    	$objPHPExcel->getActiveSheet()->SetCellValue('S'.$lineas,"x");
		        break;
		    case "Contratan alg??n plan m??vil para celular":
		        $objPHPExcel->getActiveSheet()->SetCellValue('T'.$lineas,"x");
		        break;
		   	case "Contratan bolsas de internet para celulares":
		        $objPHPExcel->getActiveSheet()->SetCellValue('U'.$lineas,"x");
		        break;
		    case "No tienen conexi??n a internet":
		        $objPHPExcel->getActiveSheet()->SetCellValue('V'.$lineas,"x");
		        break;
		}
		switch ($key["estado"]) {
		    case "ESTABLE":
		    	$objPHPExcel->getActiveSheet()->SetCellValue('W'.$lineas,"x");
		        break;
		    case "INESTABLE":
		        $objPHPExcel->getActiveSheet()->SetCellValue('X'.$lineas,"x");
		        break;
		   	case "BAJA":
		        $objPHPExcel->getActiveSheet()->SetCellValue('Y'.$lineas,"x");
		        break;
		    case "MEDIA":
		        $objPHPExcel->getActiveSheet()->SetCellValue('Z'.$lineas,"x");
		        break;
		    case "ALTA":
		        $objPHPExcel->getActiveSheet()->SetCellValue('AA'.$lineas,"x");
		        break;
		}
		$lineas++;
		$cod++;
	}
	
	//Guardamos los cambios
	$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
	$objWriter->save("descarga.xlsx");

	header("Content-disposition: attachment; filename=descarga.xlsx");
	header("Content-type: MIME");
	readfile("descarga.xlsx");
?>
