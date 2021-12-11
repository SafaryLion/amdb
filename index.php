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


<?php


try {
    //$query = 'SELECT * from peliculas where activa = "A"' ;

    //foreach($conn->query($query) as $fila) {

      //if ($fila['id_peli'] != null){



        
       //$url = "https://api.themoviedb.org/3/movie/" . $fila['id_peli'] ."?api_key=98fee347b91da83932ea8b9daa0edece&language=es-ES";
       
       $url = "https://api.themoviedb.org/3/movie/popular?api_key=98fee347b91da83932ea8b9daa0edece&language=es-ES&page=1";

       $res = file_get_contents($url);
       //echo $res;
       $filmdata = json_decode($res);
       //print_r($filmdata);
       $results = $filmdata->results; 
       //echo "img -> ". $img;     
       ?>
  <div id="div_carruseles">
       <div class="container" id="containerPortada">
       <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-inner">
         <h2 style="color:rgb(139, 245, 139)">Populares esta semana</h2>
         <div class="carousel-item active" data-bs-interval="000001">
           	<h2 class="wrap" style="color: white">Cargando películas...</h2>
             <div id="spinner" class="spinner-border text-light" role="status"></div>
         </div>

        <?php foreach ($results as $key => $object) { 
          $img = $object->backdrop_path;
          $nom = $object->title;
          $ruta = "https://www.themoviedb.org/t/p/w500" . $img;
          $id = $object->id;
          $urlDetalles = "detalles.php?id=".$id;
          //if($img != null){
           ?>

           <div class="carousel-item wrap" data-bs-interval="5000" style="border-radius: 5px; ">
             
            <h2 style="color: white"><?php echo $nom ?></h2>
			<a href="<?php echo $urlDetalles ?>"><img id="imgCarrusel" src=<?php echo $ruta ?> class="d-block w-100" alt="" style="border-radius: 5px"></a>
           </div>
           
          <?php } ?>

         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
           <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
           <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
           <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
           <span class="visually-hidden">Next</span>
         </button>
       </div>
       </div>
  
       <!-- carrusel 2 -->
<?php
$url = "https://api.themoviedb.org/3/movie/upcoming?api_key=98fee347b91da83932ea8b9daa0edece&language=es-ES&page=1&region=es";

$res = file_get_contents($url);
//echo $res;
$filmdata = json_decode($res);
//print_r($filmdata);
$results = $filmdata->results; 
?>
  
  <div class="container" id="containerPortada2">
       <div id="carousel2" class="carousel slide" data-bs-ride="carousel">
         <div class="carousel-inner">
         <h2 style="color:rgb(139, 245, 139)">Proximamente en cines</h2>
         <div class="carousel-item active" data-bs-interval="000001">
           	<h2 class="wrap" style="color: white">Cargando películas...</h2>
             <div id="spinner" class="spinner-border text-light" role="status"></div>
         </div>

        <?php foreach ($results as $key => $object) { 
          $img = $object->backdrop_path;
          $nom = $object->title;
          $ruta = "https://www.themoviedb.org/t/p/w500" . $img;
          $id = $object->id;
          $urlDetalles = "detalles.php?id=".$id;
          //if($img != null){
           ?>

          <div class="carousel-item wrap" data-bs-interval="5000" style="border-radius: 5px; ">
             
          <h2 style="color: white"><?php echo $nom ?></h2>
			    <a href="<?php echo $urlDetalles ?>"><img id="imgCarrusel" src=<?php echo $ruta ?> class="d-block w-100" alt="" style="border-radius: 5px"></a>
          </div>
           
          <?php } ?>

         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#carousel2" data-bs-slide="prev" >
           <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span> -->
           <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#carousel2" data-bs-slide="next" >
           <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span> -->
           <span class="visually-hidden">Next</span>
         </button>
       </div>
       </div>
</div>
<?php

$url = "https://api.themoviedb.org/3/movie/now_playing?api_key=98fee347b91da83932ea8b9daa0edece&language=es-ES&page=1&region=es";

$res = file_get_contents($url);
//echo $res;
$filmdata = json_decode($res);
$results = $filmdata->results; 

?>

       <div class="container" id="enCartelera">
       
<div class="container" id="">
<h2 class="titleCartelera" id="cartelera">Novedades</h2>
</div>

<?php
       foreach ($results as $key => $object) {

       $posterURL = $object->poster_path;
       $filmname = $object->title;
       $generos = "";
       $id = $object->id;
   
       $poster = "https://www.themoviedb.org/t/p/w300" . $posterURL;


?>


       
      
       <article class="wrap reducir">        
        <h3 class="noMargin;"><?php echo $filmname ?></h3>      
        <h5><?php echo $generos ?></h5>

<?php 
  $urlDetalles = "detalles.php?id=".$id;
?>
        <a href= <?php echo $urlDetalles?> ><img src=<?php echo $poster ?> alt="" id="imgPoster" ></a>

       </article>

       <br><br>
       <?php
}

    //}



?>



<div class="container">
<h2 class="titleCartelera" id="populares">Películas populares</h2>
</div>

<?php

$url = "https://api.themoviedb.org/3/movie/popular?api_key=98fee347b91da83932ea8b9daa0edece&language=es-ES&page=1";
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
      //   $filmgenres= $object->genres;
    

      //  foreach ($filmgenres as $key => $object) {
      //   $generos = $generos . $object->name . ' ';

      //   }
        
        // if($fila['genero'] == null){

        //   $query = "update peliculas set genero = '$generos' where id_peli = $id" ;
          
        //    $conn->query($query);
        //   }
   
       $poster = "https://www.themoviedb.org/t/p/w300" . $posterURL;
      
       ?>
      
       <article class="headline wrap reducir">        
        <h3 style="margin: none;"><?php echo $titulo ?></h3>      
        <h5><?php echo $generos ?></h5>

<?php 
  $urlDetalles = "detalles.php?id=". $id;
?>
        <a href= <?php echo $urlDetalles?> ><img src=<?php echo $poster ?> alt="" id="imgPoster"></a>

       </article>
       
<?php
}////////////////////////////////////////////////////////////
?>





<div class="container">
<h2 class="titleCartelera" id="proximamente">Proximamente</h2>
</div>
<?php

$url = "https://api.themoviedb.org/3/movie/upcoming?api_key=98fee347b91da83932ea8b9daa0edece&language=es-ES&page=1&region=es";
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


      //  foreach ($filmgenres as $key => $object) {
      //   $generos = $generos . $object->name . ' ';

      //   }

       $poster = "https://www.themoviedb.org/t/p/w300" . $posterURL;
      
       ?>
      
       <article class="headline wrap reducir">        
        <h3 style="margin: none;"><?php echo $titulo ?></h3>      
        <h5><?php echo $generos ?></h5>

<?php 
  $urlDetalles = "detalles.php?id=". $id;
?>
        <a href= <?php echo $urlDetalles?> ><img src=<?php echo $poster ?> alt="" id="imgPoster"></a>

       </article>
       
<?php
}
?>
</div><br><br>
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