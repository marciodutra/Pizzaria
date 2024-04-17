<!DOCTYPE html>
	<html>
	<head>
		<title>Cadastro de Produtos</title>
		<meta charset="latin1">
		<?php require_once "TelaMenu.php"; ?>
		<?php require_once "dependencias.php" ?>
		<script src="../js/funcoes.js"></script>
		<script src="../lib/jquery-3.2.1.min.js"></script>
		<script type="text/javascript">
		window.onload = function(){

          desabilitar();

		}
	</script>

	</head>
	<body>
		<div class="container" style="position: relative; margin-left: 400px; top: 30px">
			<h1>Atualizar Estoque</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmAtualizaProdutoEstoque">
						<input type="text" class="form-control input-sm" id="pesquisa_nome" name="pesquisa_nome" placeholder="digite codigo produto">
					    <span class="btn btn-primary" id="btnBuscarProduto">Buscar</span><br>
						<label>Nome produto</label>
						<input type="text" hidden="" id="cod_produto" name="cod_produto">
						<input type="text" class="form-control input-sm" id="nome_produto" name="nome_produto">
						<label>Quantidade em estoque</label>
						<input type="text" class="form-control input-sm" id="quantidade_produto" name="quantidade_produto">
						<label>Forma de Armazenamento</label>
						<select class="form-control" id="decremento" name="decremento">
							<option value="0">Selecione forma de estoque</option>
							<option value="sim">Possui Estoque</option>
							<option value="nao">Não Possui Estoque</option>
						</select><br>
						<input type="text" class="form-control input-sm" id="quantidade_reposta" name="quantidade_reposta" placeholder="QNT reposta no estoque">
						<span class="btn btn-primary" id="btnAtualizarProduto">Atualizar</span>
					</form>
				</div>
			</div>
		</div>
</body>
</html>

<script type="text/javascript">
	$(document).ready(function(){
		$('#btnBuscarProduto').click(function(){
			var codigo = document.getElementById("pesquisa_nome").value;

			$.ajax({

				type:"POST",
				data: {codigo_produto: codigo},
				url:"../procedimentos/produtos/ProdutoEstoque.buscar.php",
				success:function(r){
					dado=jQuery.parseJSON(r);

				$('#nome_produto').val(dado['nome_produto']);
				document.getElementById('quantidade_produto').value= dado['qnt_produto'];
				document.getElementById('decremento').value= dado['decremento'];
				document.getElementById('cod_produto').value= dado['cod_produtovenda'];
				document.getElementById("quantidade_reposta").disabled = false;
				document.getElementById("quantidade_reposta").focus();
				

				}

			})
	    });
	});

	$(document).ready(function(){
		$('#btnAtualizarProduto').click(function(){

			vazios=validarFormVazio('frmAtualizaProdutoEstoque');
			var t1 = document.getElementById("cod_produto").value;
			var t2 = document.getElementById("nome_produto").value;
			var t3 = document.getElementById("decremento").value;

			if(vazios > 0 || t1 == null || t2 == ""){
				alert("Preencha os Campos!!");
				return false;
			}if( t3 == 0){
				alert("Selecione Forma de Armazenamento");
			}else{

			var cod_produto = document.getElementById("cod_produto").value;
			var qnt_estoque = parseInt(document.getElementById("quantidade_produto").value);
			var decremento = document.getElementById("decremento").value;
			var qnt_reposta = parseInt(document.getElementById("quantidade_reposta").value);

			var qnt_atualizada = qnt_estoque + qnt_reposta;


			$.ajax({
				type:"POST",
				data:{cod_produto: cod_produto, decremento: decremento, qnt_atualizada: qnt_atualizada},
				url:"../procedimentos/produtos/ProdutoEstoque.atualizar.php",
				success:function(r){
					
					if(r==1){
						
						alertify.success("Produto atualizado");
						atualizaPagina();

					}else{

						alertify.error("Produto não atualizado");
					}
				}
			});
			}
		});

	});
	function desabilitar(){
		document.getElementById("nome_produto").disabled = true;
		document.getElementById("quantidade_produto").disabled = true;
		document.getElementById("quantidade_reposta").disabled = true;
	}		

	function atualizaPagina(){
		document.getElementById('nome_produto').value= "";
		document.getElementById('quantidade_produto').value= "";
		document.getElementById('decremento').value= 0;
		document.getElementById('quantidade_reposta').value= "";
		document.getElementById('pesquisa_nome').value= "";
		document.getElementById("pesquisa_nome").focus();
		window.location.reload();
	}
</script>