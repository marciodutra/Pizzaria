<?php 
   session_start();
?>
<!DOCTYPE html>
<html>
<head>

	<title>Inicio</title>
	<?php require_once "TelaMenu.php" ?>
	<link rel="stylesheet" type="text/css" href="../css/estilo_tela_inicio.css">

</head>
<body>
<div id="container">
	<div id="corpo_inicial">
		<h1>Tela de Inicio</h1>
	</div>
	<div id="empresa_pizzaria">
		<span class="span_inicio" id="nome_pizzaria">YOUNG PIZZARIA</span><br>
		<span class="span_inicio" id="sub_nome">O melhor para sua empresa.</span>
		<!--<span class="span_inicio"><?php echo $_SESSION['cod_func'];?></span>-->
	</div>
</div>
</body>
</html>