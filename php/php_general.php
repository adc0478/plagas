<?php 
      function obt_user (){
      	session_start();
      	return $_SESSION ['nombre'];
      }
      function obt_tipo (){
      	session_start();
      	return $_SESSION ['tipo'];
      }
      function cerrar_user (){
      	session_start();
      	$_SESSION ['nombre'] = null;
        $_SESSION ['tipo'] = null;
      }
      function crear_user2 ($nombre, $tipo){
               	//consulto si el registro ya existe
            $base ="plagas";
            $tabla="usuarios";
            $usuario="root";
            $pass="adc";
            $servidor="localhost";

		    $param = 'nombre = "' . $nombre . '"'; 
		    require ('conexion.php');

		    $salida = consultar ($param, $base, $tabla, $usuario, $pass, $servidor);
			if ($salida['nombre'] == null){
        //cargar el nuevo registro
                  $colum = "id,nombre,clave,tipo";
                  $valores = NULL . "," . $nombre .",'12345678'," . $tipo;

                  insertar ($colum, $valores, $base, $tabla, $usuario, $pass, $servidor); 
					echo "cumplido";
			}else{
				echo "existe";
			}
      }


 ?>