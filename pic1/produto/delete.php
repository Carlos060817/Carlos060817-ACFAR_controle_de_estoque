<?php
require_once 'functions.php';
if(isset($_GET['id'])){
    \Produtos\delete($_GET['id']);
}else{
    die("ERRO: ID nao identificado!!!");
}
