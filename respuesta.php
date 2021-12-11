<!DOCTYPE html>
<html lang="es">
<head>
    <?php include("includes/config.php"); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
   <?php include("includes/cabecera.php"); ?>


    <div class="container">    
        <h1>Contacto</h1>
    <?php

    // if(isset($_POST)){
    //     echo $_POST['nombre'];
    // }else{
    //     echo 'Error';
    // }

    $txt = "Estimad";

    // foreach($_POST as $key => $valor ){
    //     $$key = $valor;
    //     echo "<p>$key = $valor</p>";
    // }

    if($_POST['btnradio'] == 'Hombre'){
        $txt = $txt ."o ". $_POST['nombre'];
    }else if($_POST['btnradio'] == 'Mujer'){
        $txt = $txt ."a ". $_POST['nombre'];
    }else{
        echo 'Ha ocurrido un error...';
    }

    $txt = $txt .", le agradecemos que se haya puesto en contacto con nosotros. Enviaremos las novedades al correo que nos ha suministrado (". $_POST['email'] ."). En breve atenderemos su consulta. Un saludo.";

    echo "Nombre: ". $_POST['nombre']. "<br>";
    echo "Sexo: ". $_POST['btnradio']. "<br>";
    echo "Email: ". $_POST['email']. "<br>";
    echo "Año de nacimiento: ". $_POST['nacido']. "<br>";
    echo "Observación: ". $_POST['observacion']. "<br>";


    echo '<b id="msg_respuesta">'.$txt.'</b>';


    // use PHPMailer\PHPMailer\PHPMailer;
    // use PHPMailer\PHPMailer\Exception;
    
    // require 'PHPMailer/src/Exception.php';
    // require 'PHPMailer/src/PHPMailer.php';
    // require 'PHPMailer/src/SMTP.php';

    $para      = $_POST['email'];
    $titulo    = 'El título';
    $mensaje   = 'Hola';
    $cabeceras = 'From: webmaster@example.com' . "\r\n" .
                 'Reply-To: webmaster@example.com' . "\r\n" .
                 'X-Mailer: PHP/' . phpversion();

//mail($para, $titulo, $mensaje, $cabeceras);

    ?>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


<br>


    <?php include("includes/pie.php"); ?>
</body>
</html>