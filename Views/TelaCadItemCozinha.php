<?php 

require_once "../classes/conexao.class.php";

$c = new conectar();
$conexao = $c->conexao();

$sql = "SELECT cod_fornecedor, nome_fornecedor FROM tab_fornecedor;";

$result = mysqli_query($conexao, $sql);

?>

<!DOCTYPE html>
	<html>
	<head>
		<title>Cadastro de Produtos</title>
		<meta charset="latin1">
		<?php require_once "TelaMenu.php"; ?>
		<?php require_once "dependencias.php" ?>
		<script src="../js/funcoes.js"></script>

	</head>
	<body>
		<div class="container" style="position: relative; margin-left: 400px; top: 30px">
			<h1>Registro de Produtos-Cozinha</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCadProdutoCozinha">
						<label>Código Fornecedor</label>
						<select class="form-control input-sm" id="cod_fornecedor" name="cod_fornecedor">
						<option value="0" selected="Selecione Fornecedor">Selecione Fornecedor</option>
						
						<?php while($mostrar = mysqli_fetch_row($result)): ?>
							<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1] ?></option>
						<?php endWhile; ?>
						</select>
						<label>Nome</label>
						<input type="text" class="form-control input-sm" id="nome_produto" name="nome_produto">
						<label>Quantidade</label>
						<input type="text" class="form-control input-sm" id="quantidade_produto" name="quantidade_produto">
						<label>Validade do Produto</label>
						<input type="date" class="form-control input-sm" id="validade_produto" name="validade_produto">
						<label>Valor Item</label>
						<input type="text" class="form-control input-sm" id="valor_produto" name="valor_produto">
						<label>Descricão</label>
						<textarea class="form-control input-sm" id="descricao_produto" name="descricao_produto"></textarea>
						<label>Categoria do Item</label>
						<select type="text" class="form-control input-sm" 
						    id="categoria_produto" name="categoria_produto">
						    <option value="0" selected="Selecione Cliente">Selecione Categoria</option>
							<option value="Limpeza">Limpeza</option>
							<option value="NPerecivel">Não Perecível</option>
							<option value="Alimentar">Alimenticía</option>
							<option value="Bebida">Bedida</option>
						</select>
						<span class="btn btn-primary" style="position: relative; margin-left: 270px; margin-top:  10px;" id="btnCadastrarProdutoCozinha">Cadastrar</span>
					</form>
				</div>
			</div>
		</div>
</body>
</html>
<script type="text/javascript">
		$(document).ready(function(){

			$('#btnCadastrarProdutoCozinha').click(function(){

				vazios=validarFormVazio('frmCadProdutoCozinha');

				if(vazios > 0){
					alertify.alert("Preencha os Campos!!");
					return false;
				}

				dados=$('#frmCadProdutoCozinha').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/itenscozinha/cadastraritemcozinha.php",
					success:function(r){
					

						if(r==1){
							$('#frmCadProdutoCozinha')[0].reset();
							alertify.success("Item de Cozinha Cadastrado");
						}else{
							alertify.error("Item de Cozinha Não Cadastrado");
						}
					}
				});
			});
		});
</script>