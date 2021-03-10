<?php
	function openCon(){
	
		$dbhost = "localhost";
		$dbuser ="root";
		$dbpass ="root";
		$db = "gestionventas";
		$cn = new mysqli($dbhost, $dbuser, $dbpass, $db);
	
		return $cn; 
	}
	function closeCon($cn){
		$cn -> close(); 
	}
	?>