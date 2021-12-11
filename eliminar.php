<?php
include('includes/config.php');
$id = $_REQUEST['id'];
    include("includes/usuarioconexion.php");
    echo $query = "update peliculas set activa = 'NA' where id =:id" ;
    $resultado = $mbd->prepare($query) ;
    $resultado ->bindvalue(":id",$id);
    $Exec = $resultado -> execute();
    header("location:listado.php");
    
?>