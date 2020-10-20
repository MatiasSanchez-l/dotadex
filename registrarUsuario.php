<?php
require_once ('BaseDeDatosClase.php');
$archivoConfig = "recursos/config.ini";
$configuracion = parse_ini_file($archivoConfig, true);
$conexionBDD = new BaseDeDatosClase($configuracion);

$nombreUsuario = $_POST["nombreUsuarioRegistrado"];
$claveUsuario = md5($_POST["claveUsuarioRegistrado"]);

$sql = "INSERT INTO usuario(usuario, clave) VALUES ('".$nombreUsuario."','".$claveUsuario."')";
$conexionBDD->aplicarUnQuery($sql);

header("Location: index.php?usuarioRegistrado=true");