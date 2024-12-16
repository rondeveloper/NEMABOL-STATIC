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

/* id_solicitud */
$id_solicitud = post('id_solicitud');

$__page_filename = 'solicitudes-afiliacion';

$rqds1 = query("SELECT * FROM solicitudes_afiliacion WHERE id='$id_solicitud' ORDER BY id DESC limit 1 ");
$solicitud = fetch($rqds1);

?>
<div class="card">
    <form id="FORM-proceso" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="card-header">
            <strong>Formulario de activaci&oacute;n</strong>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <div class="col-md-12">
                    <b>&iquest; Desea activar la siguiente solicitud ?</b>
                </div>
                <br>
                <br>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="email">Nombre</label>
                <div class="col-md-9">
                    <input class="form-control" type="email" id="email" name="email" placeholder="Correo electr&oacute;nico..." value="<?php echo $solicitud['nombre']; ?>" disabled="">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="email">Correo</label>
                <div class="col-md-9">
                    <input class="form-control" type="email" id="email" name="email" placeholder="Correo electr&oacute;nico..." value="<?php echo $solicitud['correo']; ?>" disabled="">
                </div>
            </div>
        </div>
        <input type="hidden" name="id_solicitud" value="<?php echo $id_solicitud; ?>"/>
        <input type="hidden" name="activar-solicitud" value="1"/>
        <div class="card-footer text-center" id="AJAXMODALCONTENT">
            <button class="btn btn-lg btn-info" type="submit">ACTIVAR CUENTA</button>
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
            url: 'contenido/paginas.admin/ajax/ajax.<?php echo $__page_filename; ?>.activar_p2.php',
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