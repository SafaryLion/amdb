<?php include("includes/conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles</title>    
    
    <?php include("includes/config.php");?>

</head>
<body>
<?php include("includes/cabecera.php") ?>


<div class="container" id="enCartelera">
<?php

try {  

       $urll = "https://api.themoviedb.org/3/movie/" . $_GET["id"] ."?api_key=98fee347b91da83932ea8b9daa0edece&language=es-ES";
       $res = file_get_contents($urll);
       //echo $res;
       $filmdata = json_decode($res);


    //foreach ($filmdata as $key => $object) {

       $posterURL = "";
       $generos = "";
       $titulo = "";
       $id = "";
       $title = "";

        $posterURL = $filmdata->poster_path;
        $filmname = $filmdata->title;       
        $sinopsis = $filmdata->overview;
        $fechaEstreno = $filmdata->release_date;
        $puntuacion = $filmdata->vote_average;
        $tituloOriginal = $filmdata->original_title;
        $duracion = $filmdata->runtime;




        $titulo =  $filmdata->title;
        //echo $res;

        $id = $filmdata->id;

        $filmgenres = $filmdata->genres;

       foreach ($filmgenres as $key => $object) {
        $generos = $generos . $object->name . ' ';

        }

        $productoras = "";

        $company = $filmdata->production_companies;


        $paises = "";

        $country = $filmdata->production_countries;

        foreach ($country as $key => $object) {
            $paises = $paises . $object->name . ' ';
        
        }
        
   
       $poster = "https://www.themoviedb.org/t/p/w300" . $posterURL;
      
    if(isset($_SESSION['id'])){
       $sql = "SELECT * FROM user_peliculas WHERE id_usuario =". $_SESSION["id"] ." AND id_pelicula=". $_GET["id"];
       $result = $conn->query($sql);

       //echo ($sql);

       $existe = false;
       if ($result->num_rows > 0) {
        // output data of each row
        // while($row = $result->fetch_assoc()) {
        //   echo $row["id_pelicula"]. " " . $row["id_usuario"]. "<br>";
        // }
        $existe = true;
      } else {
        //echo "0 results";
      }
    }


    if(isset($_SESSION['id'])){
        $sql = "SELECT * FROM watchlist WHERE id_usuario =". $_SESSION["id"] ." AND id_pelicula=". $_GET["id"];
        $result = $conn->query($sql);
        //print_r($result);
        //echo ($sql);
     $existeWatchlist = false;

        //$existeWatchlist = false;
        if ($result->num_rows > 0) {
         // output data of each row
         // while($row = $result->fetch_assoc()) {
         //   echo $row["id_pelicula"]. " " . $row["id_usuario"]. "<br>";
         // }
         $existeWatchlist = true;
       } else {
         //echo "0 results";
       }
     }
       ?>
      
      <article id="articuloDetalle">  
          <div id="likeflex">
            <h2><?php echo $filmname ?></h2> 



<!--  /*********************************************************************************************************************** */  -->
<h6><?php echo $generos ?></h6>

<div id="divCorazonyGuardar">

    <form action="insertarFav.php" method="post" id="formu">

    <?php if(isset($_SESSION['usuario'])){ ?>
            <input type="checkbox" id="checkbox" name="checkbox" onclick="$('#formu').submit();" <?php if($existe){ ?>checked <?php } ?>/>
    <?php }else{ ?>
        <input type="checkbox" id="checkbox" name="checkbox" onclick="location.href='login.php'"/>
        <?php } ?>

            <label for="checkbox">
            <svg id="heart-svg" viewBox="467 392 58 57" xmlns="http://www.w3.org/2000/svg" stroke-linecap="round" stroke-linejoin="round">
                <g id="Group" fill="none" fill-rule="evenodd" transform="translate(467 392)">
                <path d="M29.144 20.773c-.063-.13-4.227-8.67-11.44-2.59C7.63 28.795 28.94 43.256 29.143 43.394c.204-.138 21.513-14.6 11.44-25.213-7.214-6.08-11.377 2.46-11.44 2.59z" id="heart" />
                <circle class="circle" cx="29.5" cy="29.5" r="1.5" stroke="#CD85E7" stroke-width="0 "/>

                <g id="grp7" opacity="0" transform="translate(7 6)">
                    <circle id="oval1" fill="#9CD8C3" cx="2" cy="6" r="2" />
                    <circle id="oval2" fill="#8CE8C3" cx="5" cy="2" r="2" />
                </g>

                <g id="grp6" opacity="0" transform="translate(0 28)">
                    <circle id="oval1" fill="#CC8EF5" cx="2" cy="7" r="2" />
                    <circle id="oval2" fill="#91D2FA" cx="3" cy="2" r="2" />
                </g>

                <g id="grp3" opacity="0" transform="translate(52 28)">
                    <circle id="oval2" fill="#9CD8C3" cx="2" cy="7" r="2" />
                    <circle id="oval1" fill="#8CE8C3" cx="4" cy="2" r="2" />
                </g>

                <g id="grp2" opacity="0" transform="translate(44 6)">
                    <circle id="oval2" fill="#CC8EF5" cx="5" cy="6" r="2" />
                    <circle id="oval1" fill="#CC8EF5" cx="2" cy="2" r="2" />
                </g>

                <g id="grp5" opacity="0" transform="translate(14 50)">
                    <circle id="oval1" fill="#91D2FA" cx="6" cy="5" r="2" />
                    <circle id="oval2" fill="#91D2FA" cx="2" cy="2" r="2" />
                </g>

                <g id="grp4" opacity="0" transform="translate(35 50)">
                    <circle id="oval1" fill="#F48EA7" cx="6" cy="5" r="2" />
                    <circle id="oval2" fill="#F48EA7" cx="2" cy="2" r="2" />
                </g>

                <g id="grp1" opacity="0" transform="translate(24)">
                    <circle id="oval1" fill="#9FC7FA" cx="2.5" cy="3" r="2" />
                    <circle id="oval2" fill="#9FC7FA" cx="7.5" cy="2" r="2" />
                </g>
                </g>
            </svg>
            </label>

            <?php if(isset($_SESSION['usuario'])){?>
            <input type="text" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['id'] ?>" style="display:none" />
            <input type="text" id="id_pelicula" name="id_pelicula" value="<?php echo $_GET['id'] ?>" style="display:none" />
            <?php } ?>

            </form>        
            

<!--  /*********************************************************************************************************************** */  -->

<?php 
if(isset($_SESSION['usuario'])){
$idUsuario = $_SESSION["id"];
$idPeli = $_GET['id'];
//include("includes/conexion.php");
$result = mysqli_query($conn, "SELECT count(id_pelicula) as id FROM watchlist WHERE id_usuario =". $idUsuario ." AND id_pelicula=". $idPeli);
$row = mysqli_fetch_assoc($result);
$numero = $row['id']; 
}
?>

            <form action="insertarWatchlist.php" method="post" id="formu2">
            <?php if(isset($_SESSION['usuario'])){ ?>           
            <img id="watchlist" <?php if($numero > 0){ ?>src="includes/img/bookmarkBlack.png" <?php }else{ ?> src="includes/img/bookmark.png" <?php } ?>onclick="$('#formu2').submit();"  alt="Watchlist" style="width: 40px; height: 40px; position: relative; display: block; float: right;" /> 
            <?php }else{ ?>
            <a href="login.php"><img id="watchlist" src="includes/img/bookmark.png" alt="Watchlist" /></a> 
            <?php }?>
                <?php if(isset($_SESSION['usuario'])){?>
                <input type="text" id="id_usuario" name="id_usuario" value="<?php echo $_SESSION['id'] ?>" style="display:none" />
                <input type="text" id="id_pelicula" name="id_pelicula" value="<?php echo $_GET['id'] ?>" style="display:none" />
                <?php } ?>                
                <!-- <input type="checkbox" id="watchlistChk" name="checkbox" checked="" /> -->

            </form>
        </div>               
        </div>
   

    

            <?php $urlDetalles = `detalles.php?id=$id`;
            echo $urlDetalles;
            ?>
            <div id="detalle">
            <img src=<?php echo $poster ?> class="imgPoster" id="posterDetalles" alt="" style="max-height: 450px; max-width: 300px; top: 30px;
position: relative;">
            <div id="infoDetalle">                                
                <h5 id="elemDetalle"><?php echo "<b>Puntuación:</b> ". $puntuacion ?></h5>
                                            <!-- Add icon library -->
                            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                            <div class="rating">
                                <?php if(ceil($puntuacion) >= 2) { ?>
                                <span class="fa fa-star checked"></span>
                            <?php }else{ ?>
                                <span class="fa fa-star"></span>
                            <?php } ?>

                            <?php if(ceil($puntuacion) >= 4) { ?>
                                <span class="fa fa-star checked"></span>
                            <?php }else{ ?>
                                <span class="fa fa-star"></span>
                            <?php } ?>

                            <?php if(ceil($puntuacion) >= 6) { ?>
                                <span class="fa fa-star checked"></span>
                            <?php }else{ ?>
                                <span class="fa fa-star"></span>
                            <?php } ?>

                            <?php if($puntuacion >= 7) { ?>
                                <span class="fa fa-star checked"></span>
                            <?php }else{ ?>
                                <span class="fa fa-star"></span>
                            <?php } ?>

                            <?php if ($puntuacion >= 9 ) { ?>
                                <span class="fa fa-star checked"></span>
                            <?php }else{ ?>
                                <span class="fa fa-star"></span>
                            <?php } ?>
                            </div>
<br><br>
                <h5 id="elemDetalle"><?php echo "<b>Título original:</b> ". $tituloOriginal ?></h5><br>                
                <h5 id="elemDetalle"><?php echo "<b>Fecha de estreno:</b> ". $fechaEstreno ?></h5><br>
                <h5 id="elemDetalle"><?php echo "<b>Sinopsis:</b> ". $sinopsis ?></h5><br>
                <h5 id="elemDetalle"><?php echo "<b>Duración:</b> ". $duracion . " minutos"?></h5><br>
                <h5 id="elemDetalle"> <?php echo "<b>Productor/as:</b> "?> <br>
                <?php
                foreach ($company as $key => $object) {
                    $productoras =  $object->name;
                    $id_productora = $object->id;

                    $txt = "productora.php?id=" . $id_productora; 
            ?>
    
    <a href= <?php echo $txt ?> ><?php echo $productoras ?></a> <br>
                <?php }
                ?>                
            </h5><br>

                <h5 id="elemDetalle"><?php echo "<b>País/es:</b> ". $paises ?></h5><br>

            </div>

            </div>
       </article>

       <hr>
<div class="container">
<h2 class="titleCartelera">Tráiler</h2>
</div>


       <?php
       
       $video = "https://api.themoviedb.org/3/movie/" . $_GET["id"] . "/videos?api_key=98fee347b91da83932ea8b9daa0edece&language=es-ES";
       $res = file_get_contents($video);
       //echo $res;
       $videodata = json_decode($res);

       
       foreach ($videodata as $key => $object) {       
           $video = $videodata->results;

       }           
       
       $idVideo = "";

       foreach ($video as $key => $object) {       

        $idVideo = $object->key;
        
    }  



       
       $src = "https://www.youtube.com/embed/" . $idVideo;
       //////////////////////////////////////////////////////////////////////////

?>


       <iframe width="560" height="315" src=<?php echo $src ?> title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>



<div class="container">
<h2 class="titleCartelera">Reparto / Equipo</h2>
</div>

<div class="scrolldivisor"> 

<?php

       $urlActores = "https://api.themoviedb.org/3/movie/" . $_GET['id'] ."/credits?api_key=98fee347b91da83932ea8b9daa0edece&language=es-ES";
       $resActores = file_get_contents($urlActores);
       //echo $resActores;
        $actordata = json_decode($resActores);

        $actores = $actordata->cast;
        $imagen = "https://www.themoviedb.org/t/p/w300/";
        $nom = "";
        $personaje = "";
        $dept = "";
        $noimage = false;
        $idActor = "";

        foreach ($actores as $key => $object) {
            $imagenSRC = $imagen . $object->profile_path . ' ';

            if($object->profile_path == NULL){
                $imagenSRC = "includes/img/noimage.png";
                $noimage = true;
            }



            $nom = $object->name;
            $personaje = $object->character;
            $dept = $object->known_for_department;
            $idActor = $object->id;
            $idActor = "persona.php?id=". $idActor;
        ?>

<article class="headline">        

        <div class="card" style="width: 18rem;" data-av-animation="slideInRight">
            <a href="<?php echo $idActor ?>" ><img src=<?php echo $imagenSRC; if($noimage == true){ ?> <?php } ?>  class="card-img-top" alt="..."></a>
            <div class="card-body">
                <h5 class="card-title"><a href="<?php echo $idActor ?>" ><?php echo $nom ?></a></h5>
                <p class="card-text"><?php echo $personaje; ?></p>
                <p class="card-text"><?php echo $dept; ?></p>

            </div>
        </div>

</article>
<?php
        }

?>
</div>



<?php /////////////////////////////////////////////// ?>

<div class="container">
<h2 class="titleCartelera" id="proximamente">Similares a <?php echo $filmname ?> </h2>
</div>

<div class="scrolldivisor"> 

<?php

$url = "https://api.themoviedb.org/3/movie/" . $_GET['id'] . "/similar?api_key=98fee347b91da83932ea8b9daa0edece&language=es-ES&page=1";
       
$res = file_get_contents($url);
       //echo $res;
       
       $filmdata = json_decode($res);

       $results = $filmdata->results;
       
    foreach ($results as $key => $object) {

       $posterURL = "";
       $titulo = "";
       $id = "";

        $posterURL =  $object->poster_path;

        $titulo =  $object->title;

        $id = $object->id;

       $poster = "https://www.themoviedb.org/t/p/w300" . $posterURL;
      
       ?>
      
       <article class="headline">        
        <h2><?php echo $titulo ?></h2>      

<?php 
        $urlDetalles = "detalles.php?id=". $id;
?>
        <a href= <?php echo $urlDetalles?> ><img src=<?php echo $poster ?> alt="" id="imgPoster"></a>

       </article>
       
<?php
}
?></div>
<p></p>
</div><br>
<!--</div>-->
<div>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
<script>

document.getElementById("watchlist").addEventListener("click", changeImage);

function changeImage() {
    //alert(document.getElementById("watchlist").src);

if (document.getElementById("watchlist").src == "http://localhost/CINE/includes/img/bookmark.png"){

    document.getElementById("watchlistChk").checked = true;
    document.getElementById("watchlist").src = "includes/img/bookmarkBlack.png";

}else{   

    document.getElementById("watchlistChk").checked = false;
    document.getElementById("watchlist").src = "includes/img/bookmark.png";   

}
}

</script>


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
    