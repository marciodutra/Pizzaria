<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/funcionario.class.php";


$obj = new funcionarios();

$idfuncionario = $_POST['idfuncionario'];

echo json_encode($obj->obterDadosFuncionario($idfuncionario));


 ?>