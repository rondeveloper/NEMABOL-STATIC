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
    $id_registro = post('id_registro');
    $titulo = post('titulo');
    $titulo_identificador_nombre = limpiar_enlace($titulo);
    $descripcion = post('descripcion');

    $tag_img_image = 'imagen';
    $tag_img_banner = 'banner';
    
    $curr_imagen = post('curr_imagen');
    $curr_banner = post('curr_banner');
    
    $up_imagen = subirImagen($tag_img_image,"../../imagenes/especialidades/"); 
    $up_banner = subirImagen($tag_img_banner,"../../imagenes/especialidades/"); 
    
    $imagen = $up_imagen==''?$curr_imagen:$up_imagen;
    $banner = $up_banner==''?$curr_banner:$up_banner;

        query("UPDATE $__ajaxpage_tablename SET 
                titulo='$titulo',
                titulo_identificador='$titulo_identificador_nombre',
                descripcion='$descripcion',
                imagen='$imagen',
                banner='$banner',
                estado='1' 
                WHERE id='$id_registro' ORDER BY id DESC limit 1 ");
        log_acciones('Edicion de especialidad', 'especialidad-edicion', 'especialidad', $id_registro);
        ?>
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">EXITO!</h4>
            <p>El registro fue modificado correctamente en el sistema.</p>
        </div>
        <?php
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