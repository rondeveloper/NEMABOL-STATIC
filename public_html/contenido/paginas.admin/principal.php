<?php
/* variable de inicio */
if (isset_get('seccion')) {
    /* manejo de parametros get */
    $get = explode('/', str_replace('.adm', '', get('seccion')));
    for ($cn_ge = count($get); $cn_ge > 0; $cn_ge--) {
        $get[$cn_ge] = $get[$cn_ge - 1];
    }
    if (file_exists('contenido/paginas.admin/subpaginas.admin/' . $get[1] . '.php')) {
        include_once 'contenido/paginas.admin/subpaginas.admin/' . $get[1] . '.php';
    } else {
        include_once 'contenido/paginas.admin/subpaginas.admin/acceso_denegado.php';
    }
} else {
    include_once 'contenido/paginas.admin/inicio.php';
}


