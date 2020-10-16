<?php


class BaseDeDatosClase
{
    private $host;
    private $bddNombre;
    private $usuario;
    private $clave;
    private $conexion;

    public function __Construct(){
        $this->host = "localhost:3307";
        $this->bddNombre = "dotadex-sanchez-matias";
        $this->usuario = "root";
        $this->clave = null;

        $this->conexion = new mysqli($this->host,$this->usuario,$this->clave,$this->bddNombre);
    }

    public function probarConexion(){

        if($this->conexion->connect_error){
            $resultado = "ha ocurrido un error";
            echo "ha ocurrido un error";
        }else{
            $resultado = "conexion exitosa";
            echo "conexion exitosa";
        }
        return $resultado;
    }

    public function aplicarUnQuery($sql){
        $resultadoQuery = $this->conexion->query($sql);
        if($resultadoQuery){
            $this->conexion->query($sql);
        }else{
            echo $this->conexion->errno . " - " . $this->conexion->error ."<br>";
            echo json_encode($resultadoQuery);
            echo "muerte";
            die;
        }
    }

    public function devolverDatos(){
        $sql = "SELECT * FROM heroes";
        $resultadoQuery = $this->conexion->query($sql);

        $tabla = array();

        while($fila = $resultadoQuery->fetch_assoc()){
            $tabla[]=$fila;
        }
        return $tabla;
    }

   /* public function conectar(){
        return mysqli_connect($this->host,
            $this->usuario,
            $this->pass,
            "visitas",
            $this->puerto);
    }*/
}