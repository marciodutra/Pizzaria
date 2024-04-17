<?php 
 require_once "../../classes/conexao.class.php";
 require_once "../../classes/clientes.class.php";

 $obj = new clientes();


 $dados =  array(
 	
 	$_POST['nome_cliente'],
 	$_POST['cpf_cliente'],
 	$_POST['telefone_cliente'],
 	$_POST['nascimento_cliente'],
 	$_POST['rua_cliente'],
 	$_POST['bairro_cliente'],
 	$_POST['numero_cliente']
 );

 echo $obj->cadastrarCliente($dados);



?>