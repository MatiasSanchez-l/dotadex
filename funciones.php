<?php
require_once ("BaseDeDatosClase.php");
function funcionMostrarImagenes(){
    $conexionBDD = new BaseDeDatosClase();
    $tabla = $conexionBDD->devolverDatos();

    /*$dirireccion = 'recursos/heroesImg/';*/
    $archivoExtencion = array(
        'jpg',
        'jpeg',
        'png'
    );

    /*$dir_contenidos = scandir($dirireccion);*/

    for($i = 0; $i<sizeof($tabla); $i++)
    {
        $dirireccion = $tabla[$i]["imagen_url"];
        $nombreHeroe = $tabla[$i]["nombre"];
        $atributoHeroe = $tabla[$i]["atributo"];
        $idHeroe = $tabla[$i]["id"];
        $fuerza= "https://static.wikia.nocookie.net/dota2_gamepedia/images/7/7a/Strength_attribute_symbol.png/revision/latest/scale-to-width-down/30?cb=20180323111829";
        $agilidad = "https://static.wikia.nocookie.net/dota2_gamepedia/images/2/2d/Agility_attribute_symbol.png/revision/latest/scale-to-width-down/30?cb=20180323111717";
        $inteligencia= "https://static.wikia.nocookie.net/dota2_gamepedia/images/5/56/Intelligence_attribute_symbol.png/revision/latest/scale-to-width-down/30?cb=20180323111753";
        switch (strtolower($atributoHeroe)){
            case "fuerza":
                $imagenAtributo= '<img src="'.$fuerza.'" alt="atributo">';
                break;
            case "agilidad":
                $imagenAtributo = '<img src="'.$agilidad.'" alt="atributo">';
                break;
            case "inteligencia":
                $imagenAtributo = '<img src="'.$inteligencia.'" alt="atributo">';
                break;
        }

        echo'<div class="col-md-4 mb-2">
                <img class= "" style="width:100%" src="'. $dirireccion . '" />
                <div class="d-flex justify-content-between align-items-center mx-2">
                    <h3 class="text-light ">'. $nombreHeroe . '</h3>'
                    .$imagenAtributo.
                '</div>
                <div class="text-center">
                    <button class="btn btn-azul">Modificar</button>
                    <button class="btn btn-rojo">Baja</button>
                </div>
             </div>';
    }

   /* foreach ($dir_contenidos as $archivo) {
        $tipoDeArchivo = strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
        $nombreDeLaImagen =  funcionSacarExtencion($archivo);

        if (in_array($tipoDeArchivo, $archivoExtencion) == true) {
            echo'<div class="col-md-4 mb-2">';
            echo '<img class= "" style="width:100%" src="'. $dirireccion . '/'. $archivo. '" />';
            echo '<div class="d-flex justify-content-between align-items-center mx-2">
                    <h3 class="text-light ">'. $nombreDeLaImagen . '</h3>
                    <img src="https://static.wikia.nocookie.net/dota2_gamepedia/images/2/2d/Agility_attribute_symbol.png/revision/latest/scale-to-width-down/30?cb=20180323111717" alt="">
                  </div>';
            echo '<div class="text-center">
                    <button class="btn btn-azul">Modificar</button>
                    <button class="btn btn-rojo">Baja</button>
                  </div>';
            echo '</div>';
        }
    }*/
}

function funcionSacarExtencion($nombreArchivoConExtencion) {
    return substr($nombreArchivoConExtencion, 0, strrpos($nombreArchivoConExtencion, '.'));
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
            header("Location: subirNuevoHeroe.php");
            echo("Error al subir imagen");
            exit();
    }
}

