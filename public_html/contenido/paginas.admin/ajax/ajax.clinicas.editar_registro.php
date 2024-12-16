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

/* data */
$id_registro = post('id_registro');

$__page_filename = 'clinicas';
$__ajaxpage_tablename = 'clinicas';


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
    
    $up_imagen = subirImagen($tag_img_image,"../../imagenes/clinicas/"); 
    $up_banner = subirImagen($tag_img_banner,"../../imagenes/clinicas/"); 
    
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


/* obtiene registro */
$rqde1 = query("SELECT * FROM $__ajaxpage_tablename WHERE id='$id_registro' ORDER BY id DESC limit 1 ");
$registro = fetch($rqde1);

?>
<div class="card">
    <form id="FORM-proceso" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="card-header">
            <strong>Formulario de edici&oacute;n</strong>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="nombre">Nombre</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="nombre" name="titulo" value="<?php echo $registro['titulo']; ?>" placeholder="Nombre..." required="" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="imagen">Imagen (nuevo)</label>
                <div class="col-md-6">
                    <input class="form-control" type="file" id="imagen" name="imagen" placeholder="Imagen..." autocomplete="off">
                </div>
                <div class="col-md-3">
                    <?php if($registro['imagen']==''){ echo 'Sin imagen'; }else{ ?>
                    <img src="contenido/imagenes/clinicas/<?php echo $registro['banner']; ?>" style="height: 45px;"/>
                    <?php } ?>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="descripcion">Descripci&oacute;n</label>
                <div class="col-md-9">
                    <textarea class="form-control" id="descripcion" name="descripcion" placeholder="Descripcion..." required="" autocomplete="off" style="height: 120px;"><?php echo $registro['descripcion']; ?></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="banner">Banner (nuevo)</label>
                <div class="col-md-6">
                    <input class="form-control" type="file" id="banner" name="banner" placeholder="Banner..." autocomplete="off">
                </div>
                <div class="col-md-3">
                    <?php if($registro['banner']==''){ echo 'Sin banner'; }else{ ?>
                    <img src="contenido/imagenes/clinicas/<?php echo $registro['banner']; ?>" style="height: 45px;"/>
                    <?php } ?>
                </div>
            </div>
        </div>
        <input type="hidden" name="procesar-formulario" value="1"/>
        <input type="hidden" name="id_registro" value="<?php echo $id_registro; ?>"/>
        <input type="hidden" name="curr_imagen" value="<?php echo $registro['imagen']; ?>"/>
        <input type="hidden" name="curr_banner" value="<?php echo $registro['banner']; ?>"/>
        <div class="card-footer" id="AJAXMODALCONTENT">
            <button class="btn btn-lg btn-info" type="submit"> ACTUALIZAR</button>
        </div>
    </form>
</div>

<script>
    $('#FORM-proceso').on('submit', function (e) {
        e.preventDefault();
        $("#AJAXMODALCONTENT").html('Procesando...');
        var formData = new FormData(this);
        formData.append('_token', $('input[name=_token]').val());
        $.ajax({
            type: 'POST',
            url: 'contenido/paginas.admin/ajax/ajax.<?php echo $__page_filename; ?>.editar_registro.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#AJAXMODALCONTENT").html(data);
                listar_registros();
            }
        });
    });
</script>


<?php
/* subirImagen */
function subirImagen($tag_image, $carpeta_destino) {
    $imagen = '';
    if (is_uploaded_file($_FILES[$tag_image]['tmp_name'])) {
        $imagen = rand(999,99999).$_FILES[$tag_image]['name'];
        move_uploaded_file($_FILES[$tag_image]['tmp_name'], $carpeta_destino.$imagen);
    }
    return $imagen;
}
