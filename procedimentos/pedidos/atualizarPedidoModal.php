<?php 

require_once "../../classes/Pedido.class.php";
require_once "../../classes/conexao.class.php";

$obj = new Pedido();



$dados = array(

	$_POST['cod_pedidoU'],
	$_POST['cod_statusU']

);

echo $obj->atualizarPedidoModal($dados);

?>