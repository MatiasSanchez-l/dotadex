<?php
require_once ("funciones.php");
require_once ("header.php");
$idHeroeAMostrar = $_GET["idHeroeAMostrar"];

$archivoConfig = "recursos/config.ini";
$configuracion = parse_ini_file($archivoConfig, true);
$conexionBDD = new BaseDeDatosClase($configuracion);
$tabla = $conexionBDD->devolverDatos();

for ($i = 0; $i < sizeof($tabla); $i++) {
    $dirireccion = $tabla[$i]["imagen_url"];
    $id= $tabla[$i]["id"];
    $nombre = $tabla[$i]["nombre"];
    $historia = $tabla[$i]["historia"];
    if ($id == $idHeroeAMostrar) {
        echo ' <main>
        <form action="heroeBuscado.php" class="form-inline justify-content-center my-5">
            <div class="form-group col-sm-10 mb-2">
                <label for="nombreABuscar" class="sr-only">Ingrese nombre del Heroe, atributo o tipo de ataque</label>
                <input type="text" class="form-control" style="width: 100%" id="nombreABuscar" name="nombreABuscar" placeholder="Ingrese nombre del Heroe, atributo o tipo de ataque">
            </div>
            <button type="submit" class="btn btn-azul mb-2">Buscar</button>
        </form>
        <h1 class="text-center text-light ">'.$nombre.'</h1>
        <img src="'.$dirireccion.'">
        <div class="container mt-5 mb-5">
            <h3 class="text-light">'.$historia.'</h3>>
        </div>
    </main>';
    }
}
?>

<?php
require_once ("footer.php");
