<?php
require_once ('BaseDeDatosClase.php');
echo "ELIMINAR";
$archivoConfig = "recursos/config.ini";
$configuracion = parse_ini_file($archivoConfig, true);
$conexionBDD = new BaseDeDatosClase($configuracion);
$idHeroeAEliminar = $_GET["botonEliminar"];
$tabla = $conexionBDD->devolverDatos();

for($i = 0; $i<sizeof($tabla); $i++)
{
    $dirireccion = $tabla[$i]["imagen_url"];
    $idHeroe = $tabla[$i]["id"];
    if($idHeroe == $idHeroeAEliminar){
        $sql ='DELETE FROM heroes WHERE heroes.id = '.$idHeroeAEliminar;
        $conexionBDD->aplicarUnQuery($sql);
        unlink($dirireccion);
        header("Location: index.php");
        exit();
    }
}
