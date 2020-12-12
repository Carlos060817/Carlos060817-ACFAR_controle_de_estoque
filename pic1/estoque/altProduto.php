<?php
require_once 'functions.php';
include_once HEADER_TEMPLATE;
\Estoque\edit();
?>
<div class="container">
    <header style="margin-top: 40px">
        <div class="row">
            <div class="col-12 text-center my-4">
                <h1 class="display-4"><i class="fa fa-paper-plane text-primary" aria-hidden="true"></i>
                    Alterar Quantidade
                </h1>
            </div>
        </div>
    </header>
    <hr>
    <div class="row justify-content-center mb-3">
        <form action="" method="post" style="margin-bottom: 60px">
            <div class="form-row">

                <div class="form-group col-sm-12">
                    <label for="nome">Nome:</label>
                    <input class="form-control" type="text" id="nome"
                           placeholder="<?php echo $produto['nome']; ?>" name="produto['nome']"
                           value="<?php echo $produto['nome']; ?>" disabled>
                </div>
                <div class="form-group col-sm-12">
                    <label for="quantidade">Quantidade:</label>
                    <input class="form-control" type="number" id="quantidade" placeholder="Quantidade"
                           name="produto['quantidade']" value="<?php echo $produto['quantidade']; ?>" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-sm-12">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input class="form-check-input" type="checkbox" required>
                            Deseja realmente alterar a quantidade<br>
                        </label>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 text-center">
                <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i> Alterar
                </button>
                <a href="inventario.php" class="btn btn-outline-danger"><i class="fas fa-times-circle"></i>
                    Cancelar</a>
            </div>

        </form>
    </div>
</div>


</div>

<?php include(FOOTER_TEMPLATE); ?>


