<?php include("includes/conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/config.php"); ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include("includes/cabecera.php"); ?>

    <?php
     $usu= $_POST['usuario'];
     $contr= $_POST['contrasenia'];

    $query = "SELECT * from usuariosCine where usuario = '". $usu . "'";

    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        echo "<h3>El usuario introducido no existe</h3> <br><br> <button class='btn btn-primary'><a href='login.php' style='color: white; text-decoration: none;'>Volver atrás</a></button>";

    }else{
        foreach($conn->query($query) as $fila) {
        
            if($contr == $fila['contrasenia']){
                echo "si";


                    if (!isset($_SESSION['usuario'])){
                    session_start();
                    }                    
                    
                    $_SESSION['id'] = $fila['id'];
                    $_SESSION['usuario'] = $_POST['usuario'];
                    $_SESSION['rol'] = $fila['rol'];
                    $_SESSION['nombre'] = $fila['nombre'];
                    
                    header("location: index.php");

            }else{
                echo "<h3></h3>La contraseña introducida es incorrecta. <br><br> <button><a href='index.php'>Volver atrás</a></button>";
            }
        
        }

    }



    include("includes/pie.php");

    ?>
</body>
</html>