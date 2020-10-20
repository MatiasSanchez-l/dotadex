<?php
require_once ("funciones.php");
require_once ("BaseDeDatosClase.php");

$archivoConfig = "recursos/config.ini";
$configuracion = parse_ini_file($archivoConfig, true);
$conexionBDD = new BaseDeDatosClase($configuracion);

$direccionCarpetaImagenes = "recursos/heroesImg/";

$nombreHeroe = $_POST["nombreHeroe"];
$idHeroe = $_POST["idHeroe"];
$atributoHeroe = $_POST["atributoHeroe"];
$tipoAtaqueHeroe = $_POST["tipoAtaqueHeroe"];
$hitoriaHeroe = $_POST["historiaHeroe"];


if ($_FILES["archivoImagen"]["error"] > 0) {
    header("Location: subirNuevoHeroe.php");
    exit();
} else {
    $nombreDeImagenSubida = $_FILES["archivoImagen"]["name"];

    $nombreDeImagenCambiado = funcionCambiarNombreImagen($nombreDeImagenSubida, $nombreHeroe);

    $destino = $direccionCarpetaImagenes . $nombreDeImagenCambiado;

    move_uploaded_file(
        $_FILES["archivoImagen"]["tmp_name"],
        $destino
    );

    $sql = "INSERT INTO heroes(id, nombre, atributo, tipo_ataque, historia, imagen_url) 
            VALUES (".$idHeroe.",'".$nombreHeroe."','".$atributoHeroe."','".$tipoAtaqueHeroe."','".$hitoriaHeroe."','".$destino."')";

    $conexionBDD->aplicarUnQuery($sql);
    header("Location: index.php?registrarHeroe=true");
    exit();
}
