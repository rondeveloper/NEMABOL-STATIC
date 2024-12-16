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

$__page_filename = 'solicitudes-afiliacion';
$__ajaxpage_tablename = 'solicitudes_afiliacion';

$registros = query("SELECT s.*,(t.punto)dr_punto,(d.nombre)dr_departamento FROM $__ajaxpage_tablename s INNER JOIN tipo_puntos t ON s.id_tipo_punto=t.id INNER JOIN departamentos d ON s.id_departamento=d.id ORDER BY s.id DESC ");
?>
<table class="table table-responsive-sm table-hover table-outline mb-0">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>TIPO DE PUNTO</th>
            <th>DEPARTAMENTO</th>
            <th>DATOS</th>
            <th class="text-center">INTERNET</th>
            <th class="text-center">IMPRESORA</th>
            <th>FOTOS</th>
            <th>ACTIVACION</th>
            <th>AUTENTIFICACI&Oacute;N</th>
            <th>ACCIONES</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $cnt = num_rows($registros);
        while ($registro = fetch($registros)) {
            ?>
            <tr>
                <td><?php echo $cnt--; ?></td>
                <td>
                    <?php echo $registro['dr_punto']; ?>
                    <br>
                    <b>RS00<?php echo $registro['id']; ?></b>
                </td>
                <td><?php echo strtoupper($registro['dr_departamento']); ?></td>
                <td>
                    <b>Nombre:</b> <?php echo $registro['nombre']; ?>
                    <br>
                    <b>NIT:</b> <?php echo $registro['nit']; ?>
                    <br>
                    <b>Direcci&oacute;n:</b> <?php echo $registro['direccion']; ?>
                    <br>
                    <b>Correo:</b> <?php echo $registro['correo']; ?>
                    <br>
                    <b>Celular:</b> <?php echo $registro['celular']; ?>
                    &nbsp;&nbsp;
                    <a href="https://api.whatsapp.com/send?phone=591<?php echo $registro['celular']; ?>&text=" target="_blank">
                    <img src="https://cursos.bo/contenido/imagenes/wapicons/wap-init-0.jpg" style="height: 25px;border-radius: 20%;cursor:pointer;">
                    </a>
                </td>
                <td class="text-center"><?php echo $registro['sw_internet_disponible']=='1'?'SI':'NO'; ?></td>
                <td class="text-center"><?php echo $registro['sw_impresora_disponible']=='1'?'SI':'NO'; ?></td>
                <td>
                    <?php echo $registro['foto_negocio_1']==''?'':'<a href="contenido/imagenes/solicitudes/'.$registro['foto_negocio_1'].'" target="_blank">foto 1</a><br>'; ?>
                    <?php echo $registro['foto_negocio_2']==''?'':'<a href="contenido/imagenes/solicitudes/'.$registro['foto_negocio_2'].'" target="_blank">foto 2</a><br>'; ?>
                    <?php echo $registro['foto_negocio_3']==''?'':'<a href="contenido/imagenes/solicitudes/'.$registro['foto_negocio_3'].'" target="_blank">foto 3</a><br>'; ?>
                    <?php echo $registro['foto_nit']==''?'':'<a href="contenido/imagenes/solicitudes/'.$registro['foto_nit'].'" target="_blank">foto nit</a>'; ?>
                </td>
                <td>
                    <?php 
                    if($registro['sw_activado']=='1'){
                        echo '<span class="badge badge-success">Activado</span>';
                    }else{
                        echo '<span class="badge badge-info">En espera</span>';
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if($registro['estado']=='2'){
                        echo '<span class="badge badge-warning">Autentificado</span>';
                    }else{
                        echo '<span class="badge badge-default">No autentificado</span>';
                    }
                    ?>
                </td>
                <td>
                    <?php 
                    if($registro['sw_activado']=='0'){
                        ?>
                        <b class="btn btn-success btn-sm" data-toggle="modal" data-target="#MODAL_LARGE" onclick="activar('<?php echo $registro['id']; ?>');">ACTIVAR</b>
                        <?php
                    }
                    ?>
                </td>
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


<!-- FUNCTION agregar_administrador -->
<script>
    function activar(id_solicitud){
        $("#MODAL_LARGE__title").html('ACTIVAR SOLICITUD');
        $("#MODAL_LARGE__body").html('Cargando...');
        $.ajax({
            url: 'contenido/paginas.admin/ajax/ajax.<?php echo $__page_filename; ?>.activar.php',
            type: 'POST',
            data: {id_solicitud: id_solicitud},
            dataType: 'html',
            success: function (data) {
                $("#MODAL_LARGE__body").html(data);
                //listar_registros();
            }
        });
    }
</script>