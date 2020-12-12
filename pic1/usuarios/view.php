<?php
require_once 'functions.php';

include_once HEADER_TEMPLATE;
\Usuarios\view($_GET['id']);
?>
<div class="container">
    <header style="margin-top: 60px">
        <div class="row">
            <div class="col-sm-6">
                <h2>Usuario ID:<?php echo $usuario['id']; ?></h2>
            </div>
            <div class="col-sm-6 text-right">
                <a href="edit.php?id=<?php echo $usuario['id']; ?>" class="btn btn-outline-primary"><i
                            class="fas fa-sync-alt"></i> Editar</a>
                <a href="index.php" class="btn btn-outline-danger"><i class="fas fa-backward"></i>Voltar</a>
            </div>
        </div>
    </header>
    <hr>
    <div class="row">
        <div class="col-sm-6">
            <dl>
                <dt>Login:</dt>
                <dd><?php echo $usuario['login']; ?></dd>

            </dl>

            <dl>
                <dt>Nome do usuario:</dt>
                <dd><?php echo $usuario['nome']; ?></dd>

            </dl>

            <dl>
                <dt>Tipo de acesso:</dt>
                <dd><?php echo $usuario['tipo']; ?></dd>

            </dl>

            <dl>
                <dt>Criando em:</dt>
                <dd><?php echo $usuario['criado']; ?></dd>

            </dl>
        </div>

        <div class="col-sm-6">
            <dl>
                <dt>Email:</dt>
                <dd><?php echo $usuario['email']; ?></dd>

            </dl>

            <dl>
                <dt>Telefone:</dt>
                <dd><?php echo $usuario['telefone']; ?></dd>

            </dl>

            <dl>
                <dt>Endereco:</dt>
                <dd><?php echo "<b>Cidade:</b> " . $usuario['cidade'] . "<br><b> Rua:</b> " . $usuario['endereco'] .
                        "<br><b> Número: </b>" .
                        $usuario['numero'] . "<b><br>Bairro:</b> " . $usuario['bairro']; ?></dd>

            </dl>

            <dl>

                <?php if ($usuario['tipo'] == 0) { ?>
                    <dt>Cpf :</dt>
                    <dd><?php echo $usuario['cpf']; ?></dd>
                <?php } elseif ($usuario['tipo'] == 1) { ?>
                    <dt>Cnpj :</dt>
                    <dd><?php echo $usuario['cnpj']; ?></dd>
                <?php } else { ?>
                    <dt>Cpf :</dt>
                    <dd><?php echo $usuario['cpf']; ?></dd>
                <?php } ?>
            </dl>
        </div>
    </div>
</div>
<?php
include_once FOOTER_TEMPLATE;
?>
