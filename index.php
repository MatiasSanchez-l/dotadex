<?php
require_once ("funciones.php");
require_once ("header.php");
?>
<main>
    <form action="heroeBuscado.php" class="form-inline justify-content-center my-5">
        <div class="form-group col-sm-10 mb-2">
            <label for="nombreABuscar" class="sr-only">Ingrese nombre del Heroe, atributo o tipo de ataque</label>
            <input type="text" class="form-control" style="width: 100%" id="nombreABuscar" name="nombreABuscar" placeholder="Ingrese nombre del Heroe, atributo o tipo de ataque">
        </div>
        <button type="submit" class="btn btn-azul mb-2">Buscar</button>
    </form>
    <div class="text-center">
        <?php
            $error = $_GET["errorBuscarPersonaje"];
            if($error){
                echo '<h5 class="text-danger">Error al encontrar Heroe</h5>';
            }
        ?>
    </div>
    <h1 class="text-center text-light ">HEROES</h1>
    <div class="text-center">
        <a href="subirNuevoHeroe.php">
            <button class="btn btn-azul mt-2 col-sm-11">Agregar Heroe</button>
        </a>
    </div>
    <div class="container mt-5 mb-5">
        <div class="row">
            <?php
            funcionMostrarImagenes();
            ?>
        </div>
    </div>
</main>
<?php
require_once ("footer.php");

