<?php 
/* Load Composer's autoloader */
require 'contenido/librerias/phpmailer/vendor/autoload.php';

/* registro de solicitud */
$sw_registro_procesado = false;
if(isset_post('procesar-formulario')){
    /* Se carga la clase de redimencion de imagen */
    require_once ("contenido/librerias/classes/Thumbnail.php");
    
    $id_tipo_punto = post('id_tipo_punto');
    $nombre = post('nombre');
    $nit = post('nit');
    $direccion = post('direccion');
    $correo_registro = post('correo');
    $celular = post('celular');
    $foto_negocio_1 = post('foto_negocio_1');
    $foto_negocio_2 = post('foto_negocio_2');
    $foto_negocio_3 = post('foto_negocio_3');
    $foto_nit = post('foto_nit');
    $id_departamento = post('id_departamento');
    
    $sw_internet_disponible = 0;
    if(isset_post('internet_disponible')){
        $sw_internet_disponible = 1;
    }
    $sw_impresora_disponible = 0;
    if(isset_post('impresora_disponible')){
        $sw_impresora_disponible = 1;
    }
    
    query("INSERT INTO solicitudes_afiliacion (
    id_tipo_punto, 
    id_departamento, 
    nombre,
    nit, 
    direccion, 
    correo, 
    celular, 
    sw_internet_disponible, 
    sw_impresora_disponible, 
    estado
    ) VALUES (
    '$id_tipo_punto',
    '$id_departamento',
    '$nombre',
    '$nit',
    '$direccion',
    '$correo_registro',
    '$celular',
    '$sw_internet_disponible',
    '$sw_impresora_disponible',
    '1'
    )");
    $id_solicitud_afiliacion = insert_id();
    
    /* foto negocio 1 */
    $name_arch = 'foto_negocio_1';
    if (is_uploaded_file($_FILES[$name_arch]['tmp_name'])) {
        $archivo_name = $_FILES[$name_arch]['name'];
        $archivo_type = $_FILES[$name_arch]['type'];
        $archivo_tmp_name = $_FILES[$name_arch]['tmp_name'];
        $archivo_size = $_FILES[$name_arch]['size'];
        $arext1 = explode('.', $archivo_name);
        $archivo_extension = strtolower($arext1[count($arext1) - 1]);
        $archivo_new_name = "deposito-" . date("ymd") . "-" . rand(99, 999) . "";
        if ($archivo_size > (7 * 1048576)) {
            echo "<script>alert('Error! El archivo no debe superar los 7 Megabyte(s).');location.href='$url_return_fail';</script>";
            exit;
        } elseif ($archivo_type !== 'image/png' && $archivo_type !== 'image/jpj' && $archivo_type !== 'image/jpeg') {
            echo "<script>alert('Error! Solo se permiten archivos PNG / JPG / JPEG');location.href='$url_return_fail';</script>";
            exit;
        } elseif ($archivo_extension !== 'png' && $archivo_extension !== 'jpg' && $archivo_extension !== 'jpeg') {
            echo "<script>alert('Error! Solo se permiten archivos PNG / JPG / JPEG');location.href='$url_return_fail';</script>";
            exit;
        } else {
            $thumb = new Thumbnail($archivo_tmp_name);
            if ($thumb->error) {
                $mensaje = '<div class="alert alert-danger alert-dismissible">
                    <h4><i class="glyphicon glyphicon-ok"></i> Error!</h4>
                    No se pudo subir el archivo - ' . $thumb->error . '
                  </div>';
            } else {
                $thumb->maxHeight(1200);
                $thumb->save_jpg("", "$archivo_new_name");
                $archivo_new_name_w_extension = $archivo_new_name . ".jpeg";
                rename($archivo_new_name_w_extension, "contenido/imagenes/solicitudes/$archivo_new_name_w_extension");
                $mensaje = '<div class="alert alert-success alert-dismissible">
                    <h4><i class="fa fa-thumbs-up"></i> Exito!</h4>
                    El reporte de pago se realizo correctamente.
                  </div>';
                query("UPDATE solicitudes_afiliacion SET $name_arch='$archivo_new_name_w_extension' WHERE id='$id_solicitud_afiliacion' ORDER BY id DESC limit 1 ");
            }
        }
    }
    
    /* foto negocio 2 */
    $name_arch = 'foto_negocio_2';
    if (is_uploaded_file($_FILES[$name_arch]['tmp_name'])) {
        $archivo_name = $_FILES[$name_arch]['name'];
        $archivo_type = $_FILES[$name_arch]['type'];
        $archivo_tmp_name = $_FILES[$name_arch]['tmp_name'];
        $archivo_size = $_FILES[$name_arch]['size'];
        $arext1 = explode('.', $archivo_name);
        $archivo_extension = strtolower($arext1[count($arext1) - 1]);
        $archivo_new_name = "deposito-" . date("ymd") . "-" . rand(99, 999) . "";
        if ($archivo_size > (7 * 1048576)) {
            echo "<script>alert('Error! El archivo no debe superar los 7 Megabyte(s).');location.href='$url_return_fail';</script>";
            exit;
        } elseif ($archivo_type !== 'image/png' && $archivo_type !== 'image/jpj' && $archivo_type !== 'image/jpeg') {
            echo "<script>alert('Error! Solo se permiten archivos PNG / JPG / JPEG');location.href='$url_return_fail';</script>";
            exit;
        } elseif ($archivo_extension !== 'png' && $archivo_extension !== 'jpg' && $archivo_extension !== 'jpeg') {
            echo "<script>alert('Error! Solo se permiten archivos PNG / JPG / JPEG');location.href='$url_return_fail';</script>";
            exit;
        } else {
            $thumb = new Thumbnail($archivo_tmp_name);
            if ($thumb->error) {
                $mensaje = '<div class="alert alert-danger alert-dismissible">
                    <h4><i class="glyphicon glyphicon-ok"></i> Error!</h4>
                    No se pudo subir el archivo - ' . $thumb->error . '
                  </div>';
            } else {
                $thumb->maxHeight(1200);
                $thumb->save_jpg("", "$archivo_new_name");
                $archivo_new_name_w_extension = $archivo_new_name . ".jpeg";
                rename($archivo_new_name_w_extension, "contenido/imagenes/solicitudes/$archivo_new_name_w_extension");
                $mensaje = '<div class="alert alert-success alert-dismissible">
                    <h4><i class="fa fa-thumbs-up"></i> Exito!</h4>
                    El reporte de pago se realizo correctamente.
                  </div>';
                query("UPDATE solicitudes_afiliacion SET $name_arch='$archivo_new_name_w_extension' WHERE id='$id_solicitud_afiliacion' ORDER BY id DESC limit 1 ");
            }
        }
    }
    
    /* foto negocio 3 */
    $name_arch = 'foto_negocio_3';
    if (is_uploaded_file($_FILES[$name_arch]['tmp_name'])) {
        $archivo_name = $_FILES[$name_arch]['name'];
        $archivo_type = $_FILES[$name_arch]['type'];
        $archivo_tmp_name = $_FILES[$name_arch]['tmp_name'];
        $archivo_size = $_FILES[$name_arch]['size'];
        $arext1 = explode('.', $archivo_name);
        $archivo_extension = strtolower($arext1[count($arext1) - 1]);
        $archivo_new_name = "deposito-" . date("ymd") . "-" . rand(99, 999) . "";
        if ($archivo_size > (7 * 1048576)) {
            echo "<script>alert('Error! El archivo no debe superar los 7 Megabyte(s).');location.href='$url_return_fail';</script>";
            exit;
        } elseif ($archivo_type !== 'image/png' && $archivo_type !== 'image/jpj' && $archivo_type !== 'image/jpeg') {
            echo "<script>alert('Error! Solo se permiten archivos PNG / JPG / JPEG');location.href='$url_return_fail';</script>";
            exit;
        } elseif ($archivo_extension !== 'png' && $archivo_extension !== 'jpg' && $archivo_extension !== 'jpeg') {
            echo "<script>alert('Error! Solo se permiten archivos PNG / JPG / JPEG');location.href='$url_return_fail';</script>";
            exit;
        } else {
            $thumb = new Thumbnail($archivo_tmp_name);
            if ($thumb->error) {
                $mensaje = '<div class="alert alert-danger alert-dismissible">
                    <h4><i class="glyphicon glyphicon-ok"></i> Error!</h4>
                    No se pudo subir el archivo - ' . $thumb->error . '
                  </div>';
            } else {
                $thumb->maxHeight(1200);
                $thumb->save_jpg("", "$archivo_new_name");
                $archivo_new_name_w_extension = $archivo_new_name . ".jpeg";
                rename($archivo_new_name_w_extension, "contenido/imagenes/solicitudes/$archivo_new_name_w_extension");
                $mensaje = '<div class="alert alert-success alert-dismissible">
                    <h4><i class="fa fa-thumbs-up"></i> Exito!</h4>
                    El reporte de pago se realizo correctamente.
                  </div>';
                query("UPDATE solicitudes_afiliacion SET $name_arch='$archivo_new_name_w_extension' WHERE id='$id_solicitud_afiliacion' ORDER BY id DESC limit 1 ");
            }
        }
    }
    
    /* foto nit */
    $name_arch = 'foto_nit';
    if (is_uploaded_file($_FILES[$name_arch]['tmp_name'])) {
        $archivo_name = $_FILES[$name_arch]['name'];
        $archivo_type = $_FILES[$name_arch]['type'];
        $archivo_tmp_name = $_FILES[$name_arch]['tmp_name'];
        $archivo_size = $_FILES[$name_arch]['size'];
        $arext1 = explode('.', $archivo_name);
        $archivo_extension = strtolower($arext1[count($arext1) - 1]);
        $archivo_new_name = "deposito-" . date("ymd") . "-" . rand(99, 999) . "";
        if ($archivo_size > (7 * 1048576)) {
            echo "<script>alert('Error! El archivo no debe superar los 7 Megabyte(s).');location.href='$url_return_fail';</script>";
            exit;
        } elseif ($archivo_type !== 'image/png' && $archivo_type !== 'image/jpj' && $archivo_type !== 'image/jpeg') {
            echo "<script>alert('Error! Solo se permiten archivos PNG / JPG / JPEG');location.href='$url_return_fail';</script>";
            exit;
        } elseif ($archivo_extension !== 'png' && $archivo_extension !== 'jpg' && $archivo_extension !== 'jpeg') {
            echo "<script>alert('Error! Solo se permiten archivos PNG / JPG / JPEG');location.href='$url_return_fail';</script>";
            exit;
        } else {
            $thumb = new Thumbnail($archivo_tmp_name);
            if ($thumb->error) {
                $mensaje = '<div class="alert alert-danger alert-dismissible">
                    <h4><i class="glyphicon glyphicon-ok"></i> Error!</h4>
                    No se pudo subir el archivo - ' . $thumb->error . '
                  </div>';
            } else {
                $thumb->maxHeight(1200);
                $thumb->save_jpg("", "$archivo_new_name");
                $archivo_new_name_w_extension = $archivo_new_name . ".jpeg";
                rename($archivo_new_name_w_extension, "contenido/imagenes/solicitudes/$archivo_new_name_w_extension");
                $mensaje = '<div class="alert alert-success alert-dismissible">
                    <h4><i class="fa fa-thumbs-up"></i> Exito!</h4>
                    El reporte de pago se realizo correctamente.
                  </div>';
                query("UPDATE solicitudes_afiliacion SET $name_arch='$archivo_new_name_w_extension' WHERE id='$id_solicitud_afiliacion' ORDER BY id DESC limit 1 ");
            }
        }
    }
    
    /* envio de correo */
    $url_autentificacion = 'https://www.nemabol.com/autentificar/'.$id_solicitud_afiliacion.'/'.md5(md5($id_solicitud_afiliacion.'nem212')).'.html';
    $bodyEmail = '<p>Su solicitud ha sido registrada correctamente y es necesario que autentifique este correo para que pueda pasar a proceso de revisi&oacute;n, para ello debe ingresar al siguiente enlace de autentificaci&oacute;n.</p>';
    $bodyEmail .= '<div style="text-align: center;padding: 25px 0px;">';
    $bodyEmail .= '<a href="'.$url_autentificacion.'" style="background: #14a514;color: #FFF;padding: 10px 20px;border-radius: 5px;">AUTENTIFICAR CORREO</a>';
    $bodyEmail .= '<br><br>';
    $bodyEmail .= '<a href="'.$url_autentificacion.'">'.$url_autentificacion.'</a>';
    $bodyEmail .= '</div>';
    $bodyEmail .= '<div style="padding:10px;border:1px solid #BBB;text-align:center;"><strong>AVISO IMPORTANTE:</strong><br>Nemabol no tiene ninguna relaci&oacute;n con las entidades TigoMoney, Banco Sol y Banco BCP.</div><br>';
    $bodyEmail .= '<hr>';
    $bodyEmail .= '<p>Saludos cordiales<br>NEMABOL</p>';
    $tituloEmail = 'SOLICITUD DE AFILIACI&Oacute;N';
    $contenido_correo = platillaEmailUno($bodyEmail,$tituloEmail,$correo_registro,urlUnsubscribe($correo_registro),$nombre);
    $codigo_solicitud = 1;
    $asunto = "Confirmaci&oacute;n de registro - SOLICITUD RS00".$id_solicitud_afiliacion;
    SISTsendEmail($correo_registro, $asunto, $contenido_correo);

    $sw_registro_procesado = true;
}else{
    /* contador renders formularioregistro */
    $rqdisr1 = query("SELECT cnt_renders_formreg FROM info_sistema WHERE id=1 LIMIT 1 ");
    $rqdisr2 = fetch($rqdisr1);
    $cnt_renders_formreg = $rqdisr2['cnt_renders_formreg'];
    $cnt_renders_formreg++;
    query("UPDATE info_sistema SET cnt_renders_formreg='$cnt_renders_formreg' WHERE id=1 LIMIT 1 ");
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
                                    if (!$sw_registro_procesado) {
                                        ?>
                                        <p>
                                            En el siguiente formulario podr&aacute; solicitar la afiliaci&oacute;n a nuestra red de oficinas de registro para los servicios de NEMABOL, para ello debe llenar sus datos correspondientes, posteriormente nuestros administradores se comunicar&aacute;n con usted para coordinar su aprovaci&oacute;n y habilitaci&oacute;n.
                                        </p>


                                        
                                        
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 col-xs-12"></div>
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                                <div class="" style="border: 1px solid #dadada;
    padding: 30px;
    margin-bottom: 20px;
    font-size: 12pt;
    text-align: justify;">
                                                    Muchas gracias por el inter&eacute;s,
                                                    <br>
                                                    Somos una empresa legalmente constituida en el Pa&iacute;s desde hace 4 a&ntilde;os, <b>NEMABOL</b> con sucursal central en la ciudad de La Paz, nuestro n&uacute;mero de NIT es: 2044323014 puede verificarlo en Fundempresa:
                                                    <br>
                                                    <a href="https://www.fundempresa.org.bo/directorio/Inicio/getMostrarEmpresa">https://www.fundempresa.org.bo/directorio/Inicio/getMostrarEmpresa</a>
                                                    <br>
                                                    <br>
                                                    Uno de los principales servicios que brindamos es dar cursos de capacitaci&oacute;n y queremos dar confianza a nuestros clientes inscribiendo a todos los participantes de forma presencial, la Persona interesada vendr&aacute; a su PUNTO DE PAGO, le har&aacute; el pago que corresponde y usted tendr&aacute; que inscribirle usando nuestro sistema, por cada inscripci&oacute;n que realice recibir&aacute; una comisi&oacute;n, es sencillo y f&aacute;cil.
                                                    <br>
                                                    Vamos a seleccionar 4 puntos de pago en distintas ciudades, por lo que le invitamos a postularse.
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-3 col-lg-3 col-xs-12"></div>
                                            <div class="col-md-6 col-lg-6 col-xs-12">
                                                <div class="alert alert-warning">
                                                    <strong>AVISO IMPORTANTE:</strong>
                                                    <br>
                                                    Nemabol no tiene ninguna relaci&oacute;n con las entidades TigoMoney, Banco Sol y Banco BCP.
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-md-1 col-lg-2 col-xs-12"></div>
                                            <div class="col-md-10 col-lg-8 col-xs-12">
                                                <div class="card">
                                                    <form id="" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                                                        <div class="card-header">
                                                            <strong>FORMULARIO DE AFILIACI&Oacute;N</strong>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="id_tipo_punto">Punto de atenci&oacute;n</label>
                                                                <div class="col-md-9">
                                                                    <select class="form-control" name="id_tipo_punto" required="">
                                                                        <option value="1">PUNTO TIGOMONEY</option>
                                                                        <option value="2">PUNTO SOL AMIGO</option>
                                                                        <option value="3">PUNTO AGENTE BCP</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="id_departamento">Departamento</label>
                                                                <div class="col-md-9">
                                                                    <select class="form-control" name="id_departamento" required="">
                                                                        <?php
                                                                        $rqdd1 = query("SELECT id,nombre FROM departamentos WHERE estado='1' ORDER BY orden ASC ");
                                                                        while($rqdd2 = fetch($rqdd1)){
                                                                            ?>
                                                                            <option value="<?php echo $rqdd2['id']; ?>"><?php echo $rqdd2['nombre']; ?></option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="nombre">Nombre:</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="nombre" value="" placeholder="Nombres y apellidos..." required="" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="nombre">NIT:</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="number" name="nit" value="" placeholder="NIT..." required="" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="nombre">Direcci&oacute;n:</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="text" name="direccion" value="" placeholder="Direcci&oacute;n..." required="" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="nombre">Celular:</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="number" name="celular" value="" placeholder="Celular..." required="" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="nombre">Correo:</label>
                                                                <div class="col-md-9">
                                                                    <input class="form-control" type="email" name="correo" value="" placeholder="Correo..." required="" autocomplete="off">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="descripcion">Dispone de:</label>
                                                                <div class="col-md-9">
                                                                    <div style="border: 1px solid #d8dbe0;padding: 20px;border-radius: 4px;">
                                                                        <label>
                                                                            <input type="checkbox" name="internet_disponible" value="1" style="width: 15px;height: 15px;"/> &nbsp; Dispongo de Internet
                                                                        </label>
                                                                        <br>
                                                                        <label>
                                                                            <input type="checkbox" name="impresora_disponible" value="1" style="width: 15px;height: 15px;"/> &nbsp; Dispongo de Impresora
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="descripcion">Foto(s) de la oficina:</label>
                                                                <div class="col-md-9">
                                                                    <div style="border: 1px solid #d8dbe0;padding: 20px;border-radius: 4px;">
                                                                        <label>
                                                                            <input type="file" name="foto_negocio_1" class="form-control"/>
                                                                        </label>
                                                                        <br>
                                                                        <label>
                                                                            <input type="file" name="foto_negocio_2" class="form-control"/>
                                                                        </label>
                                                                        <br>
                                                                        <label>
                                                                            <input type="file" name="foto_negocio_3" class="form-control"/>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-md-3 col-form-label" for="descripcion">Foto del NIT:</label>
                                                                <div class="col-md-9">
                                                                    <div style="border: 1px solid #d8dbe0;padding: 20px;border-radius: 4px;">
                                                                        <label>
                                                                            <input type="file" name="foto_nit" class="form-control"/>
                                                                        </label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input type="hidden" name="procesar-formulario" value="1">
                                                        <div class="card-footer" id="AJAXMODALCONTENT">
                                                            <button class="btn btn-lg btn-info" type="submit"> ENVIAR SOLICITUD</button>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="alert alert-success">
                                            <strong>SOLICITUD ENVIADA CORRECTAMENTE</strong>
                                            <br>
                                            Es necesario que verifique su correo electronico para que su solicitud pueda ser revisada.
                                        </div>
                                        <hr>
                                        <p>Acabamos de enviarle un correo con un link de verificaci&oacute;n al correo: <?php echo $correo_registro; ?> , por favor ingrese al link para verificar su correo y pasar a etapa de revisi&oacute;n, muchas gracias por enviar su solicitud.</p>
                                        <div class="text-center">
                                            Siguiente paso:
                                            <br>
                                            <br>
                                            <b style="border: 1px solid gray;padding: 10px;border-radius: 5px;">INGRESAR AL LINK DEL CORREO ENVIADO</b>
                                        </div>
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
