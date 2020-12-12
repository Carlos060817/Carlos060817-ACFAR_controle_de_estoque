<?php
require_once "../usuarios/functions.php";
require_once 'functions.php';
include_once HEADER_TEMPLATE;
\Produtos\edit();
?>
    <div class="container">
    <header>
        <div class="row" style="margin-top: 40px">
            <div class="col-12 text-center my-4">
                <h1 class="display-4"><i class="fa fa-paper-plane text-primary" aria-hidden="true"></i>
                    EDITAR PRODUTOS
                </h1>
            </div>
        </div>
    </header>
    <hr>
    <div class="row justify-content-center mb-5">
    <div class="col-sm-12 col-md-10 col-lg-8">
        <form action="" method="post" style="margin-bottom: 60px">
            <div class="form-row">
                <div class="form-group col-sm-6">


                    <label for="nome">Nome Produto :</label>
                    <input class="form-control" type="text" id="nome" name="produto['nome']"
                           value="<?php echo $produto['nome']; ?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="nome">nome_juridico :</label>
                    <input class="form-control" type="text" id="nome"
                           value="<?php
                           \Usuarios\view($produto['id_usuario']);
                           echo $usuario['nome'];

                           ?>" disabled>
                    <input name="produto['id_usuario']" type="hidden" value="<?php echo $produto['id_usuario'] ?>">
                </div>
                <div class="form-group col-sm-6">
                    <label for="descricao">Descrição:</label>
                    <input class="form-control" type="text" id="descricao" name="produto['descricao']"
                           value="<?php echo $produto['descricao']; ?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="quantidade">Quantidade :</label>
                    <input class="form-control" type="number" id="quantidade" name="produto['quantidade']"
                           value="<?php echo $produto['quantidade']; ?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="valor">Valor :</label>
                    <input class="form-control" type="text" id="valor" name="produto['preco']"
                           value="<?php echo $produto['preco']; ?>" required>
                </div>
                <div class="form-group col-sm-6">
                    <label for="marca">Marca :</label>
                    <input class="form-control" type="text" id="marca" name="produto['marca']"
                           value="<?php echo $produto['marca']; ?>" required>
                </div>
            </div>
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i> Salvar</button>
                <a href="index1.php" class="btn btn-outline-danger"><i class="fas fa-times-circle"></i> Cancelar</a>
            </div>
        </form>
    </div>
<?php
include_once FOOTER_TEMPLATE;
?>