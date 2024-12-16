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

$__ajaxpage_tablename = 'pacientes';

$data_required = " p.nombres,p.apellidos,p.fecha_nacimiento,(ec.nombre)estado_civil,p.ocupacion ";
$registros = query("SELECT $data_required FROM $__ajaxpage_tablename p INNER JOIN estado_civil ec ON p.id_estado_civil=ec.id ");
?>
<table class="table table-responsive-sm table-bordered table-striped table-sm table-hover">
    <thead>
        <tr>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Edad</th>
            <th>Estado Civil</th>
            <th>Ocupaci&oacute;n</th>
            <th>Estado</th>
            <th>Historia</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while ($registro = fetch($registros)) {
            ?>
            <tr>
                <td><?php echo $registro['nombres']; ?></td>
                <td><?php echo $registro['apellidos']; ?></td>
                <td><?php echo $registro['fecha_nacimiento']; ?></td>
                <td><?php echo $registro['estado_civil']; ?></td>
                <td><?php echo $registro['ocupacion']; ?></td>
                <td><span class="badge badge-success">Activo</span></td>
                <td><b class="btn btn-info">HISTORIA CLINICA</b></td>
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