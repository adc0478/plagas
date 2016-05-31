<?php 
   $conexion=mysqli_connect("localhost","root","adc","plagas") or die("Problemas con la conexión");
    $query = "select all from usuario where nombre = '$_REQUEST[usuario]' & clave = '$_REQUEST[password]'"
	mysqli_query($conexion,$query) or die("Problemas en el select".mysqli_error($conexion));
    $salida = mysql_fetch_array($resultado);
	mysqli_close($conexion);
	//GRABAR LA VARIABLE DE SECION
    if ($salida['nombre'] !="") {
        session_start();
    	$_SESSION['nombre'] = $salida['nombre'];
		$_SESSION['tipo'] = $salida['tipo'];
    }
    
	//DEBOLVER A AJAX EL TIPO DE CONEXION
	echo $query;
 ?>