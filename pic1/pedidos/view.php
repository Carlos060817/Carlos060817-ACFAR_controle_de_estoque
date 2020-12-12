<?php
require_once 'functions.php';
?>
<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModal3Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal3Label">Pedido</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-sm">
                    <form class="letras" method="post">
                        <dt><label for="estado"><p>Cliente:</label>
                            <h7 class="form-control_pedido" type="number" required>
                                <?php
                                echo $pedido['id_cadastro'];
                                ?>
                            </h7>
                        </label>
                        <label for="estado"><p>Vendedor:</label>
                            <h7 class="form-control_vendedor" type="number" name="pedido['id_vendedor']" required>
                                <?php
                                echo $pedido['id_vendedor'];
                                ?>
                            </h7>
                        </label>
                        <label for="estado"><p>Item:</label>
                            <h7 class="form-control_produto" type="number" name="pedido['id_produto']" required></h7>
                        </label>
                        <label for="estado"><p>Prioridade:</label>
                            <h7 class="form-control_prioridade" type="number" name="pedido['prioridade']" required></h7>
                        </label>
                        <label for="estado"><p>Transportadora:</label>
                            <h7 class="form-control_transportadora" type="number" name="pedido['transportadora']" required></h7>
                        </label>
                        <label for="estado"><p>Quantidade:</label>
                            <h7 class="form-control_quantidade" type="number" name="pedido['quantidade']" required></h7>
                        </label>
                        <label for="estado"><p>Valor:</label>
                            <h7 class="form-control_valor" type="number" name="pedido['valor']" required></h7>
                        </label></dt>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


