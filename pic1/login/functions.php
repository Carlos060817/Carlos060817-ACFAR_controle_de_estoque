<?php
namespace Login;
require_once '../config.php';
require_once DBAPI;

function index()
{
    if (!empty($_POST['login'])) {
        $login = $_POST['login'];
        validar('usuarios', $login);
    } else {
        session_destroy();
    }
}

function validar($table, $dados)
{
    $link = open_database();
    $itens = null;
    $found = null;

    foreach ($dados as $key => $valor) {

        $itens .= trim($key, "'") . "=" . "'$valor'" . " and ";
    }

    $itens = rtrim($itens, " and ");

    try {

        echo $sql = "SELECT * FROM $table WHERE $itens";
        $exec = $link->query($sql);

        $link = BASEURL . 'login';

        if ($exec->num_rows > 0) {
            $found = $exec->fetch_assoc();
            $_SESSION['usuario'] = $found['nome'];
            $_SESSION['tipo_acesso'] = $found['tipo'];
            $_SESSION['id_usuario'] = $found['id'];
            if ($found['tipo'] == 0) {
                $link = BASEURL .'acfar';
            }elseif ($found['tipo'] == 1) {
                $link = BASEURL .'empresa';
            }elseif ($found['tipo'] == 2) {
                $link = BASEURL . 'vendedor';
            }
        }
        header('Location: '.$link);

    } catch (Exception $e) {
        $_SESSION['message'] = $e->getMessage();
        $_SESSION['type'] = "danger";
    }


}

?>