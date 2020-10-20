<?php
session_start();
require_once ('BaseDeDatosClase.php');
$archivoConfig = "recursos/config.ini";
$configuracion = parse_ini_file($archivoConfig, true);
$conexionBDD = new BaseDeDatosClase($configuracion);

$nombreUsuarioIngresado = $_POST["nombreUsuarioIngresado"];
$claveUsuarioIngresado = md5($_POST["claveUsuarioIngresado"]);

$tabla = $conexionBDD->devolverDatos("usuario");

$cerrarSeccion = isset($_GET["cerrarSeccion"]) ? $_GET["cerrarSeccion"] : false;

if ($cerrarSeccion){
    session_destroy();
    header("Location: index.php");
    exit();
}

for($i=0; $i < sizeof($tabla); $i++){
    $usuario = $tabla[$i]["usuario"];
    $clave = $tabla[$i]["clave"];
    if($nombreUsuarioIngresado == $usuario and $claveUsuarioIngresado == $clave){
        $_SESSION["logeado"] = 1;
        header("Location: index.php");
        exit();
    }
}

header("Location: index.php?usuarioIncorrecto=true");
exit();





