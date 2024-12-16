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

$__page_filename = 'clinicas';
$__ajaxpage_tablename = 'clinicas';

$data_required = " (c.id)id_cliente,(c.titulo)nombre_cliente,(p.nombre)nombre_plan,(d.nombre)departamento ";
$registros = query("SELECT $data_required FROM $__ajaxpage_tablename c INNER JOIN planes p ON c.id_plan=p.id INNER JOIN departamentos d ON c.id_departamento=d.id ");
?>
<table class="table table-responsive-sm table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Plan</th>
            <th>Departamento</th>
            <th>Estado</th>
            <th>Usuarios</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($registro = fetch($registros)) {
            ?>
            <tr>
                <td><?php echo $registro['nombre_cliente']; ?></td>
                <td><?php echo $registro['nombre_plan']; ?></td>
                <td><?php echo $registro['departamento']; ?></td>
                <td><span class="badge badge-success">Activo</span></td>
                <td>
                    <b class="btn btn-sm btn-info" data-toggle="modal" data-target="#MODAL_LARGE" onclick="usuarios_clinicas('<?php echo $registro['id_cliente']; ?>');">
                        <i class="c-icon c-icon-1xl cil-user"></i> Usuarios
                    </b>
                </td>
                <td>
                    <b class="btn btn-sm btn-warning" data-toggle="modal" data-target="#MODAL_LARGE" onclick="editar_registro('<?php echo $registro['id_cliente']; ?>');">
                        <i class="c-icon c-icon-1xl cil-color-border"></i> Editar
                    </b>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<nav>
    <ul class="pagination">
        <li class="page-item"><a class="page-link">Prev</a></li>
        <li class="page-item active"><a class="page-link">1</a></li>
        <li class="page-item"><a class="page-link">2</a></li>
        <li class="page-item"><a class="page-link">3</a></li>
        <li class="page-item"><a class="page-link">4</a></li>
        <li class="page-item"><a class="page-link">Next</a></li>
    </ul>
</nav>

<!-- FUNCTION usuarios_clinicas -->
<script>
    function usuarios_clinicas(id_cliente){
        $("#MODAL_LARGE__title").html('USUARIOS DE CLIENTE');
        $("#MODAL_LARGE__body").html('Cargando...');
        $.ajax({
            url: 'contenido/paginas.admin/ajax/ajax.<?php echo $__page_filename; ?>.usuarios_clinicas.php',
            data : {id_cliente: id_cliente},
            type: 'POST',
            dataType: 'html',
            success: function (data) {
                $("#MODAL_LARGE__body").html(data);
            }
        });
    }
</script>


<!-- FUNCTION editar_registro -->
<script>
    function editar_registro(id_registro){
        $("#MODAL_LARGE__title").html('EDITAR CLIENTE');
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