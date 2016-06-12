<?php 
    if ($_SESSION['tipo'] = 'adm'){
		    //Datos a tener en cuenta: user2 - tipo - Fdesde - archivo
		    $fecha = $_POST['Fdesde'];
		    $ruta = '../archivos/' . $_POST['user2'] . '/';
		    $tmp = split('-',$fecha);
		    $nombre = $_FILES['archivo']['name'];
		   //cargar archivo al servidor
		    if ($_FILES['archivo']['name']) {
		    	$origen = $_FILES['archivo']['tmp_name'];
		    	$destino = $ruta . $_POST['user2'] . "-" . $_POST['tipo'] . "-" .  $tmp[0] . $tmp[1] . $tmp[2] . "-" . $_FILES['archivo']['name'];

		    	//muevo archivo 

		    	if (move_uploaded_file($origen, $destino)){
		    	   $salida = "correcto"; 	
		    	}else{
		    		$salida="No se pudo subir el archivo";
		    	}

		    	
		    }else{
		    	$salida = "No agrego el archivo a subir";
		    }
		    
		    //si se cargo el archivo en el servidor crear registro en base subidos
		     if ($salida = "correcto") {
		        require ('parametros_file.php');
		        require ('conexion.php');
		        $fecha_db = $tmp[2] . "-" . $tmp[1]. "-" . $tmp[0];
		        $valores = '"NULL","' . $_POST['user2'] . '","' . $_POST['tipo'] . '","' . $fecha_db . '","' . $nombre . '"';

		        insertar ($colum, $valores, $base, $tabla, $usuario, $pass, $servidor);
		     }
    }else{
    	$salida = "Usuario no permitido";
    }
   
    //enviar respuesta a ajax
    echo $salida;


 ?>