<?php
require_once 'functions.php';
require_once '../cadastro/functions.php';
require_once '../usuarios/functions.php';
require_once '../produto/functions.php';

include_once HEADER_TEMPLATE;
\Expedicao\view($_GET['id']);
?>
<div class="container">
    <ul style="margin-bottom: 40px">
        <header style="margin-top: 40px">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Pedido: <?php echo $expedicao['id']; ?></h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a class="btn btn-outline-dark" href="index.php"><i class="fas fa-redo-alt"></i> Voltar</a>
                </div>
            </div>
        </header>
        <hr>
        <div class="row" style="margin-top: 30px">
            <div class="col-sm-6">
                <dl>
                    <dt>cliente:</dt>
                    <dd><?php
                        \Clientes\view($expedicao['id_cadastro']);
                        echo $cadastro['nome'];
                        ?>
                    </dd>

                </dl>

                <dl>
                    <dt>Produto:</dt>
                    <dd><?php
                        \Produtos\view($expedicao['id_produto']);
                        echo $produto['nome'];
                        ?>
                    </dd>

                </dl>


                <dl>
                    <dt>Quantidade:</dt>
                    <dd><?php echo $expedicao['quantidade']; ?></dd>

                </dl>
                <dl>
                    <dt>Valor:</dt>
                    <dd><?php echo $expedicao['valor']; ?></dd>

                </dl>

            </div>
            <div class="col-sm-6">


                <dl>
                    <dt>Transportadora:</dt>
                    <dd><?php echo $expedicao['transportadora']; ?></dd>

                </dl>

                <dl>
                    <dt>Data do Pedido:</dt>
                    <dd><?php echo $expedicao['data_pedido']; ?></dd>

                </dl>
                <dl>
                    <dt>Data de Expedição:</dt>
                    <dd><?php echo $expedicao['data_finalizado'];
                       ?></dd>
                </dl>
                <dl>
                    <dt>Nome do Vendedor:</dt>
                    <dd><?php
                        \Usuarios\view($expedicao['id_vendedor']);
                        echo $usuario['nome'];
                        ?>
                    </dd>
                </dl>

            </div>
        </div>
    </ul>
</div>
<?php
include_once FOOTER_TEMPLATE;
?>
