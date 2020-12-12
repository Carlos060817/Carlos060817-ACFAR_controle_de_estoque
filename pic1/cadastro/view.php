<?php
require_once 'functions.php';

include_once HEADER_TEMPLATE;
\Clientes\view($_GET['id']);
?>
<div class="container">
    <ul style="margin-bottom: 60px">
        <header style="margin-top: 60px">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Cliente ID:<?php echo $cadastro['id']; ?></h2>
                </div>
                <div class="col-sm-6 text-right">
                    <a href="edit.php?id=<?php echo $cadastro['id']; ?>" class="btn btn-outline-primary"><i
                                class="fas fa-sync-alt"></i> Editar</a>
                    <a href="index1.php" class="btn btn-outline-danger"><i class="fas fa-backward"></i>Voltar</a>
                </div>
            </div>
        </header>
        <hr>
        <div class="row" style="margin-top: 30px">
            <div class="col-sm-6">
                <dl>
                    <dt>nome:</dt>
                    <dd><?php echo $cadastro['nome']; ?></dd>

                </dl>

                <dl>
                    <dt>Sobrenome:</dt>
                    <dd><?php echo $cadastro['sobrenome']; ?></dd>

                </dl>

                <dl>
                    <dt>Data de Inscrição:</dt>
                    <dd><?php echo $cadastro['criado']; ?></dd>

                </dl>
            </div>
            <div class="col-sm-6">

                <dl>
                    <dt>Endereço:</dt>
                    <dd><?php echo $cadastro['endereco']; ?></dd>

                </dl>

                <dl>
                    <dt>cidade:</dt>
                    <dd><?php echo $cadastro['cidade']; ?></dd>

                </dl>

                <dl>
                    <dt>Estado:</dt>
                    <dd><?php echo $cadastro['estado']; ?></dd>

                </dl>
            </div>
        </div>
    </ul>
</div>
<?php
include_once FOOTER_TEMPLATE;
?>
