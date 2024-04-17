<!DOCTYPE html>
	<html>
	<head>
		<title>Cadastro de Produtos</title>
		<meta charset="latin1">
		<?php require_once "TelaMenu.php"; ?>
		<?php require_once "dependencias.php" ?>
		<script src="../js/funcoes.js"></script>
		<script src="../lib/jquery-3.2.1.min.js"></script>

	</head>
	<body>
		<div class="container" style="position: relative; margin-left: 400px; top: 30px">
			<h1>Registro de Produtos</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCadProduto">
						<label>Nome</label>
						<input type="text" class="form-control input-sm" id="nome_produto" name="nome_produto">
						<label>Valor do Produto</label>
						<input type="text" class="form-control input-sm" id="valor_produto" name="valor_produto">
						<label>Forma de Armazenamento</label>
						<select class="form-control" id="decremento" name="decremento">
							<option value="0">Selecione forma de estoque</option>
							<option value="sim">Possui Estoque</option>
							<option value="nao">Não Possui Estoque</option>
						</select>
						<label>Quantidade</label>
						<input type="text" class="form-control input-sm" id="quantidade_produto" name="quantidade_produto">
						<label>Descrição</label>
						<textarea class="form-control input-sm" id="descricao_produto" name="descricao_produto"></textarea>
						<p></p>
						<span class="btn btn-primary" style="position: relative; margin-left: 270px" id="btnCadastrarProduto">Cadastrar</span>
					</form>
				</div>
			</div>
		</div>
</body>
</html>

<script type="text/javascript">
		$(document).ready(function(){
			$('#btnCadastrarProduto').click(function(){

				vazios=validarFormVazio('frmCadProduto');

				if(vazios > 0){
					alertify.alert("Preencha os Campos!!");
					return false;
				}

				dados=$('#frmCadProduto').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/produtos/adicionarProduto.php",
					success:function(r){
						alert(r);
						if(r==1){
							$('#frmCadProduto')[0].reset();
							alertify.success("Produto cadastrado com sucesso!");
						}else{
							alertify.error("Produto não cadastrado");
						}
					}
				});
			});
		});
	</script>