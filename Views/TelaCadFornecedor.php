<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Fucnionário</title>
	<?php require_once "dependencias.php" ?>
	<?php require_once "TelaMenu.php" ?>
	<script src="../lib/jquery-3.2.1.min.js"></script>
	<script src="../js/funcoes.js"></script>
	
</head>
<body>
	<?php require_once "TelaMenu.php" ?>
<div class="container" style="position: relative; margin-left: 400px; top: 30px" >
			<h1>Cadastro do Fornecedor</h1>
			<div class="row">
				<div class="col-sm-5">
					<form id="frmCadFornecedor">
						<label>Nome do Fornecedor</label>
						<input type="text" class="form-control input-sm" id="nome_fornecedor" name="nome_fornecedor">
						<label class="input-label">Razão Social</label>
						<input type="text" class="form-control input-sm" id="razao_fornecedor" name="razao_fornecedor">
						<label>CNPJ Fornecedor </label>
				        <input type="text" class="form-control input-sm" id="cnpj_fornecedor" name="cnpj_fornecedor">
						<label>E-mail do Fornecedor</label>
						<input type="email" class="form-control input-sm" id="email_fornecedor" name="email_fornecedor">
						<label>Telefone</label>
						<input type="text" class="form-control input-sm" id="telefone_fornecedor" name="telefone_fornecedor">
						<label>Endereço-Bairro</label>
						<input type="text" class="form-control input-sm" id="bairro_fornecedor" name="bairro_fornecedor">
				        <label>Endereço-Rua</label>
						<input type="text" class="form-control input-sm" id="rua_fornecedor" name="rua_fornecedor">
						<label>Endereço-N° Casa</label>
						<input type="number" class="form-control input-sm" id="numero_fornecedor" name="numero_fornecedor">
						<p></p>
						<span class="btn btn-primary" style="position: relative; margin-left: 315px" id="btnCadastrarFornecedor">Cadastrar</span>
						
					</form>
				</div>
			</div>
		</div>
	
</body>
</html>

<script type="text/javascript">
		$(document).ready(function(){
			$('#btnCadastrarFornecedor').click(function(){

				vazios=validarFormVazio('frmCadFornecedor');

				if(vazios > 0){
					alertify.alert("Preencha os Campos!!");
					return false;
				}

				dados=$('#frmCadFornecedor').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/fornecedor/cadastrofornecedor.php",
					success:function(r){

						if(r==1){
							$('#frmCadFornecedor')[0].reset();
							alertify.success("Fornecedor Cadastrado");
						}else{
							alertify.error("Fornecedor não Cadastrar");
						}
					}
				});
			});
		});
	</script>