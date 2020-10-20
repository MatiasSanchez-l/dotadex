<?php


class BaseDeDatosClase
{
    private $host;
    private $bddNombre;
    private $usuario;
    private $clave;
    private $conexion;

    public function __Construct($configuracion){

        $this->host = $configuracion["bd"]["host"];
        $this->bddNombre = $configuracion["bd"]["basededatos"];
        $this->usuario = $configuracion["bd"]["usuario"];
        $this->clave = $configuracion["bd"]["password"];

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
            /*echo $this->conexion->errno . " - " . $this->conexion->error ."<br>";
            echo json_encode($resultadoQuery);
            echo "muerte";*/
            header("Location: index.php?errorQuery=true");
            exit();
        }
    }

    public function devolverDatos($tablaAdevolcer){
        $sql = "SELECT * FROM ".$tablaAdevolcer;
        $resultadoQuery = $this->conexion->query($sql);

        $tabla = array();

        while($fila = $resultadoQuery->fetch_assoc()){
            $tabla[]=$fila;
        }
        return $tabla;
    }
}