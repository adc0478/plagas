<?php 
   require ('../plagas/php/php_general.php');
   require ('php/conexion.php');
   require ('php/parametros_conexion.php');
   require ('modelo/datos_usuario.php');
 
   $param = 'nombre = "' . $_POST['us'] . '" and clave = "' . $_POST['ps'] . '"'; 
   $resultado = consultar($param,$base, $tabla, $usuario, $pass, $servidor);
 
	//GRABAR LA VARIABLE DE SECION
   $deco = json_decode($resultado,true);
    if ($deco[0][nombre] !="") {
        session_start();
        //borro sesion anterior 
    	cerrar_user(); //limpia las variables de sesion
    	$_SESSION['nombre'] = $deco[0][nombre];
		  $_SESSION['tipo'] = $deco[0][tipo];
    };
    
	//DEBOLVER A AJAX EL TIPO DE CONEXION
	$sal = $deco[0][tipo];
	echo $sal;
 ?>