<?php
//session_start();

function renderHeader($pageTitle){
    echo '
<!DOCTYPE html>
<html lang="es">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--    <link rel="shortcut icon" type="image/png" href="images/favicon.png"/>-->
    <link rel="stylesheet" href="../style/all.css">
    <link href="https://fonts.googleapis.com/css?family=Lexend+Deca&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css"
          integrity="sha384-KA6wR/X5RY4zFAHpv/CnoG2UW1uogYfdnP67Uv7eULvTveboZJg0qUpmJZb5VqzN" crossorigin="anonymous">
    <title>Mi Flota - '.$pageTitle.'</title>
</head>
<body>
<nav class="navbar navbar-dark bg-dark navbar-expand-lg">
    <a class="navbar-brand" href="#">Mi Flota</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse " id="navbarText">
        <span class="navbar-text mr-auto">
      Lleva registro del uso de tu auto
    </span>
        <ul class="navbar-nav  ">
            <li class="nav-item">
                <a class="nav-link" href="vehicle-config.php">Agregar vehículo</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="vehicle-ride.html">Registrar Recorrido</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="../index.php">Cerrar sesión</a>
            </li>
        </ul>

    </div>
</nav>';
}