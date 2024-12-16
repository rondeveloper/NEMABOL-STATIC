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
$rqdu1 = query("SELECT c.id_departamento FROM clientes_usuarios u INNER JOIN clientes c ON u.id_cliente=c.id WHERE u.id='$id_administrador' LIMIT 1 ");
$rqdu2 = fetch($rqdu1);
$id_departamento_cliente = $rqdu2['id_departamento'];
?>
<div class="card">
    <form id="FORM-proceso" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
        <div class="card-header">
            <strong>Formulario de registro</strong>
        </div>
        <div class="card-body">
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="nombres">Nombres</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="nombres" name="nombres" placeholder="Nombres..." required="" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="apellidos">Apellidos</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="apellidos" name="apellidos" placeholder="Apellidos..." required="" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="dia_nac">Fecha de nacimiento</label>
                <div class="col-md-3">
                    <input class="form-control" type="number" id="dia_nac" name="dia_nac" placeholder="Dia..." required="" autocomplete="off" min="1" max="31" maxlength="2">
                </div>
                <div class="col-md-3">
                    <select class="form-control" name="mes_nac">
                        <option value="01">Enero</option>
                        <option value="02">Febrero</option>
                        <option value="03">Marzo</option>
                        <option value="04">Abril</option>
                        <option value="05">Mayo</option>
                        <option value="06">Junio</option>
                        <option value="07">Julio</option>
                        <option value="08">Agosto</option>
                        <option value="09">Septiembre</option>
                        <option value="10">Octubre</option>
                        <option value="11">Noviembre</option>
                        <option value="12">Diciembre</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <input class="form-control" type="number" name="anio_nac" placeholder="A&ntilde;o..." required="" autocomplete="off" min="1950" max="2020" maxlength="4">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="id_departamento_procedencia">Procedencia</label>
                <div class="col-md-9">
                    <select class="form-control" id="id_departamento_procedencia" name="id_departamento_procedencia">
                        <?php
                        $rqd1 = query("SELECT id,nombre FROM departamentos ORDER BY orden ASC ");
                        while ($rqd2 = fetch($rqd1)) {
                            $selected = '';
                            if ($rqd2['id'] == $id_departamento_cliente) {
                                $selected = ' selected="selected" ';
                            }
                            ?>
                            <option value="<?php echo $rqd2['id']; ?>" <?php echo $selected; ?>><?php echo $rqd2['nombre']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-md-3 col-form-label" for="celular">Celular</label>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="celular" name="celular" placeholder="Celular..." required="" autocomplete="off">
                </div>
            </div>

            <button class="btn btn-outline-secondary btn-block collapsed" type="button" data-toggle="collapse" data-target="#COLLAPSE-datos_opcionales" aria-expanded="false" aria-controls="collapseExample">
                <i class="c-icon cil-chevron-circle-down-alt"></i> DATOS OPCIONALES
            </button>
            <div class="collapse" id="COLLAPSE-datos_opcionales" style="">
                <br>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="id_estado_civil">Estado civil</label>
                    <div class="col-md-9">
                        <select class="form-control" id="id_estado_civil" name="id_estado_civil">
                            <option value="1">Sin dato</option>
                            <option value="2">SOLTERO</option>
                            <option value="3">CASADO</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="direccion">Direcci&oacute;n</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" id="direccion" name="direccion" placeholder="Direcci&oacute;n... (OPCIONAL)" autocomplete="off">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="ocupacion">Ocupaci&oacute;n</label>
                    <div class="col-md-9">
                        <input class="form-control" type="text" id="ocupacion" name="ocupacion" placeholder="Ocupaci&oacute;n... (OPCIONAL)" autocomplete="off" onkeyup="this.value = this.value.toUpperCase()">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="correo">Correo</label>
                    <div class="col-md-9">
                        <input class="form-control" id="correo" type="email" name="correo" placeholder="Correo... (OPCIONAL)" autocomplete="off">
                    </div>
                </div>
            </div>

        </div>
        <input type="hidden" name="procesar-formulario" value="1"/>
        <div class="card-footer" id="AJAXMODALCONTENT">
            <button class="btn btn-lg btn-info" type="submit"> AGREGAR PACIENTE</button>
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
            url: 'contenido/paginas.admin/ajax/ajax.<?php echo $__page_filename; ?>.agregar_paciente_p2.php',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                $("#AJAXMODALCONTENT").html(data);
                listar_registros(pageview);
            }
        });
    });
</script>