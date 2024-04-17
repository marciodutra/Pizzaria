<?php 
require_once "../classes/conexao.class.php";

$c = new conectar();
$conexao = $c->conexao();

$sql = "SELECT cod_funcionario, nome_funcionario FROM tab_funcionario";

$nomes = mysqli_query($conexao, $sql);

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
			<h1>Cadastro do Usuario</h1>
			<div class="row">
				<div class="col-sm-4">
					<form id="frmCadUsuario">
						<label>Usuario</label>
						<input type="text" maxlength="15" class="form-control input-sm" id="nome_user" name="nome_user">
						<label>Senha</label>
						<input type="password" maxlength="20" class="form-control input-sm" id="senha_user" name="senha_user">
						<label>Nivel de Acesso</label>
							<select type="text" class="form-control input-sm" 
							    id="acesso_user" name="acesso_user">
								<option value="1">Nivel Baixo</option>
								<option value="2">Nivel Medio</option>
								<option value="3">Nivel Alto</option>
							</select>
						<label>Nome Funcionário</label>
							<select type="text" class="form-control input-sm" id="codigo_funcionario" name="codigo_funcionario">
								<option selected="Selecione Funcionario">Selecione Funcionario</option>
								<?php while($mostrar = mysqli_fetch_row($nomes)) :?>
									<option value="<?php echo $mostrar[0] ?>"><?php echo $mostrar[1] ?></option>
							    <?php endWhile; ?>
						    </select>
						<p></p>
						<span class="btn btn-primary" style="position: relative; margin-left: 270px" id="btnCadastrarUsuario">Cadastrar</span>
					</form>
				</div>
			</div>
		</div>
</body>
</html>

<script type="text/javascript">
		$(document).ready(function(){
			$('#btnCadastrarUsuario').click(function(){

				vazios=validarFormVazio('frmCadUsuario');

				if(vazios > 0){
					alertify.alert("Preencha os Campos!!");
					return false;
				}

				dados=$('#frmCadUsuario').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/login/cadastrousuario.php",
					success:function(r){
						if(r==1){
							$('#frmCadUsuario')[0].reset();
							alertify.success("Usuario cadastrado com sucesso!");
						}else{
							alertify.error("Usuario não cadastrado");
						}
					}
				});
			});
		});
	</script>
