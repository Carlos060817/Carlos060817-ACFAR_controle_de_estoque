<?php
require_once 'functions.php';
include_once HEADER_TEMPLATE;
\Usuarios\edit();
?>
<div class="container" >
    <form action="" method="post"  style="margin-bottom: 60px">
        <header style="margin-top: 60px">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Atualizar Usuario</h2>
                </div>
                <div class="col-sm-6 text-right">
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i> Salvar</button>
                    <a href="index.php" class="btn btn-outline-danger"><i class="fas fa-times-circle"></i> Cancelar</a>
                </div>
            </div>
        </header>
        <hr>
        <div class="row">
            <div class="form-group col-md-6">

                <label for="login">login</label>
                <input type="text" id="login" placeholder="Digite o login do usuario" name="usuario['login']"
                       value="<?php echo $usuario['login']; ?>" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="nome">Nome</label>
                <input type="text" id="nome" placeholder="Digite o nome do usuario" name="usuario['nome']"
                       value="<?php echo $usuario['nome']; ?>" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="senha">Senha</label>
                <input type="text" id="senha" placeholder="Digite senha do usuario" name="usuario['senha']"
                       value="<?php echo $usuario['senha']; ?>" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Digite o email" name="usuario['email']"
                       value="<?php echo $usuario['email']; ?>" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="cidade">Cidade</label>
                <input type="text" id="cidade" placeholder="Digite cidade nova" name="usuario['cidade']"
                       value="<?php echo $usuario['cidade']; ?>" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="telefone">Telefone</label>
                <input type="number" id="telefone" placeholder="Digite telefone novo" name="usuario['telefone']"
                       value="<?php echo $usuario['telefone']; ?>" class="form-control" required>
            </div>

            <div class="form-group col-md-6">
                <label for="endereco">Endereço</label>
                <input type="text" id="endereco" placeholder="Digite endereço novo 'Rua :'" name="usuario['endereco']"
                       value="<?php echo $usuario['endereco']; ?>" class="form-control" required>
            </div>
            <div class="form-group col-md-6">
                <label for="numero">numero</label>
                <input type="text" id="numero" placeholder="Digite numero novo" name="usuario['numero']"
                       value="<?php echo $usuario['numero']; ?>" class="form-control" required>
            </div>
        </div>
    </form>
</div>
<?php
include_once FOOTER_TEMPLATE;
?>

