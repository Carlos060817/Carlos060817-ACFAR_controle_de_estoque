<?php
include_once 'functions.php';
include_once HEADER_TEMPLATE;
\Usuarios\index();
?>
<div class="container">
    <header>
        <div style="margin-top: 60px">
            <div class="row">

                <div class="col-sm-6">
                    <h2 class="display-4"><i class="fas fa-users-cog text-primary" aria-hidden="true"></i>
                        Usuários</h2>
                </div>

                <div class="col-sm-6 text-right">
                    <a href="usuario.php" class="btn btn-outline-primary"><i class="fas fa-plus"></i> Novo Usuário</a>
                    <a href="index.php" class="btn btn-outline-success"><i class="fas fa-redo-alt"></i>Atualizar</a>
                </div>
            </div>
        </div>
    </header>

    <?php
    if (!empty($_SESSION['message'])) {
        ?>
        <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dimiss="alert" aria-label="Close"><span aria-hidden="true">x</span>
            </button>
            <?php echo $_SESSION['message']; ?>
        </div>
        <?php
        unset($_SESSION['message']);
    }
    ?>
    <hr>

    <table class="table table-hover table-striped" id="tableindex1" style="margin-bottom: 60px">
        <thead class="bg-gradient-primary">
        <tr>
            <td>ID</td>
            <td>Login</td>
            <td>Nome</td>
            <td class="text-right">Opções</td>
        </tr>
        </thead>
        <tbody>
        <?php
        if ($usuarios) {
            foreach ($usuarios as $usuario) {
                ?>
                <tr>
                    <td><?php echo $usuario['id']; ?></td>
                    <td><?php echo $usuario['login']; ?></td>
                    <td><?php echo $usuario['nome']; ?></td>

                    <td class="actions text-right">
                        <a href="view.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-outline-success">
                            <i class="fas fa-eye"></i> Visualizar</a>

                        <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-sm btn-outline-warning">
                            <i class="fas fa-edit"></i> Editar</a>

                        <a class="btn btn-sm btn-outline-danger" href="#" data-toggle="modal"
                           data-target="#delete-modal" data-usuario="<?php echo $usuario['id']; ?>">
                            <i class="fa fa-trash"></i> Excluir
                        </a>
                    </td>

                </tr>
                <?php
            }

        } else {
            ?>
            <tr>
                <td colspan="4">
                    Nenhum registro encontrado!!!
                </td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Excluir item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modalcontent">
                <p>Deseja excluir este item?</p>
            </div>
            <div class="modal-footer">
                <a href="" id="confirm" class="btn btn-danger">Sim</a>
                <a href="" id="cancel" class="btn btn-primary">Não</a>
            </div>
        </div>
    </div>
</div>

<?php include(FOOTER_TEMPLATE); ?>

<script type="text/javascript">
    $('#delete-modal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = button.data('usuario');
        var modal = $(this);
        modal.find('.modal-title').text('Excluir item: ' + id);
        modal.find('#modalcontent').text('Deseja realmente excluir o usuario ID: ' + id + '?');
        modal.find('#confirm').attr('href', 'delete.php?id=' + id);
    })
</script>

