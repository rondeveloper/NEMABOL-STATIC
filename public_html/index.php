<?php
session_start();
include_once 'contenido/configuracion/config.php';
include_once 'contenido/configuracion/funciones.php';
$mysqli = mysqli_connect($hostname,$username,$password,$database);

include_once 'contenido/paginas/templates/header.php';
include_once 'contenido/paginas/principal.php';
include_once 'contenido/paginas/templates/footer.php';
