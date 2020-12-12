<?php
require_once 'functions.php';
require_once '../cadastro/functions.php';
require_once '../produto/functions.php';
include_once HEADER_TEMPLATE;
\Expedicao\index();
?>
    <div class="container" style="margin-top: 30px">
        <div class="row">
            <div class="col-12 text-center my-4">
                <h1 class="display-4"><i class="fas fa-truck text-primary" aria-hidden="true"></i>
                    Expedição
                </h1>
            </div>
            <div class="col-lg-12" style="margin-top: 20px">
                <table class="table table-hover table-striped" id="saldoAtual" style="margin-bottom: 60px">
                    <thead class="bg-gradient-primary">
                    <tr>
                        <th>Pedido</th>
                        <th>Produto</th>
                        <th>Cliente</th>
                        <th>Status</th>
                        <th>Transportadora</th>
                        <th class="text-center">Visualizar</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if ($expedicoes) {
                        foreach ($expedicoes as $expedicao) {
                            ?>
                            <tr>
                                <td><?php echo $expedicao['id']; ?></td>
                                <td><?php
                                    \Produtos\view($expedicao['id_produto']);
                                    echo $produto['nome'];
                                    ?>
                                </td>
                                <td><?php
                                    \Clientes\view($expedicao['id_cadastro']);
                                    echo $cadastro['nome'];
                                    ?>
                                </td>

                                <td><?php
                                    echo $expedicao['estatus'];
                                    ?>
                                </td>
                                <td><?php
                                    echo $expedicao['transportadora'];
                                    ?>
                                </td>
                                <td class="text-center">
                                    <a href="view.php?id=<?php echo $expedicao['id']; ?>" class="btn btn-outline-dark">
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
        </div>
    </div>


<?php include(FOOTER_TEMPLATE); ?>
<?php
