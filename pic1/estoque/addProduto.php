<?php
require_once 'functions.php';
require_once '../produto/functions.php';
include_once HEADER_TEMPLATE;
\Estoque\addmercadoria();
?>

<div class="container">
    <header style="margin-top: 10px">
        <div class="row">
            <div class="col-sm-12 text-right">
                <a class="btn btn-outline-primary " href="inventario.php"><i class="fas fa-angle-double-left"></i> Voltar</a>
            </div>
            <div class="col-sm-12 text-center my-4">
                <h1 class="display-4"><i class="fas fa-layer-group text-primary" aria-hidden="true"></i>
                    Entrada de Mercadorias
                </h1>
            </div>

    </header>
    <hr>
    <div class="row">
        <div class="row mb-5" style="margin-top: 20px ;padding: 0px 0px 0px 230px;">
            <form action="" method="post">
                <div class="form-row">
                    <div class="form-group col-sm-10">
                        <label for="descricao">Nome:</label>
                        <select name="produto['id']" class="form-control">
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
                    </div>

                    <div class="form-group col-sm-4">
                        <label for="quantidade">Quantidade:</label>
                        <input class="form-control" type="number" id="quantidade" placeholder="Quantidade"
                               name="produto['quantidade']" required>
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="quantidade">Data:</label>
                        <input class="form-control" type="datetime-local"
                               name="produto['entrada_mercadoria']" >
                    </div>

                    <div>

                        <div class="form-group col-sm-12">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" required>
                                    Deseja realmente adicionar<br>
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center" style="margin-top: 10px">
                            <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i> Adicionar
                            </button>
                            <a href="../empresa/index.php" class="btn btn-outline-danger"><i
                                        class="fas fa-times-circle"></i> Cancelar</a>

                        </div>

            </form>
        </div>
    </div>

</div>
</div>

<?php include(FOOTER_TEMPLATE); ?>

