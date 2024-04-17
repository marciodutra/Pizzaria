<?php 

require_once "../../classes/Pedido.class.php";
require_once "../../classes/conexao.class.php";

$obj = new Pedido();

$dado = 1;

$dados = array(


);

echo json_encode($obj->buscarIdPedido($dado));

?>