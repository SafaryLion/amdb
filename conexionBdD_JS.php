<?php 
	define('HOSTNAME', 'localhost');
	define('USERNAME', 'root');
	define('PASSWORD', '');
	define('DATABASE', 'cinev2');
	
	$enlace = new mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
	$enlace->set_charset('utf8');
		
	if (!$enlace) {
		echo "Error al Conectar";
	}