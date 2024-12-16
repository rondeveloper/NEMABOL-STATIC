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

$__ajaxpage_tablename = 'administradores';

$registros = query("SELECT * FROM $__ajaxpage_tablename ");
?>
<table class="table table-responsive-sm table-hover table-outline mb-0">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Celular</th>
            <th>Servicios</th>
            <th>Estado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $cnt = 0;
        while ($registro = fetch($registros)) {
            ?>
            <tr>
                <td><?php echo ++$cnt; ?></td>
                <td><?php echo $registro['nombre']; ?></td>
                <td><?php echo $registro['email']; ?></td>
                <td><?php echo $registro['celular']==''?'Sin dato':$registro['celular']; ?></td>
                <td><span class="badge badge-success">CURSOS.BO</span></td>
                <td>Activo</td>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>

<!--<br>
<hr>
<br>
<nav>
    <ul class="pagination">
        <li class="page-item"><a class="page-link">Prev</a></li>
        <li class="page-item active"><a class="page-link">1</a></li>
        <li class="page-item"><a class="page-link">2</a></li>
        <li class="page-item"><a class="page-link">3</a></li>
        <li class="page-item"><a class="page-link">4</a></li>
        <li class="page-item"><a class="page-link">Next</a></li>
    </ul>
</nav>-->

