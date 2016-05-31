<?php 
    function insertar ($colum, $valores, $base, $tabla, $usuario, $pass, $servidor){
	    $acceso=mysqli_connect($servidor,$usuario,$pass,$base) or die("Problemas con la conexión"); 
	     $query = "insert into ". $tabla ." (". $colum .") values (". $valores .")";
		$resultado = mysqli_query($acceso,$query) or die("Problemas en el insert".mysqli_error($acceso));
		mysqli_close($acceso);

    }
    function modificar ($param, $valores, $base, $tabla, $usuario, $pass, $servidor){
    	 //valores toma el formato campo=valor
    	 $acceso=mysqli_connect($servidor,$usuario,$pass,$base) or die("Problemas con la conexión"); 
	     $query = "update ". $tabla ." set ". $valores . " where ". $param;
         $resultado = mysqli_query($acceso,$query) or die("Problemas en el insert".mysqli_error($acceso));
		mysqli_close($acceso);
    }

    function consultar($parametro_bus, $base, $tabla, $usuario, $pass, $servidor){
        $acceso=mysqli_connect($servidor,$usuario,$pass,$base) or die("Problemas con la conexión"); 
	    if ($parametro_bus != "") {
	    	$query = "select * from " . $tabla ." where (" . $parametro_bus . ')';
	    }else {
	    	$query = "select * from " . $tabla ;
	    }
	    
		$resultado = mysqli_query($acceso,$query) or die("Problemas en el select".mysqli_error($acceso));
        $array_salida = array();
	    while ($salida = mysqli_fetch_array($resultado)){
           array_push($array_salida, $salida);
	    }
	    $codificado = json_encode($array_salida);
        mysqli_close($acceso);        
        return $codificado;
    }
    function borrar($identificador, $base, $tabla, $usuario, $pass){

    }



 ?>