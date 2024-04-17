<?php 

require_once "../../classes/conexao.php";

$con = new conectar();
$conexao = $con->conexao();

$descricao = $_POST['descricao'];
$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$valor = $_POST['valor'];


$sql = "INSERT INTO tab_produtovenda(descricao_produto, nome_produto, qnt_produto, valor_produto)VALUES('$descricao','$nome','$quantidade','$valor');";

$result = mysqli_query($conexao, $sql);

 ?>