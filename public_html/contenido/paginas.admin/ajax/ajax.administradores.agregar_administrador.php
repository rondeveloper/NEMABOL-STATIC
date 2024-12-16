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

?>
<div class="card">
    <form id="FORM-proceso" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="card-header">
            <strong>Formulario de registro</strong>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="nombre">Nombre</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="nombre" name="nombre" placeholder="Nombres y apellidos..." required="" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="email">Correo</label>
                <div class="col-md-9">
                    <input class="form-control" type="email" id="email" name="email" placeholder="Correo electr&oacute;nico..." required="" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="celular">Celular</label>
                <div class="col-md-9">
                    <input class="form-control" type="number" id="celular" name="celular" placeholder="Celular..." autocomplete="off">
                </div>
            </div>
            <hr>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="nick">Nick de usuario</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="nick" name="nick" placeholder="Nick de usuario..." required="" autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="password">Contrase&ntilde;a</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="password" name="password" placeholder="********" required="" autocomplete="off">
                </div>
            </div>
        </div>
        <input type="hidden" name="procesar-formulario" value="1"/>
        <div class="card-footer" id="AJAXMODALCONTENT">
            <button class="btn btn-lg btn-info" type="submit"> AGREGAR ADMINISTRADOR</button>
            <button class="btn btn-lg btn-danger" type="reset"> RESET</button>
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
            url: 'contenido/paginas.admin/ajax/ajax.<?php echo $__page_filename; ?>.agregar_administrador_p2.php',
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