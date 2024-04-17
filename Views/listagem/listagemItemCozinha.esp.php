<?php 

	require_once "../../classes/conexao.class.php";

	$c = new conectar();

    $conexao = $c->conexao();

    $nome = $_POST['busca_nome_item'];
    
    $sql =  "SELECT ite.cod_itenscozinha, fornec.nome_fornecedor, ite.nome_item, ite.quantidade, ite.validade, ite.valor_item, ite.descricao_item, ite.categoria FROM tab_itenscozinha ite JOIN tab_fornecedor fornec ON ite.cod_fornecedor = fornec.cod_fornecedor WHERE ite.nome_item LIKE '%$nome%'";

    $result = mysqli_query($conexao, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Itens de Cozinha</title>
	<?php require_once "../dependencias.php" ?>
	<link rel="stylesheet" type="text/css" href="../../css/listagem_geral.css">
	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../css/estilo_btn_voltar.css">

	<script src="../../lib/jquery-3.2.1.min.js"></script>
	<script src="../../lib/bootstrap/js/bootstrap.js"></script>	

</head>
<body>
	<div class="principal">
		<div id="voltar_pesquisa">
			<span id="btnVoltar"><a href="../TelaListagemItensCozinha.php">Voltar</a></span>
		</div>
		<h2>Listagem de Itens de Cozinha Especifica</h2>
				<div id="mostrapedidos">
					<table border="1" class="" id="tabeladepedidos">
						<tr id="topo_tabela">
							<td>Código</td>
							<td>Fornecedor</td>
							<td>Nome</td>
							<td>Qnt em Estoque</td>
							<td>Validade</td>
							<td>Valor Pago</td>
							<td>Descricao</td>
							<td>Categoria</td>
							<td>Editar</td>
						</tr>

						<?php while($mostrar = mysqli_fetch_row($result)): ?>

						<tr id="corpo_tabela">
							<td><?php echo $mostrar[0]; ?></td>
							<td><?php echo $mostrar[1]; ?></td>
							<td><?php echo $mostrar[2]; ?></td>
							<td><?php echo $mostrar[3]; ?></td>
							<td><?php echo $mostrar[4]; ?></td>
							<td><?php echo $mostrar[5]; ?></td>
							<td><?php echo $mostrar[6]; ?></td>
							<td><?php echo $mostrar[7]; ?></td>
							<td>
								<span  data-toggle="modal" data-target="#abremodalUpdateItemEsp" class="btn btn-primary btn-xs" onclick="obterItemCozinha('<?php echo $mostrar[0] ?>')">
									<span class="glyphicon glyphicon-pencil"></span>
								</span>
							</td>
						</tr>

			<?php endWhile; ?>
					</table>
					
			<div class="modal fade" id="abremodalUpdateItemEsp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-xm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Atualizar Produto</h4>
					</div>
					<div class="modal-body">
					<form id="frmAtualizarItemCozinhaModal" enctype="multipart/form-data">
						<input type="text" hidden="" id="cod_itemcozinhaU" name="cod_itemcozinhaU">
						<label>Nome</label>
						<input type="text" class="form-control input-sm" id="nome_itemcozinhaU" name="nome_itemcozinhaU">
						<label>Valor do Produto</label>
						<input type="text" class="form-control input-sm" id="valor_itemcozinhaU" name="valor_itemcozinhaU">
						<label>Qnt Atual Estoque</label>
						<input type="text" class="form-control input-sm" id="quantidade_itemcozinhaU" name="quantidade_itemcozinhaU">
						<label>Descrição</label>
						<textarea class="form-control input-sm" id="descricao_itemcozinhaU" name="descricao_itemcozinhaU"></textarea>
						<label>Validade do Produto</label>
						<input type="date" class="form-control input-sm" id="validade_itemcozinhaU" name="validade_itemcozinhaU">
						<label>Categoria do Item</label>
						<select type="text" class="form-control input-sm" 
						    id="categoria_itemcozinhaU" name="categoria_itemcozinhaU">
						    <option value="0" selected="Selecione Categoria">Selecione Categoria</option>
							<option value="Limpeza">Limpeza</option>
							<option value="NPerecivel">Não Perecível</option>
							<option value="Alimentar">Alimenticía</option>
							<option value="Bebida">Bedida</option>
						</select>
					</form>
					</div>
					<div class="modal-footer">
						<button id="btnAtualizarItemModal" type="button" class="btn btn-warning" data-dismiss="modal">Atualizar</button>
					</div>
				</div>
			</div>
		</div>

</body>
</html>
<script type="text/javascript">
		function obterItemCozinha(iditemcozinha){
			$.ajax({
				type:"POST",
				data:"iditemcozinha=" + iditemcozinha,
				url:"../../procedimentos/itenscozinha/obterItemCozinha.php",
				success:function(r){
					
					dado=jQuery.parseJSON(r);

					$('#cod_itemcozinhaU').val(dado['codigo']);
					$('#nome_itemcozinhaU').val(dado['nome']);
					$('#valor_itemcozinhaU').val(dado['valor']);
					$('#quantidade_itemcozinhaU').val(dado['qnt_estoque']);
					$('#descricao_itemcozinhaU').val(dado['descricao']);
					$('#validade_itemcozinhaU').val(dado['validade']);
					$('#categoria_itemcozinhaU').val(dado['categoria']);					
					
					
				}
			});
		}
		$(document).ready(function(){
			$('#btnAtualizarItemModal').click(function(){
				dados=$('#frmAtualizarItemCozinhaModal').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../../procedimentos/itenscozinha/atualizarItemModal.php",
					success:function(r){

						if(r==1){
							alertify.success("Item Cozinha atualizado com sucesso!");
							window.location.reload();
						}else{
							alertify.error("Não foi possível atualizar Item Cozinha");
						}
					}
				});
			})
		})
</script>