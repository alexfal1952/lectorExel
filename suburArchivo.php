<?php

    if(isset($_POST["submit"])){
        $nombre_archivo = $_FILES["archivo"]["name"];
        $tipo_archivo = $_FILES["archivo"]["type"];
        $tamano_archivo = $_FILES["archivo"]["size"];

        $limite = $_POST["limite"];
        if($tamano_archivo<=$_POST['limite']){
            if(move_uploaded_file($_FILES["archivo"]["tmp_name"], $nombre_archivo)){
                echo "El archivo " . $nombre_archivo . " se ha transferido correctamente. <br />";
                $fh = fopen("fecha.txt", 'w') or die("Se produjo un error al crear el archivo");
                fwrite($fh, date("Y-m-d H:i:s")) or die("No se pudo escribir en el archivo");
                fclose($fh);
            }
        else{
            echo "No se ha podido transferir el archivo, verifique el tamaño del archivo e intente nuevamente.";
            }
        }
        rename ($nombre_archivo, "carga.csv");
        header('Location: '."index.php");

    }
?>