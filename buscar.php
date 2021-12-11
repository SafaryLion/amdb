<?php include("includes/conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">    

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>    
    
    <?php include("includes/config.php");?>
    <script src="https://unpkg.com/scrollreveal"></script>

</head>

<body>
<?php include("includes/cabecera.php") ?>





<div class="container" id="enCartelera">

<?php

try{


        
       $url = "https://api.themoviedb.org/3/search/movie?api_key=98fee347b91da83932ea8b9daa0edece&language=es-ES&page=1&include_adult=false&query=" . $_POST['buscar'];
       $res = file_get_contents($url);
       //echo $res;
       $filmdata = json_decode($res);
       $results = $filmdata->results;
       
       foreach ($results as $key => $object) {
        $posterURL = "";
        $generos = "";
        $titulo = "";
        $id = "";
 
         $posterURL =  $object->poster_path;
 
         $titulo =  $object->title;
 
         $id = $object->id;
 

            if($object->poster_path == NULL){
                $poster = "includes/img/noimage.png";
            }else{
         
                $poster = "https://www.themoviedb.org/t/p/w300" . $posterURL;
            }
        ?>
       
        <article class="headline">        
         <h2><?php echo $titulo ?></h2>      
 
 <?php 
   $urlDetalles = "detalles.php?id=". $id;
 ?>
         <a href= <?php echo $urlDetalles?> ><img src=<?php echo $poster ?> alt="" id="imgPoster" height="429px"></a>
 
        </article>
        
 <?php
 }////////////////////////////////////////////////////////////
 ?>


</div>
<?php include("includes/pie.php");


$mbd = null; // cerrar conexion
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
mysqli_close($conn);

?>

<script>
		ScrollReveal().reveal('.headline');
	</script>
</body>
</html>