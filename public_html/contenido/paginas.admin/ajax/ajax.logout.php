<?php
session_start();
include_once '../../configuracion/config.php';
include_once '../../configuracion/funciones.php';
$mysqli = mysqli_connect($hostname,$username,$password,$database);

// Unset all of the session variables.
$_SESSION = array();
session_destroy();
