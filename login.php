
<!DOCTYPE html>
<html lang="es">
<head>
<?php include("includes/config.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>

<body style="background-color: #f1f1f1">
<?php //include("includes/cabecera.php"); ?>


<div class="container" id="form_login">
<h1>Identifícate</h1>

<form action="validar.php" method="post">


        
    <div class="container">

    <div class="mb-3">
        <input placeholder="Usuario" type="text" name="usuario" size="40" class="form-control" id="exampleFormControlInput1" value="">
    </div>

    <div class="mb-3">
        <input placeholder="Contraseña" type="password" name="contrasenia" size="40" class="form-control" id="exampleFormControlInput2" value="">
    </div>

    <p><img src="includes/img/informacion.png" alt="" style="width: 20px"> Esta es una versión en fase beta, unicamente se puede acceder mediante invitación.</p>

    <button class='btn btn-danger'><a href='index.php' style='color: white; text-decoration: none;'>Volver a inicio</a></button>
    <input class="btn btn-primary" type="submit" value="Siguiente"></input>


<br>
</form>
</div>
<?php


//include("includes/pie.php");


?>

</body>
</html>

