<?php 


require_once "../../classes/conexao.class.php";
require_once "../../classes/clientes.class.php";



$obj = new clientes();

$dados=array(
	$_POST['cod_clienteU'],
	$_POST['nome_clienteU'],
	$_POST['cpf_clienteU'],
	$_POST['telefone_clienteU'],
	$_POST['nascimento_clienteU'],
	$_POST['rua_clienteU'],
	$_POST['bairro_clienteU'],
	$_POST['numero_clienteU']

);

echo $obj->atualizarDadosCliente($dados);

 ?>