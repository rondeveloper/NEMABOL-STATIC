<?php 
/* Load Composer's autoloader */
require 'contenido/librerias/phpmailer/vendor/autoload.php';

/* registro de solicitud */
$sw_autentificado = false;
$rqv1 = 0;
$id_solicitud = $get[2];
$hash = $get[3];
if($hash==md5(md5($id_solicitud.'nem212'))){
    $sw_enviar_correo = false;
    $rqves1 = query("SELECT estado FROM solicitudes_afiliacion WHERE id='$id_solicitud' ORDER BY id DESC limit 1 ");
    $rqves2 = fetch($rqves1);
    if($rqves2['estado']=='1'){
        query("UPDATE solicitudes_afiliacion SET estado='2' WHERE id='$id_solicitud' ORDER BY id DESC limit 1 ");
        /* envio de correo */
        $bodyEmail = '<p>Se ha registrado una solicitud de afiliaci&oacute;n en el sistema, el cual el correo ha sido autentificado por el solicitante.</p>';
        $bodyEmail .= '<div style="text-align: center;padding: 25px 0px;">';
        $bodyEmail .= '<b>SOLICITUD RS00'.$id_solicitud.'</b>';
        $bodyEmail .= '</div>';
        $bodyEmail .= '<hr>';
        $bodyEmail .= '<p>Saludos cordiales<br>NEMABOL</p>';
        $tituloEmail = 'SOLUCITUD AUTENTIFICADA';
        $correo_admin = 'info@nemabol.com';
        $contenido_correo = platillaEmailUno($bodyEmail,$tituloEmail,$correo_admin,urlUnsubscribe($correo_admin),'Usuario');
        $codigo_solicitud = 1;
        $asunto = "Solicitud de afiliación registrada - SOLICITUD RS00".$id_solicitud;
        SISTsendEmail($correo_admin, $asunto, $contenido_correo);
        SISTsendEmail("brayan.desteco@gmail.com", $asunto, $contenido_correo);
    }
    $sw_autentificado = true;
}
?>
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


<div class="c-sidebar c-sidebar-dark c-sidebar-fixed c-sidebar-lg-show" id="sidebar">
    <div class="c-sidebar-brand d-lg-down-none">
        <img src="contenido/imagenes/images/logotipo.png" class="logotipo" style="width: 100px;"/>
        <img src="contenido/imagenes/images/logotipo_min.png" class="logotipo-min" style="display: none;width: 35px;"/>
    </div>
    <div class="top-data-user text-center">
        <b>Network Marketing Bolivia</b>
    </div>
    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-title">AFILIACI&Oacute;N</li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
                <svg class="c-sidebar-nav-icon">
                <use xlink:href="contenido/adm/vendors/@coreui/icons/svg/free.svg#cil-puzzle"></use>
                </svg> SOLICITUDES
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="registro.html"><span class="c-sidebar-nav-icon"></span> Solicitar afiliaci&oacute;n</a>
                </li>
            </ul>
        </li>
        <li class="c-sidebar-nav-item c-sidebar-nav-dropdown">
            <a class="c-sidebar-nav-link c-sidebar-nav-dropdown-toggle">
                <svg class="c-sidebar-nav-icon">
                <use xlink:href="contenido/adm/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                </svg> CUENTA
            </a>
            <ul class="c-sidebar-nav-dropdown-items">
                <li class="c-sidebar-nav-item">
                    <a class="c-sidebar-nav-link" href="oficina"><span class="c-sidebar-nav-icon"></span> Ingresar a mi cuenta</a>
                </li>
            </ul>
        </li>
    </ul>

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
            <img src="contenido/imagenes/images/logotipo.png" style="width: 100px;opacity:.5;"/>
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
                    <a class="dropdown-item">
                        <svg class="c-icon mr-2">
                        <use xlink:href="contenido/adm/vendors/@coreui/icons/svg/free.svg#cil-user"></use>
                        </svg> Sin cuenta
                    </a>
                </div>
            </li>
        </ul>
    </header>
    <div class="c-body">
        <div class="c-subheader px-3">
            <!-- Breadcrumb-->
            <ol class="breadcrumb border-0 m-0">
                <li class="breadcrumb-item"><a href="<?php echo $dominio; ?>">NEMABOL</a></li>
                <li class="breadcrumb-item active">Solicitud de afiliaci&oacute;n</li>
                <!-- Breadcrumb Menu-->
            </ol>
        </div>
        <main class="c-main">
            <div class="container-fluid">
                <div class="fade-in">

                    <!-- /.row-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">SOLICITUD DE AFILIACI&Oacute;N A OFICINAS DE REGISTRO</div>
                                <div class="card-body">

                                    <?php
                                    if ($sw_autentificado) {
                                        ?>
                                        <div class="alert alert-success">
                                            <strong>CORREO AUTENTIFICADO CORRECTAMENTE</strong>
                                            <br>
                                            Felicidades su correo ha sido autentificado correctamente.
                                        </div>
                                        <hr>
                                        <p>Su solicitud ahora pasar&aacute; a un proceso de revisi&oacute;n y aprobaci&oacute;n por parte de uno de nuestros administradores.</p>
                                        <div class="text-center">
                                            Siguiente paso:
                                            <br>
                                            <br>
                                            <b style="border: 1px solid gray;padding: 10px;border-radius: 5px;">PRONTO NOS COMUNICAREMOS CON USTED</b>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="alert alert-danger">
                                            <strong>ERROR</strong>
                                            <br>
                                            Los parametros son incorrectos.
                                        </div>
                                        <hr>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <?php
                                    }
                                    ?>


                                </div>
                            </div>
                        </div>
                        <!-- /.col-->
                    </div>
                    <!-- /.row-->
                </div>
            </div>
        </main>




        <!-- Plugins and scripts required by this view-->
        <script src="contenido/adm/js/main.js"></script>

        <!-- MODAL_LARGE -->
        <div class="modal fade" id="MODAL_LARGE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="MODAL_LARGE__title"></h4>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
                    </div>
                    <div class="modal-body">
                        <div id="MODAL_LARGE__body"></div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                        <!--   <button class="btn btn-primary" type="button">Save changes</button>-->
                    </div>
                </div>
            </div>
        </div>


        <footer class="c-footer">
            <div><a href="">OFICINA</a> &reg; 2020</div>
            <div class="ml-auto">Creado por &nbsp;<a href="">NEMABOL</a></div>
        </footer>
    </div>
</div>
