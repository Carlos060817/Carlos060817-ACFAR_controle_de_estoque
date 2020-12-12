<?php
require_once('functions.php');
\Produtos\index();
include(HEADER_TEMPLATE);
?>
<div class="container">
    <header style="margin-top: 40px">
        <div class="row">
            <div class="col-sm-12 text-center my-4">
                <h1 class="display-4"><i class="fas fa-cart-arrow-down text-primary" aria-hidden="true"></i>
                    PRODUTOS CADASTRADOS
                </h1>
            </div>
            <div class="col-sm-12 text-right h2">
                <a class="btn btn-outline-primary " href="produto.php"><i class="fas fa-plus"></i> Novo Produto</a>
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
    <table id="produto" class="table table-hover table-striped" style="margin-bottom: 60px">
        <thead class="bg-gradient-primary">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Quantidade</th>
            <th>Preço</th>
            <th>Marca</th>
            <th class="text-right">Opções</th>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($produtos) {
            foreach ($produtos as $produto) {
                ?>
                <tr>
                    <td><?php echo $produto['id']; ?></td>
                    <td><?php echo $produto['nome']; ?></td>
                    <td><?php echo $produto['quantidade']; ?></td>
                    <td><?php echo $produto['preco']; ?></td>
                    <td><?php echo $produto['marca']; ?></td>
                    <td class="actions text-right">
                        <a href="view.php?id=<?php echo $produto['id']; ?>" class="btn btn-outline-dark">
                            <i class="fas fa-eye"></i> Visualizar</a>

                        <a href="edit.php?id=<?php echo $produto['id']; ?>" class="btn btn-outline-warning">
                            <i class="fas fa-edit"></i> Editar</a>

                        <a class="btn btn-outline-danger" href="#" data-toggle="modal" data-target="#delete-modal"
                           data-produto="<?php echo $produto['id']; ?>">
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
        <div class="modal-dialog"  role="document">
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
        var id = button.data('produto');
        var modal = $(this);
        modal.find('#modalLabel').text('Excluir item: ' + id);
        modal.find('#confirm').attr('href', 'delete.php?id=' + id);
    })
</script>


</body>
</html>

