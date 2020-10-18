<?php
require_once("header.php");
require_once ("funciones.php");
?>

<h1 class="text-center text-light">AGREGAR HEROE</h1>

<form class="container" method="POST" ENCTYPE="multipart/form-data" action="subirHeroeScript.php">
    <div class="form-group">
        <label class="text-light" for="idHeroe">ID del Heroe</label>
        <input type="text" class="form-control" id="idHeroe" name="idHeroe" placeholder="1">
    </div>
    <div class="form-group">
        <label class="text-light" for="nombreHeroe">Nombre del Heroe</label>
        <input type="text" class="form-control" id="nombreHeroe" name="nombreHeroe" placeholder="Axe">
    </div>

    <div class="form-row">
        <div class="form-group col-md-6">
            <label class="text-light" for="atributoHeroe">Atributo principal</label>
            <select class="form-control" id="atributoHeroe" name="atributoHeroe">
                <option disabled selected>Tipo de Atributo</option>
                <option value="Agilidad">Agilidad</option>
                <option value="Fuerza">Fuerza</option>
                <option value="Inteligencia">Inteligencia</option>
            </select>
        </div>
        <div class="form-group col-md-6">
            <label class="text-light" for="tipoAtaqueHeroe">Tipo de ataque</label>
            <select class="form-control" id="tipoAtaqueHeroe" name="tipoAtaqueHeroe">
                <option disabled selected>Tipo de Ataque</option>
                <option>Cuerpo a cuerpo</option>
                <option>Distancia</option>
            </select>
        </div>
    </div>
    <div class="form-group">
        <label class="text-light" for="historiaHeroe">Historia</label>
        <textarea class="form-control" id="historiaHeroe" name="historiaHeroe" rows="8"></textarea>
    </div>
    <div class="form-group">
        <label class="text-light" for="archivoImagen">Elegir imagen</label>
        <input type="file" class="form-control-file text-light" id="archivoImagen" name="archivoImagen">
    </div>
    <div class="text-right">
        <button class="btn btn-azul" type="submit">Enviar</button>
    </div>
</form>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>

