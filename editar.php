<?php
include('includes/config.php');
$id = $_REQUEST['id'];

$accion = 'Modificar'; // vamos a modificar
include("includes/usuarioconexion.php");
// selecionamos el registro por id
$query = "SELECT * from peliculas where id =:id" ;
$resultado = $mbd->prepare($query) ;
$resultado ->bindvalue(":id",$id);
$Exec = $resultado -> execute();
$fila = $resultado->fetch();

$titulo =  $fila['titulo'];
$duracion =  $fila['duracion'];
$genero = [$fila['genero']];
$estatus= $fila['activa'];
$fech_estr= $fila['fecha'];
$imagen =  $fila['imagen'];
$sinopsis = $fila['sinopsis'];
$tituloOriginal = $fila['tituloOriginal'];
$productoras =$fila['productoras'];
$paises = $fila['pais'];
$puntuacion = $fila['puntuacion'];

include("formupeli.php");
?>