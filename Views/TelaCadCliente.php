<!DOCTYPE html>
	<html>
	<head>
		<title>clientes</title>
		<meta charset="utf-8">
		<?php require_once "TelaMenu.php"; ?>
		<script src="../lib/jquery-3.2.1.min.js"></script>
		<script src="../js/funcoes.js"></script>
	</head>
	<body>
		<div class="container" style="position: relative; margin-left: 400px; top: 30px" >
			<h1>Cadastro do Clientes</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmClientes">
						<label>Nome</label>
						<input type="text" class="form-control input-sm" id="nome_cliente" name="nome_cliente">
						<label>CPF</label>
						<input type="text" class="form-control input-sm" id="cpf_cliente" name="cpf_cliente">
						<label>Telefone</label>
						<input type="text" class="form-control input-sm" id="telefone_cliente" name="telefone_cliente">
						<label>Nascimento</label>
						<input type="date" class="form-control input-sm" id="nascimento_cliente" name="nascimento_cliente" required="true">
						<label>Endereco-Rua</label>
						<input type="text" class="form-control input-sm" id="rua_cliente" name="rua_cliente">
						<label>Endereco-Bairro</label>
						<input type="text" class="form-control input-sm" id="bairro_cliente" name="bairro_cliente">
						<label>Endereco-N° Casa</label>
						<input type="number" class="form-control input-sm" id="numero_cliente" name="numero_cliente">
						<p></p>
						<span class="btn btn-primary" style="position: relative; margin-left: 315px" id="btnCadastrarCliente">Cadastrar</span>
					</form>
				</div>
				<div class="col-sm-8">
					<div id="tabelaClientesLoad"></div>
				</div>
			</div>
		</div>

	</body>
	</html>

	<script type="text/javascript">
		$(document).ready(function(){

			$('#btnCadastrarCliente').click(function(){

				vazios=validarFormVazio('frmClientes');

				if(vazios > 0){
					alertify.alert("Preencha os Campos!!");
					return false;
				}

				dados=$('#frmClientes').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/clientes/cadastrocliente.php",
					success:function(r){

						if(r==1){
							$('#frmClientes')[0].reset();
							alertify.success("Cliente Adicionado");
						}else{
							alertify.error("Não foi possível adicionar");
						}
					}
				});
			});
		});
	</script>

	
<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').width(100);
      $('.logo').height(60);

    }
    else {
      $('.logo').height(100);
      $('.logo').width(150);
    }
  }
  );
</script>