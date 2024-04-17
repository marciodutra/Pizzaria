<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/clientes.class.php";


$obj = new clientes();

$idcliente = $_POST['idcliente'];

echo json_encode($obj->obterDadosCliente($idcliente));


 ?>
