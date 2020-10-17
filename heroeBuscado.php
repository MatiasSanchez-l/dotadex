<?php
require_once ("funciones.php");
require_once ("header.php");
?>
    <main>
        <form class="form-inline justify-content-center my-5">
            <div class="form-group col-sm-10 mb-2">
                <label for="nombreABuscar" class="sr-only">Ingrese nombre del Heroe, atributo o número</label>
                <input type="text" class="form-control" style="width: 100%" id="nombreABuscar" name="nombreABuscar" placeholder="Ingrese nombre del Heroe, atributo o número">
            </div>
            <button type="submit" class="btn btn-azul mb-2">Buscar</button>
        </form>
        <h1 class="text-center text-light ">HEROES</h1>
        <div class="text-center">
            <a href="subirNuevoHeroe.php">
                <button class="btn btn-azul mt-2 col-sm-11">Agregar Heroe</button>
            </a>
        </div>
        <div class="container mt-5 mb-5">
            <div class="row">
                <?php
                $datoABuscar = isset($_GET["nombreABuscar"]) ? $_GET["nombreABuscar"] : null;
                funcionHeroeABuscar($datoABuscar);
                ?>
            </div>
        </div>

    </main>
<?php
require_once ("footer.php");
