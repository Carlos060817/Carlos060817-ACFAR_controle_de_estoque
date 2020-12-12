<?php
require_once '../config.php';
require_once DBAPI;

$pedidos = null;
$pedido = null;


function requerimento()
{
    if (isset($_POST['pedido'])) {
        $pedido = $_POST['pedido'];
        $agora = date_create('now', new DateTimeZone('America/Sao_Paulo'));
        $pedido['data_pedido'] = $agora->format("Y-m-d H:i:s");
        save('pedidos', $pedido);

    }
}

function save($table, $dados)
{
    $link = open_database();
    $colunas = null;
    $valores = null;
    $valoraux= null;
    $valorTotal = 0;
    $qtd = 0;
    //dados de Produto
    $P_id = 0;
    $P_quantidade = 0;
    $P_preco = 0;

    foreach ($dados as $key => $valor) {
        if(trim($key, "'") == 'id_produto'){
            $sqlProduto = "SELECT * FROM produtos where id = $valor";
            $exec2 = $link->query($sqlProduto);
            if ($exec2->num_rows > 0) {
                $found = $exec2->fetch_assoc();
            }
            $P_id  = $found['id'];
            $P_quantidade = $found['quantidade'];
            $P_preco = $found['preco'];
        }
        if(trim($key, "'") == 'quantidade'){
            $qtd = $valor;
        }
        $colunas .= trim($key, "'") . ",";
        $valores .= "'$valor'" . ",";
    }
    $colunas .= "valor,";
    $valores .= ($qtd * $P_preco) .",";
    $colunas = rtrim($colunas, ',');
    $valores = rtrim($valores, ",");

    //subtrair de Produtos
    $qtd = $P_quantidade - $qtd;
    $sqlProdutoUpdate = "UPDATE produtos set quantidade=$qtd where id = $P_id";
    $link->query($sqlProdutoUpdate);

    //var_dump($colunas);
    $sql = "INSERT INTO $table ($colunas) VALUES ($valores)";
    try {
        $link->query($sql);
        $_SESSION['message'] = "Pedido cadastrado!";
        $_SESSION['type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = "Não foi possível salvar seu pedido, tente novamente!";
        //$_SESSION['message'] = $sql;
        $_SESSION['type'] = "danger";

    }
}

function delete($id = null)
{
    global $pedido;
    $pedido = find('pedidos', $id);
    remove('pedidos', $id);
    header('Location: pedidos.php');
}


function remove($table, $id)
{
    $link = open_database();
    try {
        $sql = "DELETE FROM $table WHERE id=$id";
        $link->query($sql);
        $_SESSION['message'] = "Registro apagado com sucesso !      ";
        $_SESSION['type'] = "success";

    } catch (Exception $e) {
        $_SESSION['message'] = "Não foi possivel excluir este registro !";
        $_SESSION['type'] = "danger";
    }
}


function bd()
{
    global $pedidos;
    $pedidos = find_all('pedidos');
}

function find_all($table)
{
    return find($table);
}

function find($table = null, $id = null)
{
    $link = open_database();
    $found = null;
    try {
        if ($id) {
            $sql = "SELECT * FROM " . $table . " WHERE id " . $id;
            $exec = $link->query($sql);
            if ($exec->num_rows > 0) {
                $found = $exec->fetch_assoc();
            }
        } else {
            $sql = "SELECT * FROM " . $table;
            $exec = $link->query($sql);
            if ($exec->num_rows > 0) {
                $found = $exec->fetch_all(MYSQLI_ASSOC);
            }
        }
    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = 'danger';

    }
    return $found;
}
function edit(){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(!empty($_POST['produto'])){
            $produto = $_POST['produto'];
            $agora = date_create('now', new DateTimeZone('America/Sao_Paulo'));
            $produto['modificado'] = $agora->format("Y-m-d H:i:s");
            update('produtos', $id, $produto);
            header('Location: index1.php');
        }else{
            global $produto;
            $produto = find('produtos',$id);
        }
    }
}
function update($table, $id, $dados){
    $link = open_database();
    $itens = null;
    foreach ($dados as $key => $valor){
        $itens .= trim($key,"'") . "=" . "'$valor',";
    }
    $itens = rtrim($itens,",");
    $sql = "UPDATE $table SET $itens WHERE id=$id";
    try {
        $link->query($sql);
        $_SESSION['message'] = "Registro atualizado com sucesso!";
        $_SESSION['type']  = "success";
    }
    catch (Exception $e){
        $_SESSION['message'] = "Não foi possivel realizar a operação!";
        $_SESSION['type'] = "danger";
    }
}
