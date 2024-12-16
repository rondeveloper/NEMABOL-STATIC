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

/* data requerida */
$id_administrador = administrador('id');
$rqdu1 = query("SELECT c.id FROM clientes_usuarios u INNER JOIN clientes c ON u.id_cliente=c.id WHERE u.id='$id_administrador' LIMIT 1 ");
$rqdu2 = fetch($rqdu1);
$id_cliente = $rqdu2['id'];

$__ajaxpage_tablename = 'datos_paginaweb';
$data_required = " * ";
$registros = query("SELECT $data_required FROM $__ajaxpage_tablename WHERE id_cliente='$id_cliente' ");
$registro = fetch($registros);

$url_paginaweb = $dominio.'webpage-destist/';
?>
<table class="table table-responsive-sm table-bordered table-striped table-sm">
    <thead>
        <tr>
            <th>Dato</th>
            <th>Valor</th>
            <th>Descrici&oacute;n</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>URL de la web:</td>
            <td><a href="<?php echo $url_paginaweb; ?>" target="_blank">https://www.<?php echo $registro['subdominio']; ?>.eco.bo</a></td>
            <td>Info de la web</td>
        </tr>
        <tr>
            <td>Titulo:</td>
            <td><?php echo $registro['titulo']; ?></td>
            <td>Info de la web</td>
        </tr>
        <tr>
            <td>Logotipo:</td>
            <td><?php echo $registro['logotipo']; ?></td>
            <td>Info de la web</td>
        </tr>
    </tbody>
</table>