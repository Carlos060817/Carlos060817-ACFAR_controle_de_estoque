<?php
namespace Expedicao;

require_once('../config.php');
require_once(DBAPI);
$expedicoes = null;
$expedicao = null;


function index()
{
    global $expedicoes;
    $expedicoes = find_all('log_pedidos');
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
function view($id){
    global $expedicao;
    $expedicao = find('log_pedidos',$id);

}

