<?php
include('includes/usuarioconexion.php');

include('includes/config.php');

$id=0;

if (isset($_REQUEST['id'])) {$id=$_REQUEST['id'];}
$accion = $_REQUEST['accion'];
$titulo = $_REQUEST['titulo'];
$duracion = $_REQUEST['duracion'];
$genero = $_REQUEST['genero'];

$sinopsis = $_REQUEST['sinopsis'];
$tituloOriginal = $_REQUEST['tituloOriginal'];
$paises = $_REQUEST['paises'];
$puntuacion = $_REQUEST['puntuacion'];
$productoras = $_REQUEST['productoras'];




$generos="";

for ($i=0;$i<count($genero);$i++)    
{     
    $generos = $generos . $genero[$i];

        $generos = $generos . " ";

} 
echo $generos;

$estatus = $_REQUEST['estatus'];
$fecha_estr = $_REQUEST['fech_estr'];
$imagen = 'includes/img/'.$_REQUEST["imagen"];

if($imagen == 'includes/img/'){
    $imagen = 'includes/img/noimage.png';
}

 





        $insertar = true;

        if($accion == 'Guardar'){
        //verificar usuario no repetido
        $sql = "SELECT * FROM peliculas WHERE id = '$id'";
        foreach ($mbd->query($sql) as $filas) {

            if($filas['titulo'] == $titulo){
                echo 'La película ya existe :(';
                $insertar = false;
            }
        }

    }        
            //verificar campos vacios

        if($titulo == "" or $duracion == "" or $generos == "" or $estatus == "" or $fecha_estr == ""){
            echo 'Por favor, complete todos los campos';
            $insertar = false;
        }

        /////////////////////////////////////////////////////////////////////
///////////////////////////////////// Aquí me quedé //////////////////////////////////////
        ////////////////////////////////////////////////////////////////////

if($insertar == true){

                try {
                    if($insertar == true){
                    include("includes/usuarioconexion.php");
                    if ($accion=='Guardar') {
                        //$query = 'INSERT INTO usuarios (nombre,apellidos,login,password,email,tipo, genero, usuario, telefono, fecha_nacimiento) values (:nombre,:apellidos,:login,:password,:email,:tipo,:genero,:usuario,:telefono,:fecha_nac)' ;
                        $query = "INSERT INTO peliculas (titulo,duracion,genero,activa,fecha, imagen, sinopsis, tituloOriginal, pais, puntuacion, productoras) values ('$titulo','$duracion','$generos','$estatus','$fecha_estr', '$imagen','$sinopsis','$tituloOriginal','$paises','$puntuacion', '$productoras')" ;
                        echo $query;
                        echo "insertando";
                    } else {
                        $query = 'UPDATE peliculas SET titulo=:titulo, duracion=:duracion, genero=:genero, activa=:estatus,fecha=:fecha,imagen=:imagen, sinopsis=:sinopsis, tituloOriginal=:tituloOriginal, productoras=:productoras, pais=:paises, puntuacion=:puntuacion WHERE id=:id';
                    }
                    
                    // $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario'";
                    $resultado = $mbd->prepare($query);
                
                    // ejecuto la preparacion de la query
                
                   
                    $resultado ->bindValue(":titulo",$titulo);
                    $resultado ->bindValue(":duracion",$duracion);
                    $resultado ->bindValue(":genero",$generos);
                    $resultado ->bindValue(":estatus",$estatus);
                    $resultado ->bindValue(":fecha",$fecha_estr);
                    $resultado ->bindValue(":imagen",$imagen);
                    $resultado ->bindValue(":sinopsis",$sinopsis);
                    $resultado ->bindValue(":tituloOriginal",$tituloOriginal);
                    $resultado ->bindValue(":paises",$paises);
                    $resultado ->bindValue(":puntuacion",$puntuacion);
                    $resultado ->bindValue(":productoras",$productoras);


                    

                
                }else{
                    echo 'fail';
                }
                    if ($accion <> 'Guardar') { 
                        $resultado ->bindvalue(":id",$id);
                        echo 'entro modifcar' . $id;
                    }
                    $Exec = $resultado -> execute();
                    
                    $arr = $resultado->errorInfo();
                    print_r($arr);
                
                    $mbd = null; // cerrar conexion
                
                } catch (PDOException $e) {
                    print "¡Error!: " . $e->getMessage() . "<br/>";
                    die();
                }
}


try {
    
    include("includes/usuarioconexion.php");
    
    if ($accion <> 'Guardar') { 

        $query = 'UPDATE peliculas SET titulo=:titulo, duracion=:duracion, genero=:genero, activa=:estatus,fecha=:fecha, imagen=:imagen, sinopsis=:sinopsis, tituloOriginal=:tituloOriginal,productoras=:productoras, pais=:paises, puntuacion=:puntuacion WHERE id=:id';

        $resultado = $mbd->prepare($query);

        $resultado ->bindvalue(":id",$id);
        echo 'entro modifcar' . $id;                    
        
        // ejecuto la preparacion de la query
                
        $resultado ->bindValue(":titulo",$titulo);
        $resultado ->bindValue(":duracion",$duracion);
        $resultado ->bindValue(":genero",$generos);
        $resultado ->bindValue(":estatus",$estatus);
        $resultado ->bindValue(":fecha",$fecha_estr);
        $resultado ->bindValue(":imagen",$imagen);
        $resultado ->bindValue(":sinopsis",$sinopsis);
        $resultado ->bindValue(":tituloOriginal",$tituloOriginal);
        $resultado ->bindValue(":paises",$paises);
        $resultado ->bindValue(":puntuacion",$puntuacion);
        $resultado ->bindValue(":productoras",$productoras);

    
    $Exec = $resultado -> execute();
    

    $mbd = null; // cerrar conexion
    }
                


} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
        

if($insertar == true){
    header('Location: listado.php');
}
?> 

