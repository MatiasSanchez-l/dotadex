<!doctype html>
<html lang="es">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="recursos/css/estilos.css"/>
    <title>DOTADEX</title>
</head>
<body>
<header>
    <div class="container-fluid px-0">
        <nav class="navbar navbar-expand-lg navbar-dark bg-black py-0 px-0">
            <a class="navbar-brand" href="index.php"><strong><i class="logo-header">DOTADEX</i></strong></a>
            <button class="navbar-toggler mr-3" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span
                    class="navbar-toggler-icon"></span></button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <?php
                session_start();
                if(isset($_SESSION["logeado"]) == 1){
                    echo '<a class="col-auto my-1 p-2" href="seccion.php?cerrarSeccion=true">
                            <button class="btn btn-rojo">Cerrar seccion</button>
                          </a>';
                }else{
                    echo'<div class="d-flex justify-content-end">
                            <div class="col-sm-auto my-1 p-2">
                                <button type="button" class="btn btn-azul" data-toggle="modal" data-target="#ingresarUsuarioModal">Ingresar</button>
                            </div>
                            <div class="col-auto my-1 p-2">
                                <button type="button" class="btn btn-verde" data-toggle="modal" data-target="#registrarUsuarioModal">Registrarse</button>
                            </div>
                         </div>';
                    include_once ('recursos/html/usuarioModal.html');
                }?>

            </div>
        </nav>
    </div>
</header>
<main>
    <form action="heroeBuscado.php" class="form-inline justify-content-center my-4">
        <div class="form-group col-sm-10">
            <label for="nombreABuscar" class="sr-only">Ingrese nombre del Heroe, atributo o tipo de ataque</label>
            <input type="text" class="form-control" style="width: 100%" id="nombreABuscar" name="nombreABuscar" placeholder="Ingrese nombre del Heroe, atributo o tipo de ataque">
        </div>
        <button type="submit" class="btn btn-azul">Buscar</button>
    </form>
