<?php 
		$servidor = "localhost";
		$usuario = "root";
		$pass = "";
		$bd = "chat";

		$conexion = new mysqli($servidor, $usuario, $pass, $bd);

		if($conexion->connect_error){
            echo "Error al conectarse {$conexion->connect_error}";
        }


 ?>	