<?php
	require_once 'conectar.php';

	if(isset($_POST["nombre"])){
		
		$nombre = $_POST["nombre"];
		$direccion = $_POST["direccion"];
		$telefono = $_POST["telefono"];
		$dni = $_POST["dni"];
		
		
		$cn = openCon();
		
		if($cn->connect_error){
			
			die("Ha fallado la conexion.".$cn->connect_error);
			
		}else{
			
			$consulta = "UPDATE clientes SET nombre ='$nombre', direccion = '$direccion',dni ='$dni',telefono ='telefono'";
			
			if(!$cn->query($consulta)){
				
				echo "Falló la actualización: (" . $cn->errno . ") " . $cn -> error;
			
			}else{
				
				header("Location:nuevosDatos2.php");
				die();
					
			}
		}
		close($cn);
	}
?>