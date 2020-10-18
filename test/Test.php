<?php


use PHPUnit\Framework\TestCase;

require_once ("../BaseDeDatosClase.php");
include("../funciones.php");

class Test extends TestCase
{
    public function testProbarConexionABaseDeDatos(){
        $archivoConfig = "../recursos/config.ini";
        $configuracion = parse_ini_file($archivoConfig, true);

        $BDDConexion = new BaseDeDatosClase($configuracion);

        $resultado = $BDDConexion->probarConexion();

        $this->assertEquals("conexion exitosa", $resultado);
    }

    public function  testCambioDeNombreConExtencionJpg(){
        $respuesta = funcionCambiarNombreImagen("robot.jpg", "archivo");
        $this->assertEquals("archivo.jpg",$respuesta);
    }

    public function  testCambioDeNombreConExtencionPng(){
        $respuesta = funcionCambiarNombreImagen("robot.png", "archivo");
        $this->assertEquals("archivo.png",$respuesta);
    }

    public function  testCambioDeNombreConExtencionJpeg(){
        $respuesta = funcionCambiarNombreImagen("robot.jpeg", "archivo");
        $this->assertEquals("archivo.jpeg",$respuesta);
    }
}
