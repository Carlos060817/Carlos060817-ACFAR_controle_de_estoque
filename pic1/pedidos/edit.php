<!-- 1/2 modal usado para o formulario ao clicar no botão de editar, colocado como "exampleModal2-->

<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModal2Label"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal2Label">Pedido
                <?php echo $pedido['id'];?>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group col-sm">
                    <form class="letras" method="post" action="processamento.php">

                            <!-- pegando o id do form-->

                            <label for="cliente"><p>Cliente:</label>
                            <select class="form-control_pedido" type="text" name="pedido['id_cadastro']"
                                    onchange="changeSelect();">
                                <?php \Clientes\index();
                                if ($cadastros) {
                                    foreach ($cadastros as $cadastro) {
                                        ?>
                                        <option class="form-control_pedido"
                                                value="<?php echo $cadastro['id']?>"><?php echo $cadastro['nome']; ?></option>
                                    <?php }
                                } ?>
                            </select>
                            <label for="vendedor"><p>Vendedor:</label>
                            <select class="form-control_vendedor" name="pedido['id_vendedor']" id="area"
                                    onchange="changeSelect();">
                                <?php
                                    \Usuarios\index();
                                if ($usuarios) {
                                    foreach ($usuarios as $usuario) {
                                        ?>
                                        <option class="form-control_pedido"
                                                value="<?php echo $usuario['id']?>"><?php echo $usuario['nome']; ?></option>
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                            <label for="item"><p>Item:</label>
                            <select class="form-control_produto" name="pedido['id_produto']" id="form-control_produto"
                                    onchange="changeSelect();" required>
                                <?php
                                \Produtos\index();
                                if ($produtos) {
                                    foreach ($produtos as $produto) {
                                        ?>
                                        <option class="form-control_produto"
                                                value="<?php echo $produto['id']?>"><?php echo $produto['nome']; ?></option>
                                        </option>
                                    <?php }
                                } ?>
                            </select>
                            <label for="prioridade"><p>Prioridade:</label>
                            <select class="form-control_prioridade" name="pedido['prioridade']" id="area"
                                    onchange="changeSelect();" required>
                                <option>Mediana</option>
                                <option>Baixa</option>
                                <option>Alta</option>
                                </p>
                            </select>
                            <label for="transportadora"><p>Transportadora:</label>
                            <input class="form-control_transportadora" type="text" name="pedido['transportadora']"
                                   required>
                            <label for="quantidade"><p>Quantidade:</label>
                            <input class="form-control_quantidade" type="number" name="pedido['quantidade']" required>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-outline-dark" name="button" ><i class="fas fa-save"></i>
                        Alterar
                    </button>
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancelar</button>

                </div>
                </form>
            </div>
        </div>
    </div>
</div>


