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
                    <h2><i class="fas fa-clipboard"></i> Visualizar Produto </h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="edit.php?id=<?php echo $produto['id']; ?>" class="btn btn-outline-primary"><i
                                class="fas fa-sync-alt"></i> Editar</a>
                    <a href="index1.php" class="btn btn-outline-danger"><i class="fas fa-backward"></i>Voltar</a>
                </div>
            </div>
        </header>
        <hr>
        <body>
            <div class="row">
                <div class="col-sm-6">
                    <dl>
                        <dt>Produto ID:</dt>
                        <dd><?php echo $produto['id']; ?></dd>

                    </dl>

                    <dl>
                        <dt>nome:</dt>
                        <dd><?php echo $produto['nome']; ?></dd>

                    </dl>

                    <dl>
                        <dt>ID Juridico:</dt>
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
                <div class="col-sm-6 ">
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
        </body>
    </ul>
</div>
<?php
include_once FOOTER_TEMPLATE;
?>
