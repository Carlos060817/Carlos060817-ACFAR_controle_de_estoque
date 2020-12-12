<?php
namespace Usuarios;
use DateTimeZone;

require_once('../config.php');
require_once(DBAPI);
$usuarios = null;
$usuario = null;

function index(){
    global $usuarios;
    $usuarios = find_all('usuarios');
}

function find_all($table){
    return find($table);
}

function find($table, $id = null){
    $link = open_database();
    $found = null;
    try{

        if ($id) {
            $sql = "SELECT * FROM $table WHERE id = $id ORDER BY id DESC ";
            $exec = $link->query($sql);
            if ($exec->num_rows > 0) {
                $found = $exec->fetch_assoc();
            }
        } else {
            $sql = "SELECT * FROM $table ORDER BY id DESC ";
            $exec = $link->query($sql);
            if ($exec->num_rows > 0) {
                $found = $exec->fetch_all(MYSQLI_ASSOC);
            }
        }

    }catch (Exception $e){

        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = 'danger';

    }
    return $found;
}

function add()
{
    if (!empty($_POST['usuario'])) {
        $usuario = $_POST['usuario'];
        $agora = date_create('now', new DateTimeZone('America/Sao_Paulo'));
        $usuario['modificado'] = $agora->format("Y-m-d H:i:s");
        $usuario['criado'] = $agora->format("Y-m-d H:i:s");
        save('usuarios', $usuario);
        header('location: index.php');
    }
}

function save($table, $dados)
{
    $link = open_database();
    $colunas = null;
    $valores = null;
    foreach ($dados as $key => $valor) {
        $colunas .= trim($key, "'") . ",";
        if($valor == ''){
            $valores .= "NULL" . ",";
        }else{
            $valores .= "'$valor'" . ",";
        }

    }
    $colunas = rtrim($colunas, ',');
    $valores = rtrim($valores, ",");
    $sql = "INSERT INTO $table ($colunas) VALUES ($valores)";
    try {
        $link->query($sql);
        $_SESSION['message'] = "Registro cadastrado com sucesso!";
        $_SESSION['type'] = "success";
    } catch (Exception $e) {
        $_SESSION['message'] = "Não foi possivel realizar a operação!";
        $_SESSION['type'] = "danger";
    }
}

function view($id){
    global $usuario;
    $usuario = find('usuarios',$id);

}

function edit(){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(!empty($_POST['usuario'])){
            $usuario = $_POST['usuario'];
            $agora = date_create('now', new DateTimeZone('America/Sao_Paulo'));
            $usuario['modificado'] = $agora->format("Y-m-d H:i:s");
            update('usuarios', $id, $usuario);
            header('Location: index.php');
        }else{
            global $usuario;
            $usuario = find('usuarios',$id);
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

function delete($id = null){
    remove('usuarios',$id);
    header('Location:index.php');
}

function remove($table, $id){
    $link = open_database();
    try{
        $sql = "DELETE FROM $table Where id = $id";
        $link->query($sql);

        $_SESSION['message'] = "Registro apagado com sucesso!";
        $_SESSION['type'] = "success";

    }    catch (Exception $e){
        $_SESSION['message'] = "Não foi possivel realizar a operação!";
        $_SESSION['type'] = "danger";
    }
}

?>
