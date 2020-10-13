<?php
require_once ("funciones.php");



$idHeroe = isset($_POST["idHeroe"]) ? $_POST["idHeroe"] : null;
$nombreHeroe = isset($_POST["nombreHeroe"]) ? $_POST["nombreHeroe"] : null;
$atributoHeroe = isset($_POST["atributoHeroe"]) ? $_POST["atributoHeroe"] : null;
$tipoAtaqueHeroe = isset($_POST["tipoAtaqueHeroe"]) ? $_POST["tipoAtaqueHeroe"] : null;
$idHeroeAModificar = $_POST["botonModificar"];

$catidadDatosACambiar = funcionCantidadDatosACambiar($idHeroe,
                                                    $nombreHeroe,
                                                    $atributoHeroe,
                                                    $tipoAtaqueHeroe);

funcionCambiarDatos($catidadDatosACambiar,
                    $idHeroe,
                    $nombreHeroe,
                    $atributoHeroe,
                    $tipoAtaqueHeroe,
                    $idHeroeAModificar);

if ($_FILES["archivoImagen"]["error"] > 0) {
    header("Location: index.php");
    exit();
} else {
    $conexionBDD = new BaseDeDatosClase();
    $tabla = $conexionBDD->devolverDatos();
    for ($i = 0; $i < sizeof($tabla); $i++) {
        $dirireccion = $tabla[$i]["imagen_url"];
        $idHeroe = $tabla[$i]["id"];
        $nombreHeroe = $tabla[$i]["nombre"];
        if ($idHeroe == $idHeroeAModificar) {
            $nombreDeImagenSubida = $_FILES["archivoImagen"]["name"];

            $nombreDeImagenCambiado = funcionCambiarNombreImagen($nombreDeImagenSubida, $nombreHeroe);

            move_uploaded_file(
                $_FILES["archivoImagen"]["tmp_name"],
                $dirireccion
            );
        }
    }
}
header("Location: index.php");
exit();