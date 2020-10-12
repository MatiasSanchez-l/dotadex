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
                <form class="d-flex justify-content-end">
                    <div class="col-sm-3 my-1 p-2">
                        <label class="sr-only" for="nombreUsuario">Nombre usuario</label>
                        <input type="text" class="form-control" id="nombreUsuario" name="nombreUsuario" placeholder="Nombre usuario">
                    </div>
                    <div class="col-sm-3 my-1 p-2">
                        <label class="sr-only" for="contraseniaUsuario">Contraseña</label>
                        <input type="text" class="form-control" id="contraseniaUsuario" name="contraseniaUsuario" placeholder="Contraseña">
                    </div>
                    <div class="col-auto my-1 p-2">
                        <button type="submit" class="btn btn-verde">INGRESAR</button>
                    </div>
                </form>
            </div>
        </nav>
    </div>
</header>
