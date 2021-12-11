<?php include("includes/conexion.php"); ?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado</title>    
    
    <?php include("includes/config.php");?>
    <script src="https://unpkg.com/scrollreveal"></script>

</head>
<body>
<?php include("includes/cabecera.php") ?>
    
<div class="container">


<div id="botones">
<h1 style="margin-top: 1em;">Listado de películas<a href="peliculainsertar.php" class="btn btn-success floatRight shadow-sm rounded">Nueva Película <img class="icon2" src="includes/img/plus.png" alt=""></a>
</h1>

</div>

<?php

    $query = 'SELECT * from peliculas where activa = "A"' ;
    echo '<table class="table">';
    echo '<tr><th>Fila</th><th>Id Película</th><th>Título</th><th>Duración</th><th>Géneros</th><th>Fecha de Estreno</th><th>Editar</th><th>Eliminar</th></tr>';
    foreach($conn->query($query) as $fila) {
       //if (isset($tipoA[$fila['tipo']])){$tipot=$tipoA[$fila['tipo']];}
       echo '<tr class="headline">';
       echo '<td>' . $fila['id'] . '</td><td>' .  $fila['id_peli'] . '</td><td>' .$fila['titulo'] . '</td><td>' .  $fila['duracion'] . '</td><td>' .  $fila['genero'] . '</td><td>' .  $fila['fecha'] . '</td>';
       echo '<td><a href="editar.php?id='.$fila['id'].'" class="btn"><img class="icon" src="includes/img/pencil.png" alt=""></a></td>';
       echo '<td><a href="eliminar.php?id='.$fila['id'].'" onclick="return confirmar(\'¿Está seguro que desea eliminar el registro?\')" class="btn"><img class="icon" src="includes/img/trash.png" alt=""></a></td>';?>
        
       <?php echo '</tr>';
       
      //print_r ($fila);
    }

    echo '<table>';

?>

</div>
    

<?php //include("includes/pie.php");


mysqli_close($conn);
?>

<script>        



ScrollReveal().reveal('.headline');
        
$(window).load(function() {    
    $("#spinner").fadeOut("slow");    
    //$(".verde").fadeOut("slow");
    }
);
	</script>
</body>
</html>