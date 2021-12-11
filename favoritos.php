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

<div class="container" id="containerPortada">
    <div class="container" id="enCartelera">

        <div class="container" id="blanco">
            <h2 class="titleCartelera" id="cartelera">Tus favoritos</h2>
        </div>

<?php


try {
    //$query = 'SELECT * from peliculas where activa = "A"' ;

    //foreach($conn->query($query) as $fila) {

      //if ($fila['id_peli'] != null){


        $sql = "SELECT * FROM user_peliculas WHERE id_usuario = ". $_SESSION['id'];
        //echo $sql;
        $result = $conn->query($sql);

        if ($result = $conn->query($sql)) {
            while($fila = $result->fetch_object()){
                $line =$fila->id_pelicula;
                //echo $line;
                
                $url = "https://api.themoviedb.org/3/movie/" . $line ."?api_key=98fee347b91da83932ea8b9daa0edece&language=es-ES";
        $res = file_get_contents($url);
        //echo $res;
        $filmdata = json_decode($res);
        
        $posterURL = $filmdata->poster_path;
       $filmname = $filmdata->title;
       $id = $filmdata->id;
   
       $poster = "https://www.themoviedb.org/t/p/w300" . $posterURL;
           
        
        

       ?>
<article class="headline ">        
        <h2><?php echo $filmname ?></h2>      

<?php 
  $urlDetalles = "detalles.php?id=".$id;
?>
        <a href= <?php echo $urlDetalles?> ><img src=<?php echo $poster ?> alt="" id="imgPoster" ></a>

       </article>


<?php

       
}
}  

?>


       
      
       

       <br><br>
       <?php


    //}



?>




       
<?php

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