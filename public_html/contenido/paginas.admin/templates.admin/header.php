<?php
if (isset_get('seccion')) {
    $get = explode("/", str_replace(".adm", "", get('seccion')));
    for ($cn_ge = count($get); $cn_ge > 0; $cn_ge--) {
        $get[$cn_ge] = $get[$cn_ge - 1];
    }
}

/* control de administrador */
$id_administrador = administrador('id');
$rqdu1 = query("SELECT nombre FROM administradores WHERE id='$id_administrador' LIMIT 1 ");
$rqdu2 = fetch($rqdu1);
$__admin_nombre = $rqdu2['nombre'];
$__admin_type = 'ADMINISTRADOR';
$__admin_typecod = 1;
$__admin_id_departamento = '3';
?>   
<!DOCTYPE html>
<html lang="es">
    <head>
        <base href="<?php echo $dominio; ?>" target="_self"/>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <meta name="description" content="eco,salud,sistema">
        <meta name="author" content="NEMABOL">
        <meta name="keyword" content="eco,salud,sistema">
        <title>Oficina NEMABOL</title>
        <link rel="icon" type="image/png" href="contenido/imagenes/images/favicon.png">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="theme-color" content="#ffffff">
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

        <style>
            .c-sidebar-minimized .logotipo{
                display: none;
            }
            .c-sidebar-minimized .logotipo-min{
                display: block !important;
            }
        </style>
        <style>
            .card-title{
                font-size: 14pt;
            }
            .btn .c-icon{
                margin: 0px;
            }
            
            .c-sidebar-brand{
                background: #FFF !important;
                border: 1px solid #e5e6e7;
                border-bottom: 0px;
                border-top: 0px;
            }
            .top-data-user{
                background: #d48f18;
                padding: 10px 10px;
                border-bottom: 3px solid white;
            }
        </style>
    </head>
    <body class="c-app">
        <div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
            <div class="c-sidebar-brand d-lg-down-none">
                <img src="contenido/imagenes/images/logotipo.png" class="logotipo" style="width: 100px;"/>
                <img src="contenido/imagenes/images/logotipo_min.png" class="logotipo-min" style="display: none;width: 35px;"/>
            </div>
            <div class="top-data-user">
                <b>Administrador</b>
                <br>
                <?php echo $__admin_nombre; ?>
            </div>
            <?php include_once 'contenido/paginas.admin/items/item.page.menu_principal.php'; ?>
            <button class="c-sidebar-minimizer c-class-toggler" type="button" data-target="_parent" data-class="c-sidebar-minimized"></button>
        </div>
        <div class="c-wrapper c-fixed-components">
            <header class="c-header c-header-light c-header-fixed c-header-with-subheader">
                <button class="c-header-toggler c-class-toggler d-lg-none mfe-auto" type="button" data-target="#sidebar" data-class="c-sidebar-show">
                    <svg class="c-icon c-icon-lg">
                    <use xlink:href="contenido/adm/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button>
                <a class="c-header-brand d-lg-none" href="#">
                    <img src="contenido/imagenes/images/logotipo_v2.png" style="width: 100px;opacity:.5;"/>
                </a>
                <button class="c-header-toggler c-class-toggler mfs-3 d-md-down-none" type="button" data-target="#sidebar" data-class="c-sidebar-lg-show" responsive="true">
                    <svg class="c-icon c-icon-lg">
                    <use xlink:href="contenido/adm/vendors/@coreui/icons/svg/free.svg#cil-menu"></use>
                    </svg>
                </button>
                <ul class="c-header-nav d-md-down-none">
<!--                    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Dashboard</a></li>
                    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Users</a></li>
                    <li class="c-header-nav-item px-3"><a class="c-header-nav-link" href="#">Settings</a></li>-->
                </ul>
                <ul class="c-header-nav ml-auto mr-4">
                    <li class="c-header-nav-item dropdown">
                        <a class="c-header-nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <div class="c-avatar">
                                <img class="c-avatar-img" src="contenido/adm/assets/img/avatars/user-avatar-default.jpg" alt="user@email.com" style="border: 1px solid #d48f18">
                            </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right pt-0">
                            <div class="dropdown-header bg-light py-2"><strong>Cuenta</strong></div>
                            <a class="dropdown-item" href="#">
                                <svg class="c-icon mr-2">
                                <use xlink:href="contenido/adm/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                                </svg> Perfil</a><a class="dropdown-item" href="#">
                                <svg class="c-icon mr-2">
                                <use xlink:href="contenido/adm/vendors/@coreui/icons/svg/free.svg#cil-settings"></use>
                                </svg> Configuraci&oacute;n</a><a class="dropdown-item" href="#">
                                <svg class="c-icon mr-2">
                                <use xlink:href="contenido/adm/vendors/@coreui/icons/svg/free.svg#cil-credit-card"></use>
                                </svg> Pagos<span class="badge badge-secondary ml-auto">42</span></a><a class="dropdown-item" href="#">
                                <svg class="c-icon mr-2">
                                <use xlink:href="contenido/adm/vendors/@coreui/icons/svg/free.svg#cil-file"></use>
                                </svg> Servicios<span class="badge badge-primary ml-auto">42</span></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" onclick="cerrar_sesion();">
                                <svg class="c-icon mr-2">
                                <use xlink:href="contenido/adm/vendors/@coreui/icons/svg/free.svg#cil-account-logout"></use>
                                </svg> Salir
                            </a>
                        </div>
                    </li>
                </ul>
            </header>
            <div class="c-body">
