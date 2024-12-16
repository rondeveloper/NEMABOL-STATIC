<?php
session_start();
include_once '../../configuracion/config.php';
include_once '../../configuracion/funciones.php';
$mysqli = mysqli_connect($hostname, $username, $password, $database);

/* control de sesion */
if (!isset_administrador()) {
    echo "DENEGADO";
    exit;
}

$__page_filename = 'administradores';
$__ajaxpage_tablename = 'administradores';

/* procesar-formulario */
if (isset_post('procesar-formulario')) {
    $nombre = post('nombre');
    $email = post('email');
    $celular = post('celular');
    $nick = post('nick');
    $password = hashpass(post('password'));
    
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
        log_acciones('Registro de administrador', 'administrador-registro', 'administrador', $id_administrador);
        ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">EXITO!</h4>
            <p>El registro fue agregado correctamente en el sistema.</p>
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger" role="alert"><b>ERROR!</b> El administrador '<?php echo $nombre; ?>' ya se encuentra registrado en el sistema.</div>
        <?php
    }
}
