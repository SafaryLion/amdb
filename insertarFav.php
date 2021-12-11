<?php
//error_reporting(0);
	$chk_checked = $_POST['checkbox'];
	//echo $chk_checked;
	$idPeli = $_POST["id_pelicula"];
    $idUsuario = $_POST['id_usuario'];
	$chk_watchlist = $_POST['watchlistChk'];
	
	require('conexionBdD_JS.php');
	
	//FAVORITOS
	if ($chk_checked){
	$sql = "INSERT INTO user_peliculas (id_usuario, id_pelicula) VALUES ('".$idUsuario."', '".$idPeli."')";
	$ejecutar = $enlace->query($sql) or trigger_error($enlace->error." [sql error]");
	  
		if ($ejecutar) { // Si la ejecución dio true, imprime 200
			/* Esto producirá un error. Fíjese en el html*/
		
		//header('Location: detalles.php?id='.$idPeli);
		}

	}else{
		$sql = "DELETE FROM user_peliculas WHERE id_pelicula = ".$idPeli." AND id_usuario = ".$idUsuario;
		$ejecutar = $enlace->query($sql) or trigger_error($enlace->error." [sql error]");
		//header('Location: detalles.php?id='.$idPeli);

	}

		header('Location: detalles.php?id='.$idPeli);
