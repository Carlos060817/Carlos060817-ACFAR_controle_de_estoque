<?php


require_once 'functions.php';
require_once '../cadastro/functions.php';
require_once '../usuarios/functions.php';
require_once '../produto/functions.php';
require_once 'edit.php';
require_once 'view.php';
include_once HEADER_TEMPLATE;
requerimento();
bd();//dados da tabela


$link = open_database();
if ($link) {
} else {
    echo "Erro";
}
?>

<div class="container">
<link rel="stylesheet" href="pedidos6.css">
<main>
    <!-- inicio do modal para criar o pedido o.o -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-shopping-cart"></i> Pedido</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-sm">
                        <form class="letras" method="post">
                            <dt>
                                <label for="cliente"><p>Cliente:</label>
                                <select name="pedido['id_cadastro']">
                                    <?php
                                    \Clientes\index();
                                    if ($cadastros) {
                                        foreach ($cadastros as $cadastro) {
                                            echo '<option value="' . $cadastro['id'] . '" >' .
                                                $cadastro['nome'] . '</option> ';
                                        } ?>
                                    <?php } ?>
                                </select>
                                <label for="cliente"><p>Vendedor:</label>
                                <input type="text" id="empresa" value="<?php echo $_SESSION['usuario'] ?>"
                                       class="form-control" disabled>
                                <input name="pedido['id_vendedor']" type="hidden" value="<?php echo $_SESSION['id_usuario'] ?>">

                                <label for="cliente"><p>Item:</label>
                                <select name="pedido['id_produto']">
                                    <?php
                                    \Produtos\index();
                                    if ($produtos) {
                                        foreach ($produtos as $produto) {
                                            echo '<option value="' . $produto['id'] . '" >' .
                                                $produto['nome'] . '</option> ';
                                        }
                                    }
                                    ?>
                                </select>
                                <label for="estado"><p>Prioridade:</label>
                                <select class="form-control_prioridade" name="pedido['prioridade']" id="area"
                                        onchange="changeSelect();" required>
                                    <option>Mediana</option>
                                    <option>Baixa</option>
                                    <option>Alta</option>
                                </select>
                                <label for="transportadora"><p>Transportadora:</label>
                                <input class="form-control_transportadora" type="text" name="pedido['transportadora']"
                                       required>
                                <label for="estado"><p>Quantidade:</label>
                                <input class="form-control_quantidade" type="number" name="pedido['quantidade']"
                                       required>
                                <!--label for="estado"><p>Valor:</label>
                                <input class="form-control_valor" type="number" name="pedido['valor']" required-->
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-outline-primary"><i
                                    class="fas fa-save"></i> Salvar
                        </button>
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- cabeçalho do main -->
    <header style="margin-top: 60px">
        <div class="row">
            <div class="col-sm-6">
                <h2 class="display-4"><i class="fas fa-shopping-cart"></i> Pedidos</h2>
            </div>
            <div class="col-sm text-right">
                <a class="btn btn-primary" type="button" data-toggle="modal" data-target="#exampleModal"><i
                            class="fas fa-plus"></i> Criar pedido</a>
                <a class="btn btn-dark" href="pedidos.php"><i class="fas fa-sync-alt"></i> Atualizar</a>
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
    <!-- INICIO DA TABELA -->

    <table class="table table-hover table-striped" id="pedidos" style="margin-bottom: 60px">
        <thead class="bg-gradient-info">
        <tr>
            <th scope="col">Pedido</th>
            <th scope="col">Item</th>
            <th scope="col">Cliente</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Prioridade</th>
            <th scope="col">Data</th>
            <th class="text-right" scope="col"></th>
        </tr>
        </thead>

        <tbody style="margin-bottom: auto">
        <?php
        if ($pedidos) {
            foreach ($pedidos as $pedido) {
                ?>

                <div class="conteudo">
                    <tr>
                        <th><?php echo $pedido['id'] ?></th>
                        <th><?php
                            \Produtos\view($pedido['id_produto']);
                            $nomeProduto = $produto['nome'];
                            echo $produto['nome'];
                            ?></th>
                        <th><?php
                            \Clientes\view($pedido['id_cadastro']);
                            $nomeCliente = $cadastro['nome'] ;
                            echo $cadastro['nome'] ;
                            ?></th>
                        <th><?php echo $pedido['quantidade'] ?></th>
                        <th><?php echo $pedido['prioridade'] ?></th>
                        <th>
                            <?php
                            $date = new DateTime( $pedido['data_pedido'] );
                            echo $date-> format( 'd/m/Y' );
                            ?>
                        </th>

<?php
\Usuarios\view($pedido['id_vendedor']);
$nomeVendedor = $pedido['id_vendedor'] ;
?>
                        <th class="actions text-right" >
                            <a class="btn btn-outline-success" type="button" data-toggle="modal" data-target="#exampleModal3"
                               data-whatever="<?php echo $pedido['id']; ?>"
                               data-whateverid2="<?php echo $pedido['id']; ?> "
                               data-whateveridcadastro="<?php echo $nomeCliente; ?>"
                               data-whateveridvendedor="<?php echo $nomeVendedor; ?>"
                               data-whateveridproduto="<?php echo $produto['nome']; ?>"
                               data-whateverquantidade="<?php echo $pedido['quantidade']; ?>"
                               data-whatevertransportadora="<?php echo $pedido['transportadora']; ?>"
                               data-whatevervalor="<?php echo $pedido['valor']; ?>"
                               data-whateverprioridade="<?php echo $pedido['prioridade']; ?>"><i class="fas fa-eye"></i>
                                Visualizar</a>
                           <!-- <a class="btn btn-outline-warning" type="button" data-toggle="modal" data-target="#exampleModal2"
                               data-whatever="<?php echo $pedido['id']; ?>"
                               data-whateverid2="<?php echo $pedido['id']; ?> "
                               data-whateveridcadastro="<?php echo $pedido['id_cadastro']; ?>"
                               data-whateveridvendedor="<?php echo $pedido['id_vendedor']; ?>"
                               data-whateveridproduto="<?php echo $pedido['id_produto']; ?>"
                               data-whateverquantidade="<?php echo $pedido['quantidade']; ?>"
                               data-whatevertransportadora="<?php echo $pedido['transportadora']; ?>"
                               data-whatevervalor="<?php echo $pedido['valor']; ?>"
                               data-whateverprioridade="<?php echo $pedido['prioridade']; ?>"><i class="fa fa-cogs"></i>
                                Editar</a>-->
                            <a class="btn btn-outline-danger" href="delete.php?id=<?php echo $pedido['id']; ?>"><i
                                        class="fa fa-times-circle"></i> finalizar</a>
                        </th>
                    </tr>
                </div>
                <?php
            }
        } else { # Caso não apresente nenhum dado a tabela ira mostrar o conteudo logo a baixo
            ?>
            <tr class="table-success">
                <th>Nenhum pedido encontrado</th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</div>
    <?php
    include_once FOOTER_TEMPLATE;
    ?>

    <!-- SCRIPT PARA SALVAR A INFORMAÇÃO PRO EDIT E O DE BAIXO ALTERA AS CLASSES PARA O VIEW-->
    <script type="text/javascript">
        $('#exampleModal2').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipientid2 = button.data('whateverid2');
            var recipientid = button.data('whatever');
            var recipientidcadastro = button.data('whateveridcadastro');
            var recipientidvendedor = button.data('whateveridvendedor');
            var recipientidproduto = button.data('whateveridproduto');
            var recipientquantidade = button.data('whateverquantidade');
            var recipienttransportadora = button.data('whatevertransportadora');
            var recipientvalor = button.data('whatevervalor');
            var recipientprioridade = button.data('whateverprioridade');
            var modal = $(this)
            modal.find('.form-control_id2').val(recipientid)
            modal.find('.modal-title').text('Pedido: ' + recipientid2)
            modal.find('.form-control_pedido').val(recipientidcadastro)
            modal.find('.form-control_vendedor').val(recipientidvendedor)
            modal.find('.form-control_produto').val(recipientidproduto)
            modal.find('.form-control_transportadora').val(recipienttransportadora)
            modal.find('.form-control_valor').val(recipientvalor)
            modal.find('.form-control_prioridade').val(recipientprioridade)
            modal.find('.form-control_quantidade').val(recipientquantidade)
            //console.log()
        })
    </script>
    <!-- SCRIPT PARA SALVAR A INFORMAÇÃO PRO VIEW-->
    <script type="text/javascript">
        $('#exampleModal3').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var recipientid2 = button.data('whateverid2');
            var recipientidcadastro = button.data('whateveridcadastro');
            var recipientidvendedor = button.data('whateveridvendedor');
            var recipientidproduto = button.data('whateveridproduto');
            var recipientquantidade = button.data('whateverquantidade');
            var recipienttransportadora = button.data('whatevertransportadora');
            var recipientvalor = button.data('whatevervalor');
            var recipientprioridade = button.data('whateverprioridade');
            var modal = $(this)
            modal.find('.form-control_id2').text(recipientid2)
            modal.find('.modal-title').text('Pedido: ' + recipientid2)
            modal.find('.form-control_pedido').text(recipientidcadastro)
            modal.find('.form-control_vendedor').text(recipientidvendedor)
            modal.find('.form-control_produto').text(recipientidproduto)
            modal.find('.form-control_transportadora').text(recipienttransportadora)
            modal.find('.form-control_valor').text(recipientvalor)
            modal.find('.form-control_prioridade').text(recipientprioridade)
            modal.find('.form-control_quantidade').text(recipientquantidade)
            //console.log()
        })
    </script>
</main>