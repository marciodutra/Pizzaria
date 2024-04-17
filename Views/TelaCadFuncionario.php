<!DOCTYPE html>
<html>
<head>
	<title>Cadastro de Funcionário</title>
	<?php require_once "dependencias.php" ?>
	<script src="../lib/jquery-3.2.1.min.js"></script>
	<script src="../js/funcoes.js"></script>
	<link rel="stylesheet" type="text/css" href="../css/estiloFuncionario.css">

</head>
<body>
	<?php require_once "TelaMenu.php" ?>
<div class="container" style="position: relative; margin-left: 400px; top: 30px">
			<h1>Cadastro do Funcionário</h1>
			<div class="row">
				<div class="col-sm-7">
					<form id="frmCadFuncionario">
						<label>Nome do Funcionario</label>
						<input type="text" class="form-control input-sm" id="nome_funcio" name="nome_funcio">
						<div id="pcargo">
							<label class="input-label">Cargo</label>
							<input type="text" class="form-control input-sm" id="cargo_funcio" name="cargo_funcio">
							<label>Data de Admissão</label>
					        <input type="date" class="form-control input-sm" 
					        id="admissao_funcio" name="admissao_funcio">
					        <div id="divsalario">
					        <label>Salário Inicial</label>
								<input type="text" class="form-control input-sm" id="salario_funcio" name="salario_funcio">
							</div>
				        </div>
				        <div id="pcpf">
							<label>CPF do Funcionario</label>
							<input type="text" maxlength="11" class="form-control input-sm" id="cpf_funcio" name="cpf_funcio">
							 <div class="posicionatel">
								<label>Data de nascimento</label>
						        <input type="date" class="form-control input-sm" id="nascimento_funcio" name="nascimento_funcio">
					        </div>
					        <hr>
								<label>Telefone 01</label>
								<input type="text" class="form-control input-sm" maxlength="11" id="telefone_funcio" name="telefone_funcio1">
							<div class="posicionatel">
								<label>Telefone 02</label>
								<input type="text" class="form-control input-sm" maxlength="11" id="telefone_funcio" name="telefone_funcio2">
							</div>
							
				        </div>
				            
					        <div id="pendereco">
					        <label>Endereço-Rua</label>
							<input type="text" class="form-control input-sm" id="rua_funcio" name="rua_funcio">
							<label>Endereço-Bairro</label>
							<input type="text" class="form-control input-sm" id="bairro_funcio" name="bairro_funcio">
							<label>Endereço-N° Casa</label>
							<input type="number" class="form-control input-sm" id="numero_funcio" name="numero_funcio">
						</div>
						<p></p>
						<div id="positionButton">
							<span class="btn btn-primary" 
							id="btnCadastrarFuncionario">Cadastrar</span>
						</div>
					</form>
				</div>
			</div>
		</div>
	
</body>
</html>

<script type="text/javascript">
		$(document).ready(function(){
			$('#btnCadastrarFuncionario').click(function(){

				vazios=validarFormVazio('frmCadFuncionario');

				if(vazios > 0){
					alertify.alert("Preencha os Campos!!");
					return false;
				}

				dados=$('#frmCadFuncionario').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/funcionario/cadastrofuncionario.php",
					success:function(r){
						alert(r);

						if(r==1){
							$('#frmCadFuncionario')[0].reset();
							alertify.success("Funcionário Cadastrado");
						}else{
							alertify.error("Funcionário não Cadastrado");
						}
					}
				});
			});
		});
	</script>