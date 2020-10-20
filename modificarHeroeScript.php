<?php
require_once ("funciones.php");

$archivoConfig = "recursos/config.ini";
$configuracion = parse_ini_file($archivoConfig, true);
$conexionBDD = new BaseDeDatosClase($configuracion);
$tabla = $conexionBDD->devolverDatos("heroes");

$idHeroeAModificar = $_POST["botonModificar"];

for ($i = 0; $i < sizeof($tabla); $i++) {
    $dirireccion = $tabla[$i]["imagen_url"];
    $id = $tabla[$i]["id"];
    $nombre = $tabla[$i]["nombre"];
    $atributo = $tabla[$i]["atributo"];
    $tipoAtaque = $tabla[$i]["tipo_ataque"];
    $historia = $tabla[$i]["historia"];
    if ($id == $idHeroeAModificar) {
        $idHeroe = empty($_POST["idHeroe"]) ? $id : $_POST["idHeroe"];
        $nombreHeroe = empty($_POST["nombreHeroe"]) ?  $nombre : $_POST["nombreHeroe"];
        $atributoHeroe = isset($_POST["atributoHeroe"]) ? $_POST["atributoHeroe"] : $atributo;
        $tipoAtaqueHeroe = isset($_POST["tipoAtaqueHeroe"]) ? $_POST["tipoAtaqueHeroe"] : $tipoAtaque;
        $historiaHeroe = isset($_POST["historiaHeroe"]) ? $_POST["historiaHeroe"] : $historia;

        funcionModificarDatos($idHeroe, $nombreHeroe, $atributoHeroe, $tipoAtaqueHeroe, $historiaHeroe, $idHeroeAModificar);
    }
}

if ($_FILES["archivoImagen"]["error"] > 0) {
    header("Location: index.php?modificarHeroe=true");
    exit();
} else {
    $conexionBDD2 = new BaseDeDatosClase($configuracion);
    $tabla2 = $conexionBDD2->devolverDatos("heroes");
    for ($i = 0; $i < sizeof($tabla2); $i++) {
        $dirireccion = $tabla2[$i]["imagen_url"];
        $id= $tabla2[$i]["id"];
        $nombre = $tabla2[$i]["nombre"];
        if ($id == $idHeroeAModificar) {

            move_uploaded_file(
                $_FILES["archivoImagen"]["tmp_name"],
                $dirireccion
            );
        }
    }
}
header("Location: index.php?modificarHeroe=true");
exit();