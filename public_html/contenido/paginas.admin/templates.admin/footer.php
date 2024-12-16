

<!-- MODAL_LARGE -->
<div class="modal fade" id="MODAL_LARGE" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="MODAL_LARGE__title"></h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">x</span></button>
            </div>
            <div class="modal-body">
                <div id="MODAL_LARGE__body"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
                <!--   <button class="btn btn-primary" type="button">Save changes</button>-->
            </div>
        </div>
    </div>
</div>


<footer class="c-footer">
    <div><a href="">OFICINA</a> &reg; 2020</div>
    <div class="ml-auto">Creado por &nbsp;<a href="">NEMABOL</a></div>
</footer>
</div>
</div>

<!-- FUNCTION cerrar_sesion -->
<script>
    function cerrar_sesion() {
        $.ajax({
            url: 'contenido/paginas.admin/ajax/ajax.logout.php',
            type: 'POST',
            dataType: 'html',
            success: function () {
                location.href = '<?php echo $dominio.'oficina'; ?>';
            }
        });
    }
</script>


</body>
</html>