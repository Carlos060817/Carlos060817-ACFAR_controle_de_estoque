<?php
require_once 'functions.php';
require_once '../login/functions.php';
include_once HEADER_TEMPLATE;
\Produtos\add();

?>
<main>
    <div class="container">
        <div class="row">
            <div class="col-12 text-center my-4">
                <h1 class="display-4"><i class="fa fa-paper-plane text-primary" aria-hidden="true"></i>
                    CADASTRAR PRODUTOS
                </h1>
            </div>
            <div class="row justify-content-center mb-5">
                <div class="col-sm-12 col-md-10 col-lg-8">
                    <form action="" method="post" style="margin-bottom: 60px">
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label for="nome">Nome do produto :</label>
                                <input class="form-control" type="text" id="nome" placeholder="nome"
                                       name="produto['nome']" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="email">Id jurídico :</label>
                                <input class="form-control" type="text" id="email" value="<?php

                                echo $_SESSION['usuario'];
                                ?>" disabled>
                                <input name="produto['id_usuario']" type="hidden"
                                       value="<?php echo $_SESSION['id_usuario'] ?>">
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="descricao">Descrição :</label>
                                <input class="form-control" type="text" id="descricao"
                                       placeholder="Descrição do produto" name="produto['descricao']" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="quantidade">Quantidade:</label>
                                <input class="form-control" type="number" id="quantidade" placeholder="Quantidade"
                                       name="produto['quantidade']" required>
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="valor">Valor:</label>
                                <input class="form-control" type="text" id="valor" placeholder="Valor do produto"
                                       name="produto['preco']" required>
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="marca">Marca:</label>
                                <input class="form-control" type="text" id="marca" placeholder="Marca do produto"
                                       name="produto['marca']" required>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-sm-12">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="checkbox">
                                        Deseja realmente cadastra-lo<br>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-sm-6 text-right">
                                <button class="btn btn-outline-primary" type="submit">Cadastrar</button>
                            </div>
                            <div class="col-sm-6">
                                <button class="btn btn-outline-dark" type="reset">Limpar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<?php include(FOOTER_TEMPLATE); ?>


</body>
</html>