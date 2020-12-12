<?php

require_once('functions.php');
include_once HEADER_TEMPLATE;
\Usuarios\add();
?>


<div class="container">
    <header style="margin-top: 20px">
    <div class="row">
        <div class="col-12 text-center my-4">
            <h1 class="display-4"><i class="fa fa-paper-plane text-primary" aria-hidden="true"></i>
                Cadastrar Vendedor
            </h1>
        </div>
    </header>
    <hr>
        <div class="row justify-content-center mb-5">
                <form action="" method="post" style="margin-bottom: 60px">
                    <div class="form-row">
                        <div class="col-md-6">
                            <label for="nome">Nome:</label>
                            <input type="text" id="nome" placeholder="Digite o nome do usuario" name="usuario['nome']"
                                   class="form-control" required>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="login">login:</label>
                            <input type="text" id="login" placeholder="Digite o login do usuario" name="usuario['login']"
                                   class="form-control" required>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="cpf">CPF:</label>
                            <input type="number" id="cpf" placeholder="Digite o CPF do usuario" name="usuario['cpf']"
                                   class="form-control">
                        </div>


                        <div class="col-md-6">
                            <label for="senha">Senha:</label>
                            <input type="password" id="senha" placeholder="Digite senha do usuario" name="usuario['senha']"
                                   class="form-control" required>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="empresa">Nome da Empresa:</label>

                            <input type="text" id="empresa" value="<?php echo $_SESSION['usuario']?>"
                                    class="form-control" disabled>
                            <input name="usuario['id_empresa']" type="hidden" value="<?php echo $_SESSION['id_usuario']?>">
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="email">Email:</label>
                            <input type="text" id="email" placeholder="Digite o E-mail do usuario" name="usuario['email']"
                                   class="form-control" required>
                        </div>


                        <div class="col-md-6 form-group">
                            <label for="cidade">Cidade:</label>
                            <input type="text" id="cidade" placeholder="Digite o cidade do usuario" name="usuario['cidade']"
                                   class="form-control" required>
                        </div>


                        <div class="col-md-6 form-group">
                            <label for="endereco">Endereço:</label>
                            <input type="text" id="endereco" placeholder="Digite o endereço do usuario" name="usuario['endereco']"
                                   class="form-control" required>
                        </div>


                        <div class="col-md-6 form-group">
                            <label for="numero">Numero:</label>
                            <input type="text" id="numero" placeholder="Digite o numero do usuario" name="usuario['numero']"
                                   class="form-control" required>
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="bairro">Bairro:</label>
                            <input type="text" id="bairro" placeholder="Digite o Bairro do usuario" name="usuario['bairro']"
                                   class="form-control" required>
                        </div>



                        <div class="col-md-6 form-group">
                            <label for="cep">CEP:</label>
                            <input type="text" id="cep" placeholder="Digite o CEP do usuario" name="usuario['cep']"
                                   class="form-control" required>
                        </div>


                        <div class="col-md-6 form-group">
                            <label for="telefone">Telefone:</label>
                            <input type="text" id="telefone" placeholder="Digite o telefone do usuario" name="usuario['telefone']"
                                   class="form-control" required>
                        </div>

                        <div class="col-md-6">
                            <label for="">Tipo de acesso:</label>
                            <select class="form-control" name="usuario['tipo']" disabled>
                                <option value="2">Vendedor</option>
                            </select>

                        </div>

                    </div>

                    <div class="form-row mt-1">
                        <div class="form-group col-sm-12">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" required>
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


                <?php
                include_once FOOTER_TEMPLATE;
                ?>


