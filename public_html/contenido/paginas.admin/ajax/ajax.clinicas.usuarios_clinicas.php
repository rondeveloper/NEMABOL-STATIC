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

$id_cliente = post('id_cliente');

$__page_filename = 'clinicas';
$__ajaxpage_tablename = 'clinicas_usuarios';

$data_required = " * ";
$registros = query("SELECT $data_required FROM $__ajaxpage_tablename u WHERE u.id_cliente='$id_cliente' ");
if(num_rows($registros)==0){
    echo '<div class="alert alert-warning" role="alert">
            <h4 class="alert-heading">AVISO</h4>
            <p>No se encontraron registros.</p>
        </div>';
}
?>
<table class="table table-responsive-sm table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Ocupaci&oacute;n</th>
            <th>Nick</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($registro = fetch($registros)) {
            ?>
            <tr>
                <td><?php echo $registro['nombre']; ?></td>
                <td><?php echo $registro['email']; ?></td>
                <td><?php echo $registro['celular']; ?></td>
                <td><?php echo $registro['ocupacion']; ?></td>
                <td><?php echo $registro['nick']; ?></td>
                <td><span class="badge badge-success">Activo</span></td>
                <td>
                    <b class="btn btn-sm btn-info" data-toggle="modal" data-target="#MODAL_LARGE" onclick="usuarios_clientes();">
                        <i class="c-icon c-icon-1xl cil-user"></i> Usuarios
                    </b>
                </td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>