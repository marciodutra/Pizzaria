<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/produtos.class.php";


$obj = new produtos();



$dados=array(
	$_POST['nome_produto'],
	$_POST['valor_produto'],
	$_POST['descricao_produto'],
	$_POST['decremento'],
	$_POST['quantidade_produto']
	
);

echo $obj->cadastrarProduto($dados);

 ?>