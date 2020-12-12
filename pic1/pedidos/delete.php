<?php
require_once 'functions.php';
if(isset($_GET['id']))
{
    delete($_GET['id']);
}else{
    echo "ERRO! não foi possivel excluir";
}
