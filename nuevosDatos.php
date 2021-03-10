<?php
	
	require_once('conectar.php');
	$conn = openCon();
	
	$sql = "SELECT * FROM facturaview";
	
	$registros = $conn->query($sql) or trigger_error("Query Falied! SQL: $consulta - Error: ".mysqli_error($conn),E_USER_ERROR);
	echo "<table><tr>". 
				"<th>Albaran</th>". 
				"<th>Factura</th>". 				
				"<th>Fecha</th>".
				"<th>Dni</th>".
				"<th>Descripción</th>".
				"<th>Total</th>"; 
			
	while($fila = $registros->fetch_assoc()){
		echo "<tr><td>"
					.$fila['albaran']."</td><td>"
					.$fila['factura']."</td><td>"					
					.$fila['fecha']."</td><td>"
					.$fila['dni']."</td><td>"					
					.$fila['descripcion']."</td><td>"
					.$fila['total']."</td><td>"
			."</tr>"; 
	}
	echo "</table>";
	$registros->free();
	closeCon($conn);
?>