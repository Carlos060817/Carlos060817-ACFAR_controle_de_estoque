<?php
require_once('functions.php');
\Clientes\index();
include(HEADER_TEMPLATE);
?>
<div class="container">
    <header style="margin-top: 40px">
        <div class="row">
            <div class="col-sm-12 text-center my-4">
                <h1 class="display-4"><i class="fas fa-users text-primary" aria-hidden="true"></i>
                    CLIENTES CADASTRADOS
                </h1>
            </div>
            <div class="col-sm-12 text-right h2">
                <a class="btn btn-outline-primary " href="cadastro.php"><i class="fas fa-user-plus"></i> Novo
                    Cadastro</a>
                <a class="btn btn-outline-success" href="index1.php"><i class="fas fa-redo-alt"></i> Atualizar</a>
            </div>
        </div>
    </header>
    <?php
    if (!empty($_SESSION['message'])) {
        ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php
        unset($_SESSION['message']);
    }
    ?>
    <hr>


    <table class="table table-hover table-striped" id="clientes" style="margin-bottom: 60px">
        <thead class="bg-gradient-primary">
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Endereco</th>
            <th class="text-right">Opções</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($cadastros) {
            foreach ($cadastros as $cadastro) {
                ?>
                <tr>
                    <td><?php echo $cadastro['id']; ?></td>
                    <td><?php echo $cadastro['nome'] . " " . $cadastro['sobrenome']; ?></td>
                    <td><?php echo $cadastro['endereco']; ?></td>
                    <td class="actions text-right">
                        <a href="view.php?id=<?php echo $cadastro['id']; ?>" class="btn btn-outline-dark">
                            <i class="fas fa-eye"></i> Visualizar</a>

                        <a href="edit.php?id=<?php echo $cadastro['id']; ?>" class="btn btn-outline-warning">
                            <i class="fas fa-user-edit"></i> Editar</a>

                        <a class="btn btn-outline-danger" href="#" data-toggle="modal" data-target="#delete-modal"
                           data-cadastro="<?php echo $cadastro['id']; ?>">
                            <i class="fa fa-trash"></i> Excluir
                        </a>
                    </td>
                </tr>
                <?php
            }
        } else {
            ?>
            <tr>
                <td colspan="4">Nenhum registro encontrado.</td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <div class="modal fade" id="delete-modal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLabel">Excluir item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Deseja excluir este item?</p>
                </div>
                <div class="modal-footer">
                    <a href="" id="confirm" class="btn btn-danger">Sim</a>
                    <a href="" id="cancel" class="btn btn-primary">Não</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include(FOOTER_TEMPLATE); ?>


<script type="text/javascript">
    $('#delete-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('cadastro');
        var modal = $(this);
        modal.find('#modalLabel').text('Excluir item: '+id);
        modal.find('#confirm').attr('href','delete.php?id='+id);
    })
</script>


</body>
</html>

