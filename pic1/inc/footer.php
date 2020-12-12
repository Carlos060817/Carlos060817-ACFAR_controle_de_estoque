
<footer class="navbar navbar-expand-lg navbar-light bg-light footer fixed-bottom">
    <div class="container">
        <hr>
        <p class="text-muted">&copy;2020 - ACFAR LTDA</p>
    </div>
</footer>

<script src="<?php echo BASEURL; ?>node_modules/jquery/dist/jquery.js"></script>
<script src="<?php echo BASEURL; ?>node_modules/popper.js/dist/umd/popper.js"></script>
<script src="<?php echo BASEURL; ?>node_modules/bootstrap/dist/js/bootstrap.js"></script>
<script src="<?php echo BASEURL; ?>node_modules/fonts/js/all.js"></script>
<script src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<script>
    $(document).ready( function () {
        $('#saldoAtual').DataTable();
        $('#inventario').DataTable();
        $('#clientes').DataTable();
        $('#produto').DataTable();
        $('#usuariosAcfar').DataTable();
        $('#tableindex1').DataTable();
        $('#pedidos').DataTable();
    } );
</script>
</body>
</html>
