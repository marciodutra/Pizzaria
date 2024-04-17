<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/produtos.class.php";


$obj = new produtos();

$idproduto = $_POST['idproduto'];

echo json_encode($obj->obterDadosProdutoModal($idproduto));


 ?>