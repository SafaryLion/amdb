<?php

session_start();
// Guardar datos de sesión
$_SESSION['id'] = $fila['id'];
$_SESSION['usuario'] = $_POST['usuario'];
$_SESSION['rol'] = $fila['rol'];
$_SESSION['nombre'] = $fila['nombre'];

header("Location: index.php"); ?>