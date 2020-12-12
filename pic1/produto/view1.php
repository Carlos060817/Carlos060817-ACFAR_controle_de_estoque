<?php
require_once '../usuarios/functions.php';
require_once 'functions.php';

include_once HEADER_TEMPLATE;
\Produtos\view($_GET['id']);
?>
<div class="container">
    <ul style="margin-bottom: 60px">
        <header style="margin-top: 60px">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Produto ID:<?php echo $produto['id']; ?></h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="visualizar.php" class="btn btn-outline-danger"><i class="fas fa-backward"></i> Voltar</a>
                </div>
            </div>
        </header>
        <hr>
        <div class="row">
            <div class="col-sm-6">
                <dl>
                    <dt>nome:</dt>
                    <dd><?php echo $produto['nome']; ?></dd>

                </dl>

                <dl>
                    <dt>Email_juridico:</dt>
                    <dd><?php
                        \Usuarios\view($produto['id_usuario']);
                        echo "ID: " . $produto['id_usuario'] . "<br> Nome: " . $usuario['nome'];
                        ?>
                    </dd>

                </dl>

                <dl>
                    <dt>Data:</dt>
                    <dd><?php echo $produto['criado']; ?></dd>

                </dl>
            </div>
            <div class="col-sm-6">

                <dl>
                    <dt>Descrição:</dt>
                    <dd><?php echo $produto['descricao']; ?></dd>

                </dl>

                <dl>
                    <dt>Quantidade:</dt>
                    <dd><?php echo $produto['quantidade']; ?></dd>

                </dl>

                <dl>
                    <dt>Valor:</dt>
                    <dd><?php echo $produto['preco']; ?></dd>

                </dl>
                <dl>
                    <dt>Marca:</dt>
                    <dd><?php echo $produto['marca']; ?></dd>

                </dl>
            </div>
        </div>
    </ul>

</div>

<?php
include_once FOOTER_TEMPLATE;
?>

