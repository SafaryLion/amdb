<?php
//error_reporting(0);

	//$chk_watchlist = $_POST['checkbox'];
	//echo $chk_watchlist;
	$idPeli = $_POST["id_pelicula"];
    $idUsuario = $_POST['id_usuario'];
	
	//echo $idPeli;
	//echo " - ". $idUsuario;


	include("includes/conexion.php");
//WATCHLIST


$result = mysqli_query($conn, "SELECT count(id_pelicula) as id FROM watchlist WHERE id_usuario =". $idUsuario ." AND id_pelicula=". $idPeli);
$row = mysqli_fetch_assoc($result);
$numero = $row['id'];
//echo " Numero:".$numero;

if($numero > 0){
    //echo 'Hay '.$numero.' resultados';
	$existe = true;
	$sql = "DELETE FROM watchlist WHERE id_pelicula = ".$idPeli." AND id_usuario = ".$idUsuario;
	$conn->query($sql);
}else{
    //echo 'No hay resultados';
$existe = false;
	$sql = "INSERT INTO watchlist (id_usuario, id_pelicula) VALUES ('".$idUsuario."', '".$idPeli."')";
	$conn->query($sql);
	  
}
//echo $sql;


	header('Location: detalles.php?id='.$idPeli);
