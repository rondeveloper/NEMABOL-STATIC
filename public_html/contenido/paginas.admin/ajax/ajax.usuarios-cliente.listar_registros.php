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

$__ajaxpage_tablename = 'clientes_usuarios';

$registros = query("SELECT * FROM $__ajaxpage_tablename ");
?>
<table class="table table-responsive-sm table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Nick</th>
            <th>Estado</th>
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
                <td><?php echo $registro['nick']; ?></td>
                <td><span class="badge badge-success">Activo</span></td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
<nav>
    <ul class="pagination">
        <li class="page-item"><a class="page-link">Pagina:</a></li>
        <li class="page-item active"><a class="page-link">1</a></li>
    </ul>
</nav>