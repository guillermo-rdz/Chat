<?php 

	require ("bd.php");
			$sql = "SELECT usuario, mensaje, fecha_c FROM conversacion ORDER BY id_c ASC;";
			$resultado = $conexion->query($sql);
			
			while ($data = $resultado->fetch_assoc()){
				echo "<p><b>".$data['usuario']."</b> dice: ".$data['mensaje']."</p>";
				
			}
 ?>