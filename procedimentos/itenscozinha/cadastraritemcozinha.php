<?php 
require_once "../../classes/conexao.class.php";
require_once "../../classes/itemcozinha.class.php";

$obj = new itemcozinha();

$dados = array(

	$_POST['cod_fornecedor'],
	$_POST['nome_produto'],
	$_POST['quantidade_produto'],
	$_POST['validade_produto'],
	$_POST['valor_produto'],
	$_POST['descricao_produto'],
	$_POST['categoria_produto']

);

echo $obj->cadastrarItemCozinha($dados);

?>