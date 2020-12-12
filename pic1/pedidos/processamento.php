<?php
require_once '../config.php';
require_once DBAPI;
include_once HEADER_TEMPLATE;
require_once 'functions.php';
require_once 'pedidos.php';
bd();
$link = open_database();
if($link){
}else{
    echo "Erro";
}


if(isset($_POST['pedido'])){echo"felipe";
    $id = null;
    $pedido = $_POST['pedido'];
    $itens = null;
    foreach ($pedido as $key => $valor){
        if($key == "'id'"){
            $id = $valor;
        }else{
            $itens .= trim($key,"'") . "=" . "'$valor',";
        }

    }
    $itens = rtrim($itens,",");
    var_dump($itens);
    $sql = "UPDATE pedidos SET $itens WHERE id=$id";
    $link->query($sql);
}


if(mysqli_affected_rows($link)!=0){
    echo"<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=pedidos.php'>
    <script type=\"text/javascript\">    
        alert(\"Pedido alterado com sucesso.\");     
    </script>";
}else {
    echo "<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=pedidos.php'>
    <script type=\"text/javascript\">    
        alert(\"Erro, tente novamente.\");
    </script>";
}
?>


