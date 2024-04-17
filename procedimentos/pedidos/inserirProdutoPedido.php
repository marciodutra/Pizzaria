<?php 

require_once "../../classes/pedido.class.php";
require_once "../../classes/conexao.class.php";

$obj = new Pedido();

$dados = array(

    $_POST['quantidade'],
    $_POST['codigo'],
    $_POST['numpedido'],
    $_POST['atualizar'],
    $_POST['valor_item']

);

echo $obj->inserirProdutoPedido($dados);

?>