<?php
	
	require_once('conectar.php');
	$conn = openCon();
	
	$sql = "SELECT * FROM clientes";
	
	$registros = $conn->query($sql) or trigger_error("Query Falied! SQL: $consulta - Error: ".mysqli_error($conn),E_USER_ERROR);
	echo "<table><tr>". 
				"<th>Dni</th>". 
				"<th>Nombre</th>". 				
				"<th>Dirección</th>".
				"<th>Teléfono</th>"; 
			
	while($fila = $registros->fetch_assoc()){
		echo "<tr><td>"
					.$fila['dni']."</td><td>"
					.$fila['nombre']."</td><td>"					
					.$fila['direccion']."</td><td>"
					.$fila['telefono']."</td><td>"					
					."<a href='insertarDatos2.php'>Actualizar</a></td><td>"
					."<a href='eliminar.php'>Eliminar</a></td>"
			."</tr>"; 
	}
	echo "</table>";
	$registros->free();
	closeCon($conn);
?>