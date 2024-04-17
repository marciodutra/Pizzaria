<?php 

	require_once "../../classes/conexao.php";
	require_once "../../classes/produtos.php";

	$obj = new produtos();

	$con = new conectar();

	$conexao = $con->conexao();

$sql = "SELECT cod_produtovenda, nome_produto, valor_produto, descricao_produto, qnt_produto FROM tab_produtovenda WHERE cod_produtovenda = 10;";

$result = mysqli_query($conexao, $sql);

$ver = mysqli_fetch_row($result);
$nome = $ver[1];
$valor = $ver[2];
$quantidade = $ver[4];
?>

<p>nome:<?php echo $ver[1]; ?></p>
<p>valor:<?php echo $ver[2]; ?></p>
<p>quantidade:<?php echo $ver[4]; ?></p>

