<?php 


require_once "../../classes/conexao.class.php";
require_once "../../classes/produtos.class.php";



$obj = new produtos();

$dados=array(

	$_POST['cod_produtoU'],
	$_POST['nome_produtoU'],
	$_POST['valor_produtoU'],
	$_POST['descricao_produtoU']
);

echo $obj->atualizarDadosProduto($dados);

 ?>