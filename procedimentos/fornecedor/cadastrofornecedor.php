<?php 
 require_once "../../classes/conexao.class.php";
 require_once "../../classes/fornecedor.class.php";

 $obj = new fornecedores();


 $dados =  array(
 	
 	$_POST['nome_fornecedor'],
 	$_POST['razao_fornecedor'],
 	$_POST['cnpj_fornecedor'],
 	$_POST['email_fornecedor'],
 	$_POST['telefone_fornecedor'],
 	$_POST['bairro_fornecedor'],
 	$_POST['rua_fornecedor'],
 	$_POST['numero_fornecedor']
 );

 echo $obj->cadastrarFornecedor($dados);



?>