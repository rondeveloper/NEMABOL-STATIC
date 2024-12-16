<?php
if (isset_get('seccion')) {
    $get = explode("/", str_replace(".adm", "", get('seccion')));
    for ($cn_ge = count($get); $cn_ge > 0; $cn_ge--) {
        $get[$cn_ge] = $get[$cn_ge - 1];
    }
}


$url_site = $dominio;
$title_site = 'NEMABOL - Grupo Empresarial Nemabol';
$url_site_image = $dominio.'banner-prin-logotipo.jpg';
if($get[1]=='registro'){
    $url_site_image = $dominio.'contenido/imagenes/images/punto-tigomoney.jpeg';
    $title_site = 'NEMABOL - Registro';
    $url_site = $dominio.'registro.html';
}

?>   
<!DOCTYPE html>
<html lang="es">
    <head>
        
        <meta charset="utf-8" />        
        <title><?php echo $title_site; ?></title>        
        <link rel="shortcut icon" type="image/png" href="contenido/imagenes/images/favicon.png"/>     

        <base href="<?php echo $dominio; ?>" target="_self"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <meta name="language" content="es"/>
        <meta name="robots" content="index,follow"/>
        <meta name="author" content="NEMABOL"/>
        <meta name="category" content="General"/>
        <meta name="rating" content="General"/>
        <meta name="keywords" content="nemabol,infosicoes,cursos,capacitaciones,bolivia"/>
        <meta name="title" content="<?php echo $title_site; ?>" />
        <meta name="description" content="Network Marketing Bolivia"/>

        <meta property="og:url" content="<?php echo $url_site; ?>" />
        <meta property="og:title" content="<?php echo $title_site; ?>" />
        <meta property="og:description" content="Network Marketing Bolivia" />
        <meta property="og:site_name" content="NEMABOL" />
        <meta property="og:image" content="<?php echo $url_site_image; ?>" />

        <link rel="image_src" href="<?php echo $url_site_image; ?>"/>
        
        <!-- Main styles for this application-->
        <link href="contenido/adm/css/style.css" rel="stylesheet">
        <link href="contenido/adm/vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">

        <!-- CoreUI and necessary plugins-->
        <script src="contenido/adm/vendors/@coreui/coreui/js/coreui.bundle.min.js"></script>
        <!--[if IE]><!-->
        <script src="contenido/adm/vendors/@coreui/icons/js/svgxuse.min.js"></script>
        <!--<![endif]-->

        <link href="contenido/adm/vendors/@coreui/icons/css/free.min.css" rel="stylesheet">
        <!-- Jquery -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    </head>
    <body class="c-app">
