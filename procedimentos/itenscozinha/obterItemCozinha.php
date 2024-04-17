<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/itemcozinha.class.php";


$obj = new itemcozinha();

$iditemcozinha = $_POST['iditemcozinha'];

echo json_encode($obj->obterDadosItemCozinha($iditemcozinha));


 ?>