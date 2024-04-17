<?php 

	require_once "../../classes/conexao.class.php";

	$c = new conectar();

    $conexao = $c->conexao();

    $data1 = $_POST['dataInicio'];
    $data2 = $_POST['dataFim'];

  
    $sql =  "SELECT cod_pedido, valor_total, hora_pedido,data_pedido, cli.nome_cliente, status_pedido FROM tab_pedido ped JOIN tab_cliente cli ON ped.cod_cliente = cli.cod_cliente WHERE data_pedido BETWEEN '$data1' AND '$data2'";

    $result = mysqli_query($conexao, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Pedidos</title>
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
			<span id="btnVoltar"><a href="../TelaListagemPedidos.php">Voltar</a></span>
		</div>
		<h2>Listagem de Pedidos</h2>
				<div id="mostrapedidos">
					<table border="1" class="" id="tabeladepedidos">
						<tr id="topo_tabela">
							<td>Numero</td>
							<td>Valor</td>
							<td>Hora</td>
							<td>Data</td>
							<td>Cliente</td>
							<td>Status</td>
							<td>Atualizar</td>
						</tr>

						<?php while($mostrar = mysqli_fetch_row($result)): ?>

						<tr id="corpo_tabela">
							<td><?php echo $mostrar[0]; ?></td>
							<td><?php echo $mostrar[1]; ?></td>
							<td><?php echo $mostrar[2]; ?></td>
							<td><?php echo $mostrar[3]; ?></td>
							<td><?php echo $mostrar[4]; ?></td>
							<td><?php echo $mostrar[5]; ?></td>
							<td>
							<span  data-toggle="modal" data-target="#abremodalUpdatePedidoEsp" class="btn btn-primary btn-xs" onclick="atualizarPedidoEsp('<?php echo $mostrar[0] ?>')">
									<span class="glyphicon glyphicon-pencil"></span>
								</span>
							</td>
						</tr>

			<?php endWhile; ?>
					</table>
					
				</div>
				
			</fieldset>
		</div>
	</div>
	<div class="modal fade" id="abremodalUpdatePedidoEsp" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-xm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Atualizar Status</h4>
					</div>
					<div class="modal-body">
						<form id="frmAtualizarPedidoU" enctype="multipart/form-data">
						<input type="text" hidden="" id="cod_pedidoU" name="cod_pedidoU">
						<label>Código Fornecedor</label>
						<select class="form-control input-sm" id="cod_statusU" name="cod_statusU">
						<option value="0" selected="Selecione Fornecedor">Selecione Status</option>
							<option value="Iniciado">Iniciado</option>
							<option value="Andamento">Em andamento</option>
							<option value="Entregue">Entregue</option>
							<option value="Concluido">Concluído</option>
						</select>
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnAtualizarPedido" type="button" class="btn btn-warning" data-dismiss="modal">Atualizar</button>

					</div>
				</div>
			</div>
		</div>

</body>
</html>
<script type="text/javascript">
		$(document).ready(function(){
			$('#btnAtualizarPedido').click(function(){
				dados=$('#frmAtualizarPedidoU').serialize();
				$.ajax({
					type:"POST",
					data:dados,
					url:"../../procedimentos/pedidos/atualizarPedidoModal.php",
					success:function(r){
						if(r==1){
							window.location.reload();
						}else{
							alertify.error("Não foi possível atualizar pedido");
						}
					}
				});
			})
		})
</script>
<script type="text/javascript">
		function atualizarPedidoEsp(idpedido){
			document.getElementById('cod_pedidoU').value = idpedido;
			
			
		}
</script>