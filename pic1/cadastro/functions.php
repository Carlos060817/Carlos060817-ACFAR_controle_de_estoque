<?php
namespace Clientes;
use DateTimeZone;
require_once('../config.php');
require_once(DBAPI);
$cadastros = null;
$cadastro = null;


function index()
{
    global $cadastros;
    $cadastros = find_all('cadastros');
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

function find_all($table)
{
    return find($table);
}


function add()
{
    if (!empty($_POST['cadastro'])) {
        $today = date_create('now', new DateTimeZone('America/Sao_Paulo'));
//echo $today->format("Y-m-d H:i:s");
        $cadastro = $_POST['cadastro'];
        $cadastro['modificado'] = $today->format("Y-m-d H:i:s");
        $cadastro['criado'] = $today->format("Y-m-d H:i:s");
        save('cadastros', $cadastro);


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
        $valores .= "'$values '" . ",";
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









function edit(){
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        if(!empty($_POST['cadastro'])){
            $cadastro = $_POST['cadastro'];
            $agora = date_create('now', new DateTimeZone('America/Sao_Paulo'));
            $cadastro['modificado'] = $agora->format("Y-m-d H:i:s");
            update('cadastros', $id, $cadastro);
            header('Location: index1.php');
        }else{
            global $cadastro;
            $cadastro = find('cadastros',$id);
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



function view($id){
    global $cadastro;
    $cadastro = find('cadastros',$id);

}


function delete($id = null){
    remove('cadastros',$id);
    header('Location:index1.php');
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
