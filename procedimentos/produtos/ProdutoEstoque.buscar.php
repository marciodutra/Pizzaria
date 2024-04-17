<?php 

require_once "../../classes/produtos.class.php";
require_once "../../classes/conexao.class.php";

$obj = new produtos();

$dados = array(

    $_POST['codigo_produto']

);

echo json_encode($obj->buscarProdutoPedido($dados));

?>