<?php

/* principal */
if (isset($dir[1])) {
    if (file_exists('contenido/paginas/subpaginas/' . $dir[1] . '.php')) {
        include_once 'contenido/paginas/subpaginas/' . $dir[1] . '.php';
    } else {
        include_once 'contenido/paginas/inicio.php';
    }
} elseif (isset($get[1])) {
    if (file_exists('contenido/paginas/subpaginas/' . $get[1] . '.php')) {
        include_once 'contenido/paginas/subpaginas/' . $get[1] . '.php';
    } else {
        include_once 'contenido/paginas/inicio.php';
    }
} else {
    include_once 'contenido/paginas/inicio.php';
}

