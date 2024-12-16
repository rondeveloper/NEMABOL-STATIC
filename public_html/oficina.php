<?php
session_start();
include_once 'contenido/configuracion/config.php';
include_once 'contenido/configuracion/funciones.php';
$mysqli = mysqli_connect($hostname,$username,$password,$database);

if (!isset_administrador()) {
    include_once 'contenido/paginas.admin/login.php';
} else {
    include_once 'contenido/paginas.admin/templates.admin/header.php';
    include_once 'contenido/paginas.admin/principal.php';
    include_once 'contenido/paginas.admin/templates.admin/footer.php';
}

