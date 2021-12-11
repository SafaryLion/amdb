<?php include("includes/conexion.php"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>    
    
    <?php include("includes/config.php");?>

</head>
<body>
<?php include("includes/cabecera.php") ?>


<div class="container" id="enCartelera">
<?php

try {  

       $url = "https://api.themoviedb.org/3/person/" . $_GET['id'] . "?api_key=98fee347b91da83932ea8b9daa0edece&language=es-ES";
       $res = file_get_contents($url);
       //echo $res;
       $actdata = json_decode($res);


    //foreach ($actdata as $key => $object) {

       $posterURL = "";
       $actname = "";
       $bio = "";
       $id = "";
       $fecha = "";
       $trabajo = "";
       $place = "";

        $posterURL = $actdata->profile_path;
        $actname = $actdata->name;       
        $bio = $actdata->biography;

        if($bio == ""){
            $bio = "Sin biografía";
        }

        $fecha = $actdata->birthday;

        if($fecha == ""){
            $fecha = "No hay información";
        }

        $trabajo = $actdata->known_for_department;
        if($trabajo == ""){
            $trabajo = "No hay información";
        }

        $place = $actdata->place_of_birth;
        if($place == ""){
            $place = "No hay información";
        }

        $id = $actdata->id;
        
   
       $poster = "https://www.themoviedb.org/t/p/w300" . $posterURL;
      
       ?>
      
      <article id="articuloDetalle">        
    

            <?php $urlDetalles = `detalles.php?id=$id`;
            echo $urlDetalles;
            ?>
            <div id="detalle">
            <img src=<?php echo $poster ?> alt="" style="max-height: 450px;">
            <div>                
                <h4 class="tituloPersona"><?php echo "<b>" . $actname . "</b>" ?></h4><br>

                <h5 id="elemDetalle"><?php echo "<b>Desempeño</b> " . $trabajo ?></h5><br>
                <h5 id="elemDetalle"><?php echo "<b>Fecha de nacimiento:</b> ". $fecha ?></h5><br>

                <h5 id="elemDetalle"><?php echo "<b>Lugar de nacimiento:</b> ". $place ?></h5><br>
                <h5 id="elemDetalle"><?php echo "<b>Biografía</b> "?></h5><br>
                <h6 id="elemDetalle"><?php echo $bio ?></h6><br>

            </div>

            </div>
       </article>
</div>



<?php /////////////////////////////////////////////// ?>

</div>
<?php /////////////////////////////////////////////// ?>





<br><br>
<br><br>

<?php
  $mbd = null; // cerrar conexion
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
?>



<?php include("includes/pie.php");

mysqli_close($conn);
    