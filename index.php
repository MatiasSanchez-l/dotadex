<?php
require_once ("funciones.php");
require_once ("header.php");
?>
<main>
    <form class="form-inline justify-content-center my-5">
        <div class="form-group col-sm-10 mb-2">
            <label for="heroeABuscar" class="sr-only">Ingrese nombre del Heroe, atributo o número</label>
            <input type="password" class="form-control" style="width: 100%" id="heroeABuscar" name="heroeABuscar" placeholder="Ingrese nombre del Heroe, atributo o número">
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
            funcionMostrarImagenes();
            ?>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
            integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>
</main>
<footer>

</footer>
</body>
</html>
