<?php
require_once("header.php");
require_once ("funciones.php");
if(isset($_SESSION["logeado"]) == 1){
    echo '<h1 class="text-center text-light">AGREGAR HEROE</h1>

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
</form>';
}else{
    echo '<h2 class="text-center text-danger">Debe ser admin para acceder a esta pagina!</h2>
<a class="text-center text-classic" href="index.php"><h4>Ir al Inicio</h4></a>';
}
require_once("footer.php");
?>

