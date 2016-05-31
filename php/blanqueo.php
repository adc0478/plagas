<?php 
   require ('conexion.php');
   require ('parametros_conexion.php');
   session_start();
   $val = $_SESSION['tipo'];
    if ( $val == "adm"){
      $dato = $_POST['dat'];
      $valores = "clave='123456'";
      $param = "nombre = '".$dato. "'"; 
      modificar ($param, $valores, $base, $tabla, $usuario, $pass, $servidor);
      echo "ok";
    }else{
    	echo "error";
    }

 
 ?>