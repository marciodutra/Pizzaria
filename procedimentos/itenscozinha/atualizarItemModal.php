<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/itemcozinha.class.php";


$obj = new itemcozinha();


$dados=array(
	
	$_POST['cod_itemcozinhaU'],
	$_POST['nome_itemcozinhaU'],
	$_POST['valor_itemcozinhaU'],
	$_POST['quantidade_itemcozinhaU'],
	$_POST['descricao_itemcozinhaU'],
	$_POST['validade_itemcozinhaU'],
	$_POST['categoria_itemcozinhaU']

);

echo $obj->atualizarItemModal($dados);

 ?>