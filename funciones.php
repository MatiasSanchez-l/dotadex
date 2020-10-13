<?php
require_once ("BaseDeDatosClase.php");
function funcionMostrarImagenes(){
    $conexionBDD = new BaseDeDatosClase();
    $tabla = $conexionBDD->devolverDatos();

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
                <img class= "" style="width:100%" src="'. $dirireccion . '" alt="atributo"/>
                <div class="d-flex justify-content-between align-items-center mx-2">
                    <h3 class="text-light ">'. $nombreHeroe . '</h3>'
                    .$imagenAtributo.
                '</div>
                <div class="text-center">
                    <button type="button" class="btn btn-azul botonModificar" data-toggle="modal" data-target="#modificarHeroeModal" data-id="'.$idHeroe.'">Modificar</button>
                    <button type="button" class="btn btn-rojo botonEliminar" data-toggle="modal" data-target="#eliminarHeroeModal" data-id="'.$idHeroe.'">Eliminar</button> 
                </div>
            </div>';
    }
    echo '<div class="modal fade" id="eliminarHeroeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border: 1px solid #3e4042; background-color:#252627;">
                        <div class="modal-header">
                            <h5 class="modal-title text-light" id="staticBackdropLabel">Eliminar Heroe</h5>
                                <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                        </div>
                        <div class="modal-body text-light">
                            ¿Seguro que desea eliminar el heroe de la base de datos?
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-verde" data-dismiss="modal">Volver</button>
                                <form method="GET" action="eliminarHeroeScript.php">
                                    <button class="btn btn-rojo" id="botonEliminar" name="botonEliminar">Eliminar</button>
                                </form>
                            </div>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="modificarHeroeModal" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content" style="border: 1px solid #3e4042; background-color:#252627;">
                        <div class="modal-header">
                            <h5 class="modal-title text-light" id="staticBackdropLabel">Modificar Heroe</h5>
                            <button type="button" class="close text-light" data-dismiss="modal" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form class="container" method="POST" ENCTYPE="multipart/form-data" action="modificarHeroeScript.php">
                            <div class="modal-body">
                                <div class="form-group">
                                   <label class="text-light" for="idHeroe">ID del Heroe</label>
                                   <input type="text" class="form-control" id="idHeroe" name="idHeroe" placeholder="1">
                                </div>
                                <div class="form-group">
                                    <label class="text-light" for="nombreHeroe">Nombre del Heroe</label>
                                    <input type="text" class="form-control" id="nombreHeroe" name="nombreHeroe" placeholder="Axe">
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label class="text-light" for="atributoHeroe">Atributo principal</label>
                                        <select class="form-control" id="atributoHeroe" name="atributoHeroe">
                                            <option disabled selected>Tipo de Atributo</option>
                                            <option value="Agilidad">Agilidad</option>
                                            <option value="Fuerza">Fuerza</option>
                                            <option value="Inteligencia">Inteligencia</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="text-light" for="tipoAtaqueHeroe">Tipo de ataque</label>
                                        <select class="form-control" id="tipoAtaqueHeroe" name="tipoAtaqueHeroe">
                                            <option disabled selected>Tipo de Ataque</option>
                                            <option>Cuerpo a cuerpo</option>
                                            <option>Distancia</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="text-light" for="archivoImagen">Elegir imagen</label>
                                    <input type="file" class="form-control-file text-light" id="archivoImagen" name="archivoImagen">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-verde" data-dismiss="modal">Volver</button>
                                <button type="submit" class="btn btn-azul" id="botonModificar" name="botonModificar">Modificar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>';
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

function funcionCantidadDatosACambiar($idHeroe, $nombreHeroe,$atributoHeroe, $tipoAtaqueHeroe, $imagenHeroe){
    $cantidadDatos = 0;
    if($idHeroe){
        $cantidadDatos++;
    }
    if($nombreHeroe){
        $cantidadDatos++;
    }
    if($atributoHeroe){
        $cantidadDatos++;
    }
    if($tipoAtaqueHeroe){
        $cantidadDatos++;
    }
    if($imagenHeroe){
        $cantidadDatos++;
    }
    return $cantidadDatos;
}

function funcionCambiarDatos($catidadDatosACambiar, $idHeroe, $nombreHeroe, $atributoHeroe, $tipoAtaqueHeroe, $imagenHeroe,$idHeroeAModificar)
{
    for ($i = 0; $i < $catidadDatosACambiar; $i++) {
        $conexionBDD = new BaseDeDatosClase();
        if ($idHeroe) {
            $sql = 'UPDATE heroes SET id=' . $idHeroe . ' WHERE  heroes.id =' . $idHeroeAModificar;
            $conexionBDD->aplicarUnQuery($sql);
            $idHeroe = null;
        } elseif ($nombreHeroe) {

            $nombreHeroe = null;
        } elseif ($atributoHeroe) {
            $sql = 'UPDATE heroes SET atributo="' . $atributoHeroe . '" WHERE  heroes.id =' . $idHeroeAModificar;
            $conexionBDD->aplicarUnQuery($sql);
            $atributoHeroe = null;
        } elseif ($tipoAtaqueHeroe) {
            $sql = 'UPDATE heroes SET tipo_ataque="' . $tipoAtaqueHeroe . '" WHERE  heroes.id =' . $idHeroeAModificar;
            $conexionBDD->aplicarUnQuery($sql);
            $tipoAtaqueHeroe = null;
        } elseif ($imagenHeroe) {
            $direccionCarpetaImagenes = "recursos/heroesImg/";
            $tabla = $conexionBDD->devolverDatos();

            for ($i = 0; $i < sizeof($tabla); $i++) {
                $dirireccion = $tabla[$i]["imagen_url"];
                $idHeroe = $tabla[$i]["id"];
                $nombreHeroe = $tabla[$i]["nombre"];
                if ($idHeroe == $idHeroeAModificar) {
                    if ($imagenHeroe["error"] > 0) {
                        header("Location: index.php");
                        exit();
                    } else {
                        unlink($dirireccion);
                        $nombreDeImagenSubida = $imagenHeroe["name"];

                        $nombreDeImagenCambiado = funcionCambiarNombreImagen($nombreDeImagenSubida, $nombreHeroe);

                        $destino = $direccionCarpetaImagenes . $nombreDeImagenCambiado;

                        move_uploaded_file(
                            $imagenHeroe["tmp_name"],
                            $destino
                        );
                }
            }
                $imagenHeroe = null;
            }
        }
    }
}
