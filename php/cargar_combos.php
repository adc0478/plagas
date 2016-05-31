<?php 
    if ($_SESSION['tipo']="adm") {
    	require ('parametros_conexion.php');
        require ('conexion.php');
        $respuesta = consultar("", $base, $tabla, $usuario, $pass, $servidor);
    }else{
    	$array = array("nombre"=>$_SESSION['nombre']);
        $respuesta = json_encode($array);
    }
    if ($respuesta != "") {
        $deco = json_decode($respuesta,true);
        foreach ($deco as $value) {
            if ($dat == ""){
               $dat = $value[nombre]; 
            }else{
               $dat  = $dat . ",";
               $dat  = $dat . $value[nombre];   
            }
  
        }
    }
    echo $dat;
 ?>