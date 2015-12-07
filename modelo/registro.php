<?php 

	class Operaciones{
		
		function __construct(){
			
		}

		public function registrar(){
			require ("bd.php");
			$user = $_POST['user'];
			$message = $_POST['message'];

			$sql = "INSERT INTO conversacion (usuario, mensaje) VALUES ('$user', '$message')";
			$resultado = $conexion->query($sql);

			if ($resultado) {
				echo "Mensaje registrado";
			}
			
			else{
				echo "Mensaje no registrado";
			}

		}

		public function usuarios(){
			require ("bd.php");
			$sql = "SELECT DISTINCT id, usuario FROM usuario;";
			$resultado = $conexion->query($sql);
			
			echo "<select id='user' name='user' class='form-control'>";
			while ($data = $resultado->fetch_assoc()){
				echo "<OPTION VALUE=".$data['usuario'].">".$data['usuario']."</OPTION>";

			}
			echo "</select>";
		}

		public function mensajes(){
			require ("bd.php");
			$sql = "SELECT usuario, mensaje, fecha_c FROM conversacion ORDER BY id_c ASC;";
			$resultado = $conexion->query($sql);
			while ($data = $resultado->fetch_assoc()){
				echo "<small>".$data['fecha_c']."</small></br>";
				echo "<p><b>".$data['usuario'].": </b>".$data['mensaje']."</p>";
				
			}
		}
	}

	$instancia = new Operaciones();

	if ($_POST['tipo']=="rm") {
		$instancia->registrar();

	}

	elseif ($_POST['tipo']=="con") {
		$instancia->mensajes();
	}

	elseif ($_POST['tipo']=="usu") {
		$instancia->usuarios();
	}

	else {
		echo "Error para mostrar";
	}



 ?>