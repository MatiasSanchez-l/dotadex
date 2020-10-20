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
        <h1 class="text-center text-light ">'.$nombre.'</h1>
        <section class="d-flex justify-content-center">
            <div class="">
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
            </div>
        </section>';
    }
}
?>

<?php
require_once ("footer.php");
