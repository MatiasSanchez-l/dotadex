<?php
require_once ("funciones.php");

$idHeroe = isset($_POST["idHeroe"]) ? $_POST["idHeroe"] : null;
$nombreHeroe = isset($_POST["nombreHeroe"]) ? $_POST["nombreHeroe"] : null;
$atributoHeroe = isset($_POST["atributoHeroe"]) ? $_POST["atributoHeroe"] : null;
$tipoAtaqueHeroe = isset($_POST["tipoAtaqueHeroe"]) ? $_POST["tipoAtaqueHeroe"] : null;
$imagenHeroe = isset($_FILES["archivoImagen"]) ? $_FILES["archivoImagen"] : null;
$idHeroeAModificar = $_POST["botonModificar"];

$catidadDatosACambiar = funcionCantidadDatosACambiar($idHeroe,
                                                    $nombreHeroe,
                                                    $atributoHeroe,
                                                    $tipoAtaqueHeroe,
                                                    $imagenHeroe);

funcionCambiarDatos($catidadDatosACambiar,
                    $idHeroe,
                    $nombreHeroe,
                    $atributoHeroe,
                    $tipoAtaqueHeroe,
                    $imagenHeroe,
                    $idHeroeAModificar);
header("Location: index.php");
exit();