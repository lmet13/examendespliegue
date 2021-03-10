<?php
	require_once 'conectar.php';

	if(isset($_POST["nombre"])){
		
		$nombre = $_POST["nombre"];
		$apellido = $_POST["apellido"];
		$direccion = $_POST["direccion"];
		$telefono = $_POST["telefono"];
		$dni = $_POST["dni"];
		
		
		$cn = openCon();
		
		if($cn->connect_error){
			
			die("Ha fallado la conexion.".$cn->connect_error);
			
		}else{
			//DELETE FROM table_name WHERE condition;
			$consulta = "DELETE FROM clientes WHERE dni='$dni'";
			
			if(!$cn->query($consulta)){
				
				echo "Falló el borrado: (" . $cn->errno . ") " . $cn -> error;
			
			}else{
				
				header("Location:nuevosDatos2.php");
				die();
					
			}
		}
		close($cn);
	}
?>