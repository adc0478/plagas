<?php 
   require ('conexion.php');
   require ('parametros_conexion.php');
   session_start();
   if ($_SESSION['tipo']=="adm"){
         $colum="id,nombre,clave,tipo";
         $valores="Null, '" .$_POST['dato']. "','12345678','us'";
         $parametro_bus = "nombre='".$_POST['dato']."'";
         $verificar = consultar($parametro_bus, $base, $tabla, $usuario, $pass, $servidor);
         $deco = json_decode($verificar,true);
         $valu = "";
         $valu = $deco[0][nombre];
         if ($deco[0][nombre]=="") {
             insertar ($colum, $valores, $base, $tabla, $usuario, $pass, $servidor);
             mkdir($_POST['dato'],0777);
             echo "creado";
         }else{
             echo "El usuario ya existe";
         }
   }else{
      echo "Usuario no permitido para crear cuentas";
   }

 ?>