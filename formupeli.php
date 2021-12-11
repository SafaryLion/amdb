
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("includes/config.php"); ?>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
</head>
<body>
<?php include("includes/cabecera.php"); ?>


<div class="container">
<form name="form" action="peligrabar.php" method="POST">
    
    <?php if (isset($id)) { ?>
        <input type="hidden" name="id" value="<?php echo $id;?>">
    <?php } 
    
    
    
    
        //https://fernando-gaitan.com.ar/aprendiendo-php-parte-19-subir-archivos-al-servidor/

$archivo = (isset($_FILES['imagen'])) ? $_FILES['imagen'] : null;
if ($archivo) {
   $extension = pathinfo($archivo['name'], PATHINFO_EXTENSION);
   $extension = strtolower($extension);
   $extension_correcta = ($extension == 'jpg' or $extension == 'jpeg' or $extension == 'gif' or $extension == 'png');
   if ($extension_correcta) {
      $ruta_destino_archivo = "includes/img/{$archivo['name']}";
      $archivo_ok = move_uploaded_file($archivo['tmp_name'], $ruta_destino_archivo);
   }
}
 if (isset($archivo)): ?>
    <?php if (!$extension_correcta):  echo 'console.log("La extensión es incorrecta, el archivo debe ser jpg, jpeg, gif o png")'?>
      <span style="color: #f00;"> La extensión es incorrecta, el archivo debe ser jpg, jpeg, gif o png. </span> 
    <?php elseif (!$archivo_ok): echo 'console.log("Error al intentar subir el archivo.")'?>
      <span style="color: #f00;"> Error al intentar subir el archivo. </span>
   <?php else: echo 'console.log("El archivo ha sido subido correctamente.")'?>
      <strong> El archivo ha sido subido correctamente. </strong>
      <br />
      <img src="archivos/<?php echo $archivo['name'] ?>" alt="" />
   <?php endif ?>
<?php endif; ?>

    
    
    

    <?php if($accion == 'Guardar'){ ?>
<h1>Añadir una nueva película</h1><br>
<?php }else{ ?>
    <h1>Editar una película</h1><br>
<?php } ?>

      <input placeholder="Título" type="text" name="titulo" size="40" class="form-control" id="exampleFormControlInput1" required value="<?php echo $titulo;?>" /> <br/>
      <input placeholder="Duración (en minutos)" type="text" name="duracion" required value="<?php echo $duracion;?>" class="form-control" /><br/>
    
      <select name="genero[]" class="form-select" required multiple aria-label="multiple select example">
            <option value="0">Seleccione un género/categoría:</option>
            <option value="Ciencia Ficción"<?php if ($genero == 'Ciencia Ficción' ) { echo 'SELECTED';}?>>Ciencia Ficción</option>
            <option value="Aventura"<?php if ($genero == 'Aventura' ) { echo 'SELECTED';}?>>Aventura</option>
            <option value="Acción"<?php if ($genero == 'Acción' ) { echo 'SELECTED';}?>>Acción</option>
            <option value="Suspense"<?php if ($genero == 'Suspense' ) { echo 'SELECTED';}?>>Suspenese</option>
            <option value="Drama"<?php if ($genero == 'Drama' ) { echo 'SELECTED';}?>>Drama</option>
            <option value="Crimen"<?php if ($genero == 'Crimen' ) { echo 'SELECTED';}?>>Crimen</option>
            <option value="Western"<?php if ($genero == 'Western' ) { echo 'SELECTED';}?>>Western</option>
            <option value="Fantasía"<?php if ($genero == 'Fantasía' ) { echo 'SELECTED';}?>>Fantasía</option>
            <option value="Comedia"<?php if ($genero == 'Comedia' ) { echo 'SELECTED';}?>>Comedia</option>
            <option value="Historia"<?php if ($genero == 'Historia' ) { echo 'SELECTED';}?>>Historia</option>
            <option value="Música"<?php if ($genero == 'Música' ) { echo 'SELECTED';}?>>Música</option>
            <option value="Animación"<?php if ($genero == 'Animación' ) { echo 'SELECTED';}?>>Animación</option>
     </select>

     <br>

      <input placeholder="Estatus (A / NA)" type="text" name="estatus" required value="<?php echo $estatus;?>" class="form-control"><br />
      <p>Fecha de Estreno:</p>
      <input placeholder="Fecha de Estreno" type="date" name="fech_estr" size="40" class="form-control" id="exampleFormControlInput1" required value="<?php echo date('Y-m-d', strtotime($fech_estr));?>" >
      <br>
      <input type="file" name="imagen" value="<?php echo $imagen;?>">
      <br><br>
      <textarea placeholder="Sinopsis" name="sinopsis"  class="form-control" id="exampleFormControlTextarea1" rows="3"><?php echo $sinopsis;?></textarea>
      <br>
      <input placeholder="Título Original" type="text" name="tituloOriginal" size="40" class="form-control" id="exampleFormControlInput1"  value="<?php echo $tituloOriginal;?>" /> <br/>
      <br>
      <input placeholder="Productoras" type="text" name="productoras" size="40" class="form-control" id="exampleFormControlInput1"  value="<?php echo $productoras;?>" /> <br/>
      <br>
      <input placeholder="País de origen" type="text" name="paises" size="40" class="form-control" id="exampleFormControlInput1"  value="<?php echo $paises;?>" /> <br/>
      <br>
      <input placeholder="Puntuación" type="text" name="puntuacion" size="40" class="form-control" id="exampleFormControlInput1"  value="<?php echo $puntuacion;?>" /> <br/>
      <br>


<br>
        
<input type="hidden" name="accion" value="<?php echo $accion;?>">
<input type="submit" name="submit" value ="<?php echo $accion; ?>" class="btn btn-primary">

</form>

</div>

<?php include("includes/pie.php"); ?>
</body>