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

$__ajaxpage_tablename = 'planes';

$registros = query("SELECT * FROM $__ajaxpage_tablename WHERE estado IN (1) ");
?>
<table class="table table-responsive-sm table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Pagina Web</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($registro = fetch($registros)) {
            ?>
            <tr>
                <td><?php echo $registro['nombre']; ?></td>
                <td><?php echo $registro['sw_paginaweb']==1 ? 'INCLUIDO' : 'NO INCLUIDO'; ?></td>
                <td><span class="badge badge-success">Activo</span></td>
            </tr>
            <?php
        }
        ?>
        <tr>
            <td>Zbynek Phoibos</td>
            <td>Zbynek Phoibos</td>
            <td><span class="badge badge-danger">Banned</span></td>
        </tr>
        <tr>
            <td>Einar Randall</td>
            <td>Einar Randall</td>
            <td><span class="badge badge-secondary">Inactive</span></td>
        </tr>
        <tr>
            <td>Felix Troels</td>
            <td>Felix Troels</td>
            <td><span class="badge badge-warning">Pending</span></td>
        </tr>
        <tr>
            <td>Aulus Agmundr</td>
            <td>Aulus Agmundr</td>
            <td><span class="badge badge-success">Active</span></td>
        </tr>
        <tr>
            <td>Vishnu Serghei</td>
            <td>Vishnu Serghei</td>
            <td><span class="badge badge-success">Active</span></td>
        </tr>
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