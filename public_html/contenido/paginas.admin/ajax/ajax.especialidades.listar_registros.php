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

$__ajaxpage_tablename = 'especialidades';
$__page_filename = 'especialidades';

$registros = query("SELECT * FROM $__ajaxpage_tablename WHERE estado IN (1) ");
?>
<table class="table table-responsive-sm table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>#</th>
            <th>Imagen</th>
            <th>Nombre</th>
            <th>Descripci&oacute;n</th>
            <th>Estado</th>
            <th>Edici&oacute;n</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $cnt = 0;
        while ($registro = fetch($registros)) {
            ?>
            <tr>
                <td><?php echo ++$cnt; ?></td>
                <td><img src="contenido/imagenes/especialidades/<?php echo $registro['imagen']; ?>" style="height: 50px;"/></td>
                <td><?php echo $registro['titulo']; ?></td>
                <td><?php echo $registro['descripcion']; ?></td>
                <td><span class="badge badge-success">Activo</span></td>
                <td><b class="btn btn-info btn-sm" onclick="editar_registro('<?php echo $registro['id']; ?>');" data-toggle="modal" data-target="#MODAL_LARGE">Editar</b></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>


<!-- FUNCTION agregar_especialidad -->
<script>
    function editar_registro(id_registro){
        $("#MODAL_LARGE__title").html('EDITAR ESPECIALIDAD');
        $("#MODAL_LARGE__body").html('Cargando...');
        $.ajax({
            url: 'contenido/paginas.admin/ajax/ajax.<?php echo $__page_filename; ?>.editar_registro.php',
            type: 'POST',
            data: { id_registro: id_registro },
            dataType: 'html',
            success: function (data) {
                $("#MODAL_LARGE__body").html(data);
            }
        });
    }
</script>
