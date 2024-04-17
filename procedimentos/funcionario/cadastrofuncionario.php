<?php 
require_once "../../classes/conexao.class.php";
require_once "../../classes/funcionario.class.php";

 $obj = new funcionarios();


 $dados =  array(
 	
 	$_POST['nome_funcio'],
 	$_POST['cargo_funcio'],
 	$_POST['nascimento_funcio'],
 	$_POST['cpf_funcio'],
 	$_POST['telefone_funcio1'],
 	$_POST['telefone_funcio2'],
 	$_POST['admissao_funcio'],
 	$_POST['rua_funcio'],
 	$_POST['bairro_funcio'],
 	$_POST['numero_funcio'],
 	$_POST['salario_funcio']
 );

 echo $obj->cadastrarFuncionario($dados);





?>