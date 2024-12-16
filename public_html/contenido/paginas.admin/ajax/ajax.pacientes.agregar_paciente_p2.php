<?php
session_start();
include_once '../../configuracion/config.php';
include_once '../../configuracion/funciones.php';
$mysqli = mysqli_connect($hostname, $username, $password, $database);

/* control de sesion */
if (!isset_administrador() || administrador('type') != 'cliente') {
    echo "DENEGADO";
    exit;
}

$__page_filename = 'pacientes';
$__ajaxpage_tablename = 'pacientes';

/* data requerida */
$id_administrador = administrador('id');
$rqdu1 = query("SELECT c.id FROM clientes_usuarios u INNER JOIN clientes c ON u.id_cliente=c.id WHERE u.id='$id_administrador' LIMIT 1 ");
$rqdu2 = fetch($rqdu1);
$id_cliente = $rqdu2['id'];


/* procesar-formulario */
if (isset_post('procesar-formulario')) {
    $nombres = post('nombres');
    $apellidos = post('apellidos');
    $dia_nac = (int) post('dia_nac') < 10 ? '0' . post('dia_nac') : post('dia_nac');
    $mes_nac = post('mes_nac');
    $anio_nac = post('anio_nac');
    $fecha_nacimiento = $anio_nac . '-' . $mes_nac . '-' . $dia_nac;
    $id_estado_civil = post('id_estado_civil');
    $ocupacion = post('ocupacion');
    $direccion = post('direccion');
    $celular = post('celular');
    $correo = post('correo');
    $id_departamento_procedencia = post('id_departamento_procedencia');

    $rqv1 = query("SELECT id FROM $__ajaxpage_tablename WHERE id_cliente='$id_cliente' AND nombres LIKE '$nombres' AND apellidos LIKE '$apellidos' ");
    if (num_rows($rqv1) == 0) {
        query("INSERT INTO $__ajaxpage_tablename (
                id_cliente,
                nombres,
                apellidos,
                fecha_nacimiento,
                id_estado_civil,
                ocupacion,
                direccion,
                celular,
                correo,
                id_departamento_procedencia,
                estado
                ) VALUES (
                '$id_cliente',
                '$nombres',
                '$apellidos',
                '$fecha_nacimiento',
                '$id_estado_civil',
                '$ocupacion',
                '$direccion',
                '$celular',
                '$correo',
                '$id_departamento_procedencia',
                '1'
                ) ");
        $id_paciente = insert_id();
        log_acciones('Registro de paciente', 'paciente-registro', 'paciente', $id_paciente);
        ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">EXITO!</h4>
            <p>El registro fue agregado correctamente en el sistema.</p>
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger" role="alert"><b>ERROR!</b> El paciente '<?php echo $nombres . ' ' . $apellidos; ?>' ya se encuentra registrado en el sistema.</div>
        <?php
    }
}
