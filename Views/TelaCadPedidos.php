<?php
   require_once "../classes/conexao.class.php";

    $c = new conectar();
	$conexao=$c->conexao();

	$sql = "SELECT cod_cliente, nome_cliente FROM tab_cliente";
	$nomes = mysqli_query($conexao, $sql);
 ?>

 <?php
	function ultimoID(){
	   require_once "../classes/conexao.class.php";

	    $c = new conectar();
		$conexao=$c->conexao();

		$sql = "SELECT cod_pedido FROM tab_pedido ORDER BY cod_pedido DESC LIMIT 1";

		$result = mysqli_query($conexao, $sql);

		$ultimoId = mysqli_fetch_row($result);

		return $ultimoId[0];
    }

 ?>

 <?php 
	require_once "../classes/conexao.class.php";

	$id = ultimoID();
   
	$c = new conectar();
	$conexao=$c->conexao();

	/*$sql="SELECT pro.cod_produtovenda, pro.nome_produto,ite.quantidade, pro.valor_produto from  tab_produtovenda pro JOIN tab_itempedido ite on pro.cod_produtovenda = ite.cod_produtovenda where ite.cod_pedido = '$id' LIMIT 11 ";*/

	$sql = "SELECT pro.cod_produtovenda, pro.nome_produto,ite.quantidade, pro.valor_produto from  tab_produtovenda pro JOIN tab_itempedido ite JOIN tab_pedido ped on pro.cod_produtovenda = ite.cod_produtovenda AND ite.cod_pedido = ped.cod_pedido where ped.cod_pedido = '$id' AND ped.fechado = 'nao'";

	$result = mysqli_query($conexao, $sql);

?>


<!DOCTYPE html>
<html>
<head>
	<title>Tela de Pedido</title>
	<meta charset="latin1">
	<?php require_once "TelaMenu.php"; ?>
	<?php require_once "dependencias.php" ?>
	<script src="../js/funcoes.js"></script>
	<script src="../lib/jquery-3.2.1.min.js"></script>

	<link rel="stylesheet" type="text/css" href="../css/estiloTelaPedido.css">
	<link rel="stylesheet" type="text/css" href="../css/estilo_valor_total.css">
	<script type="text/javascript">
		window.onload = function(){

	        desabilitarInicio();

		}
	</script>
</head>
<body>
	<div id="container">
       	<div class="divs" id="campos_pedidos">
       			<div id="buscar_cliente">
				<form id="frmIniciarPedido">
					<label id="label_pedido">Pedido:</label>
				    <input type="text" class="form-control input-sm" id="numero_pedido" name="numero_pedido" placeholder="número pedido">
					<select class="form-control input-sm" name="nome_cliente" id="nome_cliente" required>
							<option value="0" selected="Selecione Cliente">Selecione Cliente</option>
							<?php while($mostra = mysqli_fetch_row($nomes)):?>
								<option value="<?php echo $mostra[0] ?>"><?php echo $mostra[1]; ?></option>
							<?php endWhile; ?>	
						</select>
					<span class="btn btn-primary" id="btnIniciarPedido">Iniciar Pedido</span><br>
				</form>
			</div>

			<div id="buscar_produto">
				<form id="frmBuscarProduto">
					<label id="label_pedido">Buscar produto p/ código:</label>
					<input type="text" class="form-control input-sm" id="codigo_produto" name="codigo_produto" placeholder="código produto">
					<span class="btn btn-primary" id="btnBuscarProduto">Buscar</span><br>		
				</form>
			</div>
			<form id="posiciona_form">
				<label>Produto:</label>
				<input type="text" hidden="" id="qnt_estoque" name="qnt_estoque">
				<input type="text" hidden="" id="decremento" name="decremento">  
				<input type="text" class="form-control input-sm" id="nome_produto" name="nome_produto" placeholder="nome produto"> 
				<label>Valor:</label>
				<input type="text" class="form-control input-sm" id="valor_produto" name="valor_produto" placeholder="valor"> 
				<label>Codigo:</label>
				<input type="text" class="form-control input-sm" id="cod_produto" name="cod_produto" placeholder="código produto">
				<label>Insira Quantidade:</label>
				<input type="text" class="form-control input-sm" id="quantidade" name="quantidade" placeholder="Quantidade "><br>
				<span class="btn btn-primary" id="btnInserirProduto">Inserir Produto</span>
			</form>
			<hr id="hrdivision">
	</div>
       	<div class="divs" id="tabela_pedidos">
			<table class="table  table-condensed table-bordered" id="tableitem" border="1">
				<tr id="topo_tabela">
					<td width="30">Código</td>
					<td width="200">Produto</td>
					<td width="40">QNT</td>
					<td width="80">Val Produto</td>
					<td width="80">Total Uni</td>
					<td width="80">Cancelar</td>
					<?php $soma = 0 ?>
				</tr>
				<?php while($mostrar = mysqli_fetch_row($result)): ?>

				<tr id="corpo_tabela">
					<td><?php echo $mostrar[0]; ?></td>
					<td><?php echo $mostrar[1]; ?></td>
					<td><?php echo $mostrar[2]; ?></td>
					<td><?php echo $mostrar[3]; ?></td>
					<td><?php echo $mostrar[2] * $mostrar[3]; ?></td>
					<?php $soma = $soma + ($mostrar[2] * $mostrar[3]) ?>
					<td>
					   <span class="btn btn-danger btn-xs" onclick="excluirMemorando('<?php echo $mostrar[0]?>')"><span>
				        <span class="glyphicon glyphicon-remove"></span>
				      </span>
					</td>
				</tr>

			<?php endWhile; ?>
			</table>
			<div id="finalizarCompra">
			        <div id="div_label_total"><label id="valor_total_label">Valor Total</label></div>
			        <div id="div_btn_concluir"><span class="btn btn-danger" onclick="setValorTotal(<?php echo $soma ?>)" id="btnFinalizarCompra">Concluir
					</span></div>
					<div id="div_mostra_valor_total"><span id="span_mostra_valor_total">R$ <?php echo $soma ?>, 00</span></div>				
			</div>
       	</div>
       </div> 
