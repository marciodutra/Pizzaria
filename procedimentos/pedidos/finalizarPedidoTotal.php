<?php 

require_once "../../classes/Pedido.class.php";
require_once "../../classes/conexao.class.php";

$obj = new Pedido();



$dados = array(

	$_POST['numero_pedido'],
	$_POST['valor_total_pedido']

);

echo $obj->finalizarPedidoTotal($dados);


?>