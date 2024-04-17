<?php 


require_once "../../classes/conexao.class.php";
require_once "../../classes/funcionario.class.php";



$obj = new funcionarios();


$dados=array(
	
	$_POST['cod_funcionarioU'],
	$_POST['nome_funcionarioU'],
	$_POST['cpf_funcionarioU'],
	$_POST['telefone_funcionarioU'],
	$_POST['nascimento_funcionarioU'],
	$_POST['rua_funcionarioU'],
	$_POST['bairro_funcionarioU'],
	$_POST['numero_funcionarioU'],
	$_POST['cargo_funcionarioU'],
	$_POST['salario_funcionarioU'],
	$_POST['telefone_funcionarioU2']
	

);

echo $obj->atualizarFuncionarioModal($dados);

 ?>