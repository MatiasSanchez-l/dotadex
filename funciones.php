<?php
require_once ("BaseDeDatosClase.php");

function funcionMostrarImagenes(){
    $archivoConfig = "recursos/config.ini";
    $configuracion = parse_ini_file($archivoConfig, true);
    $conexionBDD = new BaseDeDatosClase($configuracion);
    $tabla = $conexionBDD->devolverDatos("heroes");

    for($i = 0; $i<sizeof($tabla); $i++)
    {
        $direccion = $tabla[$i]["imagen_url"];
        $nombreHeroe = $tabla[$i]["nombre"];
        $atributoHeroe = $tabla[$i]["atributo"];
        $idHeroe = $tabla[$i]["id"];

        funcionHtmlImagenes($idHeroe,$direccion,$nombreHeroe,$atributoHeroe);
    }
    echo require_once ('recursos/html/modalHtml.html');
}

function funcionHtmlImagenes($id, $direccion, $nombre, $atributo){
    $fuerza= "https://static.wikia.nocookie.net/dota2_gamepedia/images/7/7a/Strength_attribute_symbol.png/revision/latest/scale-to-width-down/30?cb=20180323111829";
    $agilidad = "https://static.wikia.nocookie.net/dota2_gamepedia/images/2/2d/Agility_attribute_symbol.png/revision/latest/scale-to-width-down/30?cb=20180323111717";
    $inteligencia= "https://static.wikia.nocookie.net/dota2_gamepedia/images/5/56/Intelligence_attribute_symbol.png/revision/latest/scale-to-width-down/30?cb=20180323111753";
    switch (strtolower($atributo)){
        case "fuerza":
            $imagenAtributo= '<img src="'.$fuerza.'" title="fuerza" alt="atributo">';
            break;
        case "agilidad":
            $imagenAtributo = '<img src="'.$agilidad.'" title="agilidad" alt="atributo">';
            break;
        case "inteligencia":
            $imagenAtributo = '<img src="'.$inteligencia.'" title="inteligencia" alt="atributo">';
            break;
    }


    echo'<div class="col-md-4 mb-2">
                <a href="detalleHeroe.php?idHeroeAMostrar='.$id.'">
                    <img style="width:100%; max-height: 10.2em;" src="'. $direccion . '" alt="heroe"/>
                </a>
                <div class="d-flex justify-content-between align-items-center my-2">
                    <h4 class="text-light ">'. $nombre . '</h4>' .$imagenAtributo. '
                </div>';
    if(isset($_SESSION["logeado"]) == 1){
        echo'<div class="text-center">
                <button type="button" class="btn btn-azul botonModificar" data-toggle="modal" data-target="#modificarHeroeModal" data-id="' . $id . '">Modificar</button>
                <button type="button" class="btn btn-rojo botonEliminar" data-toggle="modal" data-target="#eliminarHeroeModal" data-id="' . $id . '">Eliminar</button>
             </div>
           </div>';
    }else{
        echo '</div>';
    }
}

function funcionCambiarNombreImagen($nombreDeImagenSubida , $nombreDeImagenDeseado){
    $imagenTipoArchivo = strtolower(pathinfo($nombreDeImagenSubida,PATHINFO_EXTENSION));
    switch ($imagenTipoArchivo){
        case "jpg":
            return $nombreDeseadoDeLaImagen = $nombreDeImagenDeseado . ".jpg";
            break;
        case "png":
            return $nombreDeseadoDeLaImagen = $nombreDeImagenDeseado . ".png";
            break;
        case "jpeg":
            return $nombreDeseadoDeLaImagen = $nombreDeImagenDeseado . ".jpeg";
            break;
        default:
            echo("Error al subir imagen");
            exit();
    }
}

function funcionModificarDatos($idHeroe,
                               $nombreHeroe,
                               $atributoHeroe,
                               $tipoAtaqueHeroe,
                               $historiaHeroe,
                               $idHeroeAModificar){
    $archivoConfig = "recursos/config.ini";
    $configuracion = parse_ini_file($archivoConfig, true);
    $conexionBDD = new BaseDeDatosClase($configuracion);
    $tabla = $conexionBDD->devolverDatos("heroes");

    for ($i = 0; $i < sizeof($tabla); $i++) {
        $dirireccion = $tabla[$i]["imagen_url"];
        $id= $tabla[$i]["id"];
        $nombre = $tabla[$i]["nombre"];
        if ($id == $idHeroeAModificar and $nombreHeroe != $nombre) {
            $img_url =$dirireccion;

            $sql1 = 'UPDATE heroes SET nombre="' . $nombreHeroe . '" WHERE  heroes.id =' . $idHeroeAModificar;
            $conexionBDD->aplicarUnQuery($sql1);

            $extensionImagen = strtolower(pathinfo($img_url,PATHINFO_EXTENSION));
            $nuevoNombreConUrl = 'recursos/heroesImg/'.$nombreHeroe .'.'. $extensionImagen;

            $sql2 = 'UPDATE heroes SET imagen_url="' . $nuevoNombreConUrl . '" WHERE  heroes.id =' . $idHeroeAModificar;
            $conexionBDD->aplicarUnQuery($sql2);

            rename($img_url, $nuevoNombreConUrl);
        }
    }


    $sql = 'UPDATE heroes SET id=' . $idHeroe . ',
                atributo="' . $atributoHeroe . '",
                tipo_ataque="' . $tipoAtaqueHeroe . '",
                historia="' . $historiaHeroe . '"
                WHERE heroes.id =' . $idHeroeAModificar;
    $conexionBDD->aplicarUnQuery($sql);
}

function funcionHeroeABuscar($datoABuscar){
    if(empty($datoABuscar)){
        header('Location: index.php?errorBuscarPersonaje=true');
        die();
    }else{
        $archivoConfig = "recursos/config.ini";
        $configuracion = parse_ini_file($archivoConfig, true);
        $conexionBDD = new BaseDeDatosClase($configuracion);
        $tabla = $conexionBDD->devolverDatos("heroes");

        $mostrarTodosLosHeroes = true;


        for ($i = 0; $i < sizeof($tabla); $i++) {
            $direccion = $tabla[$i]["imagen_url"];
            $id = $tabla[$i]["id"];
            $nombre = $tabla[$i]["nombre"];
            $atributo = $tabla[$i]["atributo"];
            $tipoAtaque = $tabla[$i]["tipo_ataque"];
            if (strtolower($datoABuscar) == strtolower($nombre)) {

                funcionHtmlImagenes($id,$direccion,$nombre,$atributo);

                $mostrarTodosLosHeroes= false;
            }elseif (strtolower($datoABuscar) == strtolower($atributo)){

                funcionHtmlImagenes($id,$direccion,$nombre,$atributo);

                $mostrarTodosLosHeroes= false;
            }elseif(strtolower($datoABuscar) == strtolower($tipoAtaque)){

                funcionHtmlImagenes($id,$direccion,$nombre,$atributo);

                $mostrarTodosLosHeroes= false;
            }
        }

        if($mostrarTodosLosHeroes){
            header('Location: index.php?errorBuscarHeroe=true');
            exit();
        }else{
            echo require_once ('recursos/html/modalHtml.html');
        }
    }


}

