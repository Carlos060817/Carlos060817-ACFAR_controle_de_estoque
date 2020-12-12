<?php
require_once 'functions.php';
if(isset($_GET['id'])){
    \Usuarios\delete($_GET['id']);
}else{
    die("ERRO: ID nao identificado!!!");
}
