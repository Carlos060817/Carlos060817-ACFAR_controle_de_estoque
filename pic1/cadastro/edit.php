<?php
require_once 'functions.php';
include_once HEADER_TEMPLATE;
\Clientes\edit();
?>
<div class="container">

    <header style="margin-top: 30px">
        <div class="row">
            <div class="col-12 text-center my-4">
                <h1 class="display-4"><i class="fa fa-user-alt text-primary" aria-hidden="true"></i>
                    Editar Cadastro
                </h1>
            </div>
        <div>
    </header>
    <hr>
    <div class="row justify-content-center mb-5">
        <div class="col-sm-12 col-md-10 col-lg-8">
            <form action="" method="post" style="margin-bottom: 60px">
                <div class="form-row">
                    <div class="form-group col-sm-6">


                        <label for="nome">Seu Nome :</label>
                        <input class="form-control" type="text" id="nome" placeholder="nome" name="cadastro['nome']"
                               value="<?php echo $cadastro['nome']; ?>" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="sobrenome">Seu sobrenome :</label>
                        <input class="form-control" type="text" id="sobrenome" placeholder="sobrenome"
                               name="cadastro['sobrenome']" value="<?php echo $cadastro['sobrenome']; ?>" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="endereco">Seu endereço :</label>
                        <input class="form-control" type="text" id="endereco" placeholder="Endereço completo"
                               name="cadastro['endereco']" value="<?php echo $cadastro['endereco']; ?>" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="bairro">Seu bairro :</label>
                        <input class="form-control" type="text" id="bairro" placeholder="Seu Bairro" name="cadastro['bairro']"
                               value="<?php echo $cadastro['bairro']; ?>" required>
                    </div>
                    <div class="form-group col-sm-6">
                        <label for="cidade">Sua cidade :</label>
                        <input class="form-control" type="text" id="cidade" placeholder="Sua cidade" name="cadastro['cidade']"
                               value="<?php echo $cadastro['cidade']; ?>" required>
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="cep">Digite o cep :</label>
                        <input class="form-control" type="text" id="cep" placeholder="Digite o cep" name="cadastro['cep']"
                               value="<?php echo $cadastro['cep']; ?>" required>
                    </div>
                    <div class="form-group col-sm-2">
                        <label for="estado">Seu estado :</label>
                        <select id="estado" name="cadastro['estado']" class="form-control"

                            <option value="<?php echo $cadastro['estado']; ?>" selected></option>
                            <option value="Acre">AC</option>
                            <option value="Alagoas">AL</option>
                            <option value="Amapá">AP</option>
                            <option value="Amazonas">AM</option>
                            <option value="Bahia">BA</option>
                            <option value="Ceara">CE</option>
                            <option value="Distrito Federal">DF</option>
                            <option value="Espirito Santo">ES</option>
                            <option value="Goiás">GO</option>
                            <option value="Maranhão">MA</option>
                            <option value="Mato Grosso">MT</option>
                            <option value="Mato Grosso do Sul">MS</option>
                            <option value="Minas Gerais">MG</option>
                            <option value="Pará">PA</option>
                            <option value="Paraiba">PB</option>
                            <option value="Paraná">PR</option>
                            <option value="Pernambuco">PE</option>
                            <option value="Piauí">PI</option>
                            <option value="Rio de Janeiro">RJ</option>
                            <option value="Rio Grande do Norte">RN</option>
                            <option value="Rio Grande do Sul">RS</option>
                            <option value="Rondônia">RO</option>
                            <option value="Roraima">RR</option>
                            <option value="Santa Carina">SC</option>
                            <option value="São Paulo">SP</option>
                            <option value="Sergipe">SE</option>
                            <option value="Tocantins">TO</option>
                        </select>

                    </div>
                </div>
                <div class="col-sm-12 text-center">
                    <button type="submit" class="btn btn-outline-primary"><i class="fas fa-save"></i> Salvar</button>
                    <a href="index1.php" class="btn btn-outline-danger"><i class="fas fa-times-circle"></i> Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
include_once FOOTER_TEMPLATE;
?>