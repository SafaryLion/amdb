<form action="respuesta.php" method="post">

<div class="container" id="form_contacto">

<div class="mb-3">
    <input placeholder="Nombre" type="text" name="nombre" size="40" class="form-control" id="exampleFormControlInput1" required>
</div>

<div class="mb-3">
    <input placeholder="Email" type="email" name="email" size="40" class="form-control" id="exampleFormControlInput1" required>
</div>

<div class="mb-3">
    <input placeholder="Año de nacimiento" type="number" name="nacido" min="1900" class="form-control" required>
</div>

<p>Sexo</p>

<div class="btn-group" role="group" aria-label="Basic radio toggle button group" >

  <input type="radio" class="btn-check" name="btnradio" id="btnradio1" autocomplete="off" name="hm" value="Hombre" required>
  <label class="btn btn-outline-primary" for="btnradio1">Hombre</label>

  <input type="radio" class="btn-check" name="btnradio" id="btnradio2" autocomplete="off" name="hm" value="Mujer" required>
  <label class="btn btn-outline-danger" for="btnradio2">Mujer</label>

</div>
<br>
<br>

<div class="input-group">
  <span class="input-group-text">Mensaje</span>
  <textarea class="form-control" aria-label="With textarea" name="observacion"></textarea>
</div>
<br>

<input class="btn btn-primary" type="submit" value="Enviar"></input>
<input class="btn btn-danger" id="reset" type="reset" value="Borrar"></input>
<br>
<br>
<br>
<br>
<br>
<br>
</div>
</form>