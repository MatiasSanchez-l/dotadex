<?php


use PHPUnit\Framework\TestCase;

require_once ("../BaseDeDatosClase.php");
include("../funciones.php");

class Test extends TestCase
{
    public function testProbarConexionABaseDeDatos(){

        $BDDConexion = new BaseDeDatosClase();

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
