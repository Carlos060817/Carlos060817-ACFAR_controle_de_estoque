<?php
require_once('functions.php');
\Produtos\index();
include(HEADER_TEMPLATE);
?>
<div class="container">
<header style="margin-top: 30px">
    <div class="row">
        <div class="col-sm-12 text-center my-4">
            <h1 class="display-4"><i class="fa fa-paper-plane text-primary" aria-hidden="true"></i>
                PRODUTOS CADASTRADOS
            </h1>
        </div>
        <div class="col-sm-12 text-right h2">
            <a class="btn btn-outline-success" href="visualizar.php"><i class="fas fa-redo-alt"></i> Atualizar</a>
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

<table id="produto" class="table table-hover table-striped" style="margin-bottom: 10px">
    <thead class="bg-gradient-info">
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
                    <a href="view1.php?id=<?php echo $produto['id']; ?>" class="btn btn-outline-dark">
                        <i class="fas fa-eye"></i> Visualizar</a>

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
</div>


<?php include(FOOTER_TEMPLATE); ?>

</body>
</html>

