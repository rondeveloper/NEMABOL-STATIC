<?php

$__page_nombre = 'Administradores';
$__page_filename = 'administradores';
?>
<div class="c-subheader px-3">
    <!-- Breadcrumb-->
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="<?php echo $dominio.'admin'; ?>">Inicio</a></li>
        <li class="breadcrumb-item active"><?php echo $__page_nombre; ?></li>
        <!-- Breadcrumb Menu-->
    </ol>
</div>
<main class="c-main">
    <div class="container-fluid">
        <div class="fade-in">
            <!-- /.row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <span class="card-title"><i class="fa fa-align-justify"></i> <?php echo strtoupper($__page_nombre); ?></span>
                            <div class="card-header-actions">
                                <b class="btn btn-success btn-sm" data-toggle="modal" data-target="#MODAL_LARGE" onclick="agregar_administrador();"><i class="c-icon c-icon-1xl cil-user-follow"></i> AGREGAR</b>
                            </div>
                        </div>
                        <div class="card-body">
                            
                            <!-- AJAXCONTENT -->
                            <div id="AJAXCONTENT-listar_registros">Cargando datos...</div>
                            
                        </div>
                    </div>                    
                </div>
                <!-- /.col-->
            </div>
            <!-- /.row-->
        </div>
    </div>
</main>


<script>
    function listar_registros() {
        $.ajax({
            url: 'contenido/paginas.admin/ajax/ajax.<?php echo $__page_filename; ?>.listar_registros.php',
            type: 'POST',
            dataType: 'html',
            success: function (data) {
                $("#AJAXCONTENT-listar_registros").html(data);
            }
        });
    }
</script>

<script>
    listar_registros();
</script>


<!-- FUNCTION agregar_administrador -->
<script>
    function agregar_administrador(){
        $("#MODAL_LARGE__title").html('AGREGAR ADMINISTRADOR');
        $("#MODAL_LARGE__body").html('Cargando...');
        $.ajax({
            url: 'contenido/paginas.admin/ajax/ajax.<?php echo $__page_filename; ?>.agregar_administrador.php',
            type: 'POST',
            dataType: 'html',
            success: function (data) {
                $("#MODAL_LARGE__body").html(data);
            }
        });
    }
</script>