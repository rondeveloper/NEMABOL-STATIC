<?php
session_start();
include_once '../../configuracion/config.php';
include_once '../../configuracion/funciones.php';
$mysqli = mysqli_connect($hostname, $username, $password, $database);

/* control de sesion */
if (!isset_administrador() || administrador('type') != 'administrador') {
    echo "DENEGADO";
    exit;
}

$__page_filename = 'especialidades';
$__ajaxpage_tablename = 'especialidades';

/* procesar-formulario */
if (isset_post('procesar-formulario')) {
    $nombre = post('nombre');
    $titulo_identificador_nombre = limpiar_enlace($nombre);
    $tag_image = 'imagen';
    $descripcion = post('descripcion');

    $imagen = subirImagen($tag_image,"../../imagenes/especialidades/"); 

    $rqv1 = query("SELECT id FROM $__ajaxpage_tablename WHERE titulo LIKE '$nombre' LIMIT 1 ");
    if (num_rows($rqv1) == 0) {
        query("INSERT INTO $__ajaxpage_tablename (
                titulo,
                titulo_identificador,
                descripcion,
                imagen,
                estado
                ) VALUES (
                '$nombre',
                '$titulo_identificador_nombre',
                '$descripcion',
                '$imagen',
                '1'
                ) ");
        $id_especialidad = insert_id();
        log_acciones('Registro de especialidad', 'especialidad-registro', 'especialidad', $id_especialidad);
        ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">EXITO!</h4>
            <p>El registro fue agregado correctamente en el sistema.</p>
        </div>
        <?php
    } else {
        ?>
        <div class="alert alert-danger" role="alert"><b>ERROR!</b> La especialidad '<?php echo $nombre; ?>' ya se encuentra registrada en el sistema.</div>
        <?php
    }
}

/* subirImagen */
function subirImagen($tag_image, $carpeta_destino) {
    $imagen = '';
    if (is_uploaded_file($_FILES[$tag_image]['tmp_name'])) {
        $imagen = rand(999,99999).$_FILES[$tag_image]['name'];
        move_uploaded_file($_FILES[$tag_image]['tmp_name'], $carpeta_destino.$imagen);
    }
    return $imagen;
}