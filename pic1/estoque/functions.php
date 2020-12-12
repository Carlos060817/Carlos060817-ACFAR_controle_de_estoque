<?php
namespace Estoque;

use DateTimeZone;

require_once('../config.php');
require_once(DBAPI);
$produtos = null;
$produto = null;


function index()
{
    global $produtos;
    $produtos = find_all('produtos');
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
            $sql = "SELECT * FROM " . $table . " WHERE id = " . $id;
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



function add()
{
    if (!empty($_POST['produto'])) {
        $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
//echo $today->format("Y-m-d H:i:s");
        $produto = $_POST['produto'];
        $produto['modificado'] = $today->format("Y-m-d H:i:s");
        $produto['criado'] = $today->format("Y-m-d H:i:s");
        save('produtos', $produto);


        header('location: index1.php');
    }
}


function save($table, $dados)
{
    $link = open_database();
    $colunas = null;
    $valores = null;
    foreach ($dados as $key => $values) {
        $colunas .= trim($key, "'") . ",";
        $valores .= "'$values'" . ",";
    }
    $colunas = rtrim($colunas, ",");
    $valores = rtrim($valores, ",");

    $sql = "INSERT INTO $table ($colunas) values ($valores)";
    try {
        $link->query($sql);
        $_SESSION['message'] = "Registro cadastrado com sucesso!!!";
        $_SESSION['type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = "Não foi Registro cadastrado seus dados!!!";
        $_SESSION['type'] = "danger";
    }


}


function edit()
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (!empty($_POST['produto'])) {
            $produto = $_POST['produto'];
            $agora = date_create('now', new DateTimeZone('America/Sao_Paulo'));
            $produto['modificado'] = $agora->format("Y-m-d H:i:s");
            update('produtos', $id, $produto);
            header('Location: inventario.php');
        } else {
            global $produto;
            $produto = find('produtos', $id);
        }
    }
}

function update($table, $id, $dados)
{
    $link = open_database();
    $itens = null;
    foreach ($dados as $key => $valor) {
        $itens .= trim($key, "'") . "=" . "'$valor',";
    }
    $itens = rtrim($itens, ",");
    $sql = "UPDATE $table SET $itens WHERE id=$id";
    try {
        $link->query($sql);
        $_SESSION['message'] = "Quantidade alterada com sucesso!";
        $_SESSION['type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = "Não foi possivel realizar a operação!";
        $_SESSION['type'] = "danger";
    }
}


function view($id)
{
    global $produto;
    $produto = find('produtos', $id);

}


function delete($id = null)
{
    remove('produtos', $id);
    header('Location:index1.php');
}

function remove($table, $id)
{
    $link = open_database();
    try {
        $sql = "DELETE FROM $table Where id = $id";
        $link->query($sql);

        $_SESSION['message'] = "Registro apagado com sucesso!";
        $_SESSION['type'] = "success";

    } catch (Exception $e) {
        $_SESSION['message'] = "Não foi possivel realizar a operação!";
        $_SESSION['type'] = "danger";
    }
}
function addmercadoria()
{
        if (isset($_POST['produto'])) {
            $produto = $_POST['produto'];
            $agora = date_create('now', new DateTimeZone('America/Sao_Paulo'));
            $produto['entrada_mercadoria'] = $agora->format("Y-m-d H:i:s");
            adiciona('produtos',$produto);

        }

}
function adiciona($table,$dados){
    $link = open_database();
    $colunas = null;
    $valores = null;
    $valoraux = null;
    foreach ($dados as $key =>$valor){
        $colunas = trim($key,"'");
        $valores = trim($valor,"'");
        $valoraux[$colunas] = $valores;
    }
    $dados = $valoraux;
    try {
        $sql = "UPDATE $table SET quantidade =". $dados['quantidade'] ."+ (SELECT quantidade FROM $table 
        WHERE id=".$dados['id'].") WHERE id=".$dados['id'];
        $exec = $link->query($sql);
        $_SESSION['message'] = "Estoque atualizado com sucesso!";
        $_SESSION['type'] = "success";
    }catch (Exception $e){
        $_SESSION['message'] = "Erro!";
        $_SESSION['type'] = "danger";
    }

}




?>

