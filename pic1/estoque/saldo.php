<?php
require_once 'functions.php';
include_once HEADER_TEMPLATE;
\Estoque\index();
?>
<div class="container" style="margin-top: 30px">
    <div class="row">
        <div class="col-12 text-center my-4">
            <h1 class="display-4"><i class="fas fa-cubes text-primary" aria-hidden="true"></i>
                SALDO ATUAL
            </h1>
        </div>
        <div class="col-lg-12" style="margin-top: 20px">
            <table class="table table-hover table-striped" id="saldoAtual" style="margin-bottom: 60px">
                <thead class="bg-gradient-primary">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Quantidade</th>
                    <th>Preço</th>


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
    </div>
</div>


<?php include(FOOTER_TEMPLATE); ?>
