<?php
require_once ("funciones.php");
require_once ("header.php");
$idHeroeAMostrar = $_GET["idHeroeAMostrar"];

$archivoConfig = "recursos/config.ini";
$configuracion = parse_ini_file($archivoConfig, true);
$conexionBDD = new BaseDeDatosClase($configuracion);
$tabla = $conexionBDD->devolverDatos("heroes");

$fuerza= "https://static.wikia.nocookie.net/dota2_gamepedia/images/7/7a/Strength_attribute_symbol.png/revision/latest/scale-to-width-down/30?cb=20180323111829";
$agilidad = "https://static.wikia.nocookie.net/dota2_gamepedia/images/2/2d/Agility_attribute_symbol.png/revision/latest/scale-to-width-down/30?cb=20180323111717";
$inteligencia= "https://static.wikia.nocookie.net/dota2_gamepedia/images/5/56/Intelligence_attribute_symbol.png/revision/latest/scale-to-width-down/30?cb=20180323111753";

for ($i = 0; $i < sizeof($tabla); $i++) {
    $dirireccion = $tabla[$i]["imagen_url"];
    $id= $tabla[$i]["id"];
    $nombre = $tabla[$i]["nombre"];
    $historia = $tabla[$i]["historia"];
    $atributo = $tabla[$i]["atributo"];
    $ataque = $tabla[$i]["tipo_ataque"];

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

    if ($id == $idHeroeAMostrar) {
        echo ' 
        <h1 class="text-center text-light ">HEROE</h1>
        <section class="d-flex justify-content-center">
            <div class="card shadow-lg" style="max-width: 900px; background-color: #1b1c1d;">
                <div class="row no-gutters">
                    <div class="col-md-4"><img src="'.$dirireccion.'" class="card-img-top" alt="heroe">
                        <div class="card-body">
                            <h3 class="card-title text-light text-center">'.$nombre.'</h3>
                            <ul class="list-group list-group-flush ">
                                <li class="list-group-item d-flex justify-content-around" style="background-color: #252627;"><h5 class="text-light">Atributo:</h5>'.$imagenAtributo.'</li>
                                <li class="list-group-item text-center text-light" style="background-color: #252627;"><h5>Tipo de ataque:</h5> '.$ataque.'</li>
                            </ul>
                            <div class="text-center my-2" style="background-color: #252627;">
                                <a href="http://www.dota2.com/hero/'.strtolower($nombre).'/" class="card-link ">Más información</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 p-2 ">
                        <p class="card-text"><blockquote class="text-light">'.$historia.'</blockquote></p>
                    </div>
                </div>
            </div>
                
            <!--<div class="">
                <img src="'.$dirireccion.'">
            </div>
            <div>
                <p class="text-light">Atributo: '.$imagenAtributo.'</p>
                <p class="text-light"> Tipo de ataque: '.$ataque.'</p>
            </div>
        </section>
        <section>
            <div class="container mt-5 mb-5">
                <h3 class="text-light">'.$historia.'</h3>>
            </div>-->
        </section>';
    }
}
?>

<?php
require_once ("footer.php");
