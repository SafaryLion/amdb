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

       $url = "https://api.themoviedb.org/3/company/" . $_GET['id'] . "?api_key=98fee347b91da83932ea8b9daa0edece";
       $res = file_get_contents($url);
       //echo $res;
       $companydata = json_decode($res);


    //foreach ($companydata as $key => $object) {

        $logoURL = "";
        $name = "";       
        $descripcion = "";
        $sede = "";
        $pais = "";
        $matriz ="";
        $web = "";
        $poster = "";

        $logoURL = $companydata->logo_path;
        $name = $companydata->name;       
        $descripcion = $companydata->description;
        $sede = $companydata->headquarters;
        $pais = $companydata->origin_country;
        $matriz = $companydata->parent_company;
        $web = $companydata->homepage;
        

        if($name == ""){$name = "Nombre no disponible";};       
        if($descripcion == ""){$descripcion = "Descripción no disponible";};
        if($sede == ""){$sede = "Información no disponible";};
        if($pais == ""){$pais = "Información no disponible";};
        if($matriz == ""){$matriz = "Información no disponible";};
        if($web == ""){$web = "URL no disponible";};

        if($logoURL == null){
            
            $poster = "includes/img/noimage.png";}
        
        else{
   
            $poster = "https://www.themoviedb.org/t/p/w300" . $logoURL;
        }
       ?>
      
      <article id="articuloDetalle">  
          <div id="likeflex">
            <h2><?php echo $name ?></h2> 

           
        </div>      

            <div id="detalle">
            <img src="<?php echo $poster ?>" alt="" style="height: 200px; margin-top: 2em;">
            <div>
                <h5 id="elemDetalle"><?php echo "<b>Nombre:</b> ". $name ?></h5><br>
                <h5 id="elemDetalle"><?php echo "<b>Descripción:</b> ". $descripcion ?></h5><br>
                <h5 id="elemDetalle"><?php echo "<b>Sede:</b> ". $sede ?></h5><br>
                <h5 id="elemDetalle"> <?php echo "<b>País de origen:</b> " . $pais ?></h5><br>
                <h5 id="elemDetalle"> <?php echo "<b>Empresa matriz:</b> " . $matriz ?></h5><br>
                <h5 id="elemDetalle"> <b>Sitio web:</b><a href=<?php echo $web ?> > <?php echo $web ?> </a></h5><br>
            </div>

            </div>
       </article>

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
    