</body>
</html>
<!--FUNÇÃO RELACIONADA COM INSERIR PRODUTO NO PEDIDO-->
<script type="text/javascript">
		$(document).ready(function(){
			$('#btnInserirProduto').click(function(){
				//dados=$('#posiciona_form').serialize();
				var cod = document.getElementById("cod_produto").value;
				var quant = parseInt(document.getElementById("quantidade").value);
				var num = document.getElementById("numero_pedido").value;
				var estoque = parseInt(document.getElementById("qnt_estoque").value);
				var valor_item = document.getElementById("valor_produto").value;
				var decremento = document.getElementById("decremento").value;

				var atualizar = estoque - quant;
				

				if(decremento == "sim" && quant >= 0 && quant <= estoque){

				$.ajax({
					type:"POST",
					data:{codigo: cod, valor_item: valor_item, quantidade: quant, numpedido: num, atualizar: atualizar},
					url:"../procedimentos/pedidos/inserirProdutoPedido.php",
					success:function(r){
						
						if(r==1){
							
							window.location.reload();
							limpaCampos();

						}else{
							
							alertify.error("Produto não Inserido");
						}
					}
				});

			 }if(decremento != "sim" && quant > 0){
				$.ajax({
					type:"POST",
					data:{codigo: cod, valor_item: valor_item, quantidade: quant, numpedido: num, atualizar: atualizar},
					url:"../procedimentos/pedidos/inserirProdutoPedido.php",
					success:function(r){
						
						if(r==1){
							
							window.location.reload();
							limpaCampos();

						}else{
							
							alertify.error("Produto não Inserido");
						}
					}
				});
			 }else{
			 	alert("Verifique o campo quantidade ou verfique estoque de produto!");
			 }
			 
			});
		});
	</script>
<!--#######################################################-->
<!--FUNÇÃO PARA INSERIR NOS INPUTS, O PRODUTO BUSCADO-->
<script type="text/javascript">
		$(document).ready(function(){
			$('#btnBuscarProduto').click(function(){
				dados=$('#frmBuscarProduto').serialize();
				
				$.ajax({
					type:"POST",
					data: dados,
					url:"../procedimentos/produtos/buscarProdutoPedido.php",
					success:function(r){
						dado=jQuery.parseJSON(r);


						$('#nome_produto').val(dado['nome_produto']);
						$('#valor_produto').val(dado['valor_produto']);
						document.getElementById('decremento').value= dado['decremento'];
						document.getElementById('qnt_estoque').value= dado['qnt_produto'];
						document.getElementById('cod_produto').value= dado['cod_produtovenda'];
						if (dado['nome_produto'] != null) {
							abilitarQuantidade();
						}else{
							alert("Produto Não Encontrado!");
						}
						

					}

				})
		      });
		});
</script>
<!--################################################################-->
<!--FUNÇÃO PARA INICIAR PEDIDO-->
<script type="text/javascript">
		$(document).ready(function(){
			$('#btnIniciarPedido').click(function(){
				dados=$('#frmIniciarPedido').serialize();
				

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/pedidos/iniciarPedido.php",
					success:function(r){
						if(r==1){
							escondercampo();
							alertify.success("Pedido iniciado");
						}else{
							alertify.error("Pedido não iniciado");
						}
					}
				});
			});
		});
	</script>

<!--##########################################################-->
<!--JAVASCRIPT PARA CONTROLE DE CAMPOS-->
<script type="text/javascript">
	function escondercampo(){
			document.getElementById("nome_cliente").disabled = true;
			buscarIdPedido();
	}

	function desabilitarInicio(){
		document.getElementById("nome_produto").disabled = true;
		document.getElementById("valor_produto").disabled = true;
		document.getElementById("quantidade").disabled = true;
		document.getElementById("cod_produto").disabled = true;
		document.getElementById("numero_pedido").disabled = true;
		document.getElementById("valor_total_input").disabled = true;
		
	}

	function abilitarInicio(){
		document.getElementById("nome_produto").disabled = false;
		document.getElementById("valor_produto").disabled = false;
		document.getElementById("nome_cliente").disabled = false;
		
	}


	function abilitarQuantidade(){
		document.getElementById("quantidade").disabled = false;
	}

	function limpaCampos(){

		document.getElementById('nome_produto').value= "nome produto";
		document.getElementById('valor_produto').value= "valor produto";
		document.getElementById('cod_produto').value= "código produto";
		document.getElementById('quantidade').value= "";
		document.getElementById('codigo_produto').value= " ";
		document.getElementById("quantidade").disabled = true;

	}

		


	function setValorTotal(valor){
		var num_pedido = document.getElementById("numero_pedido").value;
		
		$.ajax({
			type:"POST",
			data:{numero_pedido: num_pedido, valor_total_pedido: valor},
			url:"../procedimentos/pedidos/finalizarPedidoTotal.php",
			success:function(r){	

				if(r == 1){
					
					window.location.href="../Views/TelaCadPedidos.php";

				}else{

					alertify.error("O pedido não foi finalizado");
				}
					
			}
		});
		
	}

	function buscarIdPedido(){
		dados = 1;
		$.ajax({
			type:"POST",
			data:dados,
			url:"../procedimentos/pedidos/buscarIdPedido.php",
			success:function(r){
				dado=jQuery.parseJSON(r);

				$('#numero_pedido').val(dado['cod_pedido']);
			}
		});

	}

</script>	


