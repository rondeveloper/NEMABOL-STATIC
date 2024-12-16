<?php
session_start();
include_once '../../configuracion/config.php';
include_once '../../configuracion/funciones.php';
include_once '../../librerias/phpmailer/vendor/autoload.php';
$mysqli = mysqli_connect($hostname, $username, $password, $database);

/* control de sesion */
if (!isset_administrador()) {
    echo "DENEGADO";
    exit;
}

$__page_filename = 'administradores';
$__ajaxpage_tablename = 'administradores';

/* procesar-formulario */
if (isset_post('activar-solicitud')) {
    $id_solicitud = post('id_solicitud');
    
    /* datos de solicitud */
    $rqds1 = query("SELECT * FROM solicitudes_afiliacion WHERE id='$id_solicitud' ORDER BY id DESC limit 1 ");
    $solicitud = fetch($rqds1);
    
    $nombre = $solicitud['nombre'];
    $email = $solicitud['correo'];
    $celular = $solicitud['calular'];
    $nick = $solicitud['correo'];
    $password_generado = substr(md5(md5(rand(999,99999))),rand(5,15),5);
    $password = hashpass($password_generado);
    
    $rqv1 = query("SELECT id FROM $__ajaxpage_tablename WHERE nombre LIKE '$nombre' LIMIT 1 ");
    if (num_rows($rqv1) == 0) {
        query("INSERT INTO $__ajaxpage_tablename (
                nombre,
                email,
                celular,
                nick,
                password,
                estado
                ) VALUES (
                '$nombre',
                '$email',
                '$celular',
                '$nick',
                '$password',
                '1'
                ) ");
        $id_administrador = insert_id();
        query("INSERT INTO rel_activacion_solicitud(id_solicitud, id_administrador) VALUES ('$id_solicitud','$id_administrador') ");
        query("UPDATE solicitudes_afiliacion SET sw_activado='1' WHERE id='$id_solicitud' LIMIT 1 ");
        log_acciones('Registro de administrador [activacion de solicitud]', 'administrador-registro', 'administrador', $id_administrador);
        
        
        /* envio de correo */
        $url_ingreso = $dominio.'oficina';
        $bodyEmail = '<p>Felicidades, su solicitud ha sido aprobada correctamente!.</p>';
        $bodyEmail .= '<p>Por lo que ahora ya puede hacer uso de nuestra plataforma y administrar los servicios de NEMABOL, a continuaci&oacute;n le mostramos el enlace de ingreso a su panel de administraci&oacute;n y los datos de acceso.</p>';
        $bodyEmail .= '<div style="text-align: center;padding: 25px 0px;">';
        $bodyEmail .= '<a href="'.$url_ingreso.'" style="background: #14a514;color: #FFF;padding: 10px 20px;border-radius: 5px;">INGRESAR AL PANEL DE ADMINISTRACI&Oacute;N</a>';
        $bodyEmail .= '<br><br>';
        $bodyEmail .= '<a href="'.$url_ingreso.'">'.$url_ingreso.'</a>';
        $bodyEmail .= '</div>';
        $bodyEmail .= '<div style="padding:10px;border:1px solid #BBB;text-align:center;"><strong>USUARIO:</strong><br>'.$nick.'<br><br><strong>CONTRASE&Ntilde;A:</strong><br>'.$password_generado.'</div><br>';
        $bodyEmail .= '<hr>';
        $bodyEmail .= '<p>Saludos cordiales<br>NEMABOL</p>';
        $tituloEmail = 'SOLICITUD APROBADA';
        $contenido_correo = platillaEmailUno($bodyEmail,$tituloEmail,$email,urlUnsubscribe($email),$nombre);
        $asunto = "Solicitud aprobada para los servicios de Nemabol - RS00".$id_solicitud;
        SISTsendEmail($email, $asunto, $contenido_correo);
        ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">EXITO!</h4>
            <p>El registro fue agregado correctamente en el sistema.</p>
        </div>
        <p>Los datos de acceso del administrador son los siguientes:</p>
        <table class="table table-bordered">
            <tr>
                <td><b>Usuario:</b></td>
                <td><?php echo $nick; ?></td>
            </tr>
            <tr>
                <td><b>Contrase&ntilde;a:</b></td>
                <td><?php echo $password_generado; ?></td>
            </tr>
        </table>
        <br>
        <br>
        <hr>
        <p>Tambi&eacute;n se envio un correo con los datos de acceso a: <?php echo $email; ?></p>
        <?php
    } else {
        ?>
        <div class="alert alert-danger" role="alert"><b>ERROR!</b> El administrador '<?php echo $nombre; ?>' ya se encuentra registrado en el sistema.</div>
        <?php
    }
}
