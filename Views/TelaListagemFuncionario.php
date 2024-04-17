<?php 

	require_once "../classes/conexao.class.php";

	$c = new conectar();

    $conexao = $c->conexao();
    
    $sql =  "SELECT cod_funcionario, nome_funcionario, salario, data_nascimento, data_admissao, cargo, telefone1, telefone2 FROM tab_funcionario ";

    $result = mysqli_query($conexao, $sql);


?>
<!DOCTYPE html>
<html>
<head>
	<title>Lista de Pedidos</title>
	<?php require_once "TelaMenu.php" ?>
	<link rel="stylesheet" type="text/css" href="../css/listagem_geral.css">
	<link rel="stylesheet" type="text/css" href="../../lib/bootstrap/css/bootstrap.css">
</head>
<body>
	<div class="principal">
			<div id="cabecalho_pesquisa">
			<h2>Listagem de Funcionários</h2>
				<div id="mostrapedidos">
					<table border="1" class="" id="tabeladepedidos">
						<tr id="topo_tabela">
							<td>Cod Funcionário</td>
							<td>Nome</td>
							<td>Salário</td>
							<td>Nascimento</td>
							<td>Admissão</td>
							<td>Cargo</td>
							<td>Telefone 01</td>
							<td>Telefone 02</td>
							<td>Editar</td>
						</tr>
            </div>
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
								<span  data-toggle="modal" data-target="#abremodalUpdateFuncionario" class="btn btn-primary btn-xs" onclick="obterDadosFuncionario('<?php echo $mostrar[0] ?>')">
									<span class="glyphicon glyphicon-pencil"></span>
								</span>
							</td>
						</tr>

			<?php endWhile; ?>
					</table>
					
				</div>
		</div>
	</div>
<div class="modal fade" id="abremodalUpdateFuncionario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			<div class="modal-dialog modal-xm" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Atualizar Funcionário</h4>
					</div>
					<div class="modal-body">
						<form id="frmAtualizarFuncionarioU" enctype="multipart/form-data">
							<input type="text" hidden="" id="cod_funcionarioU" name="cod_funcionarioU">
							<label>Nome</label>
							<input type="text" class="form-control input-sm" id="nome_funcionarioU" name="nome_funcionarioU">
							<label>CPF</label>
							<input type="text" class="form-control input-sm" id="cpf_funcionarioU" name="cpf_funcionarioU">
							<label>Telefone</label>
							<input type="text" class="form-control input-sm" id="telefone_funcionarioU" name="telefone_funcionarioU">
							<label>Telefone</label>
							<input type="text" class="form-control input-sm" id="telefone_funcionarioU2" name="telefone_funcionarioU2">
							<label>Nascimento</label>
							<input type="date" class="form-control input-sm" id="nascimento_funcionarioU" name="nascimento_funcionarioU" required="true">
							<label>Cargo</label>
							<input type="text" class="form-control input-sm" id="cargo_funcionarioU" name="cargo_funcionarioU" required="true">
							<label>Salario</label>
							<input type="text" class="form-control input-sm" id="salario_funcionarioU" name="salario_funcionarioU" required="true">
							<label>Endereco-Rua</label>
							<input type="text" class="form-control input-sm" id="rua_funcionarioU" name="rua_funcionarioU">
							<label>Endereco-Bairro</label>
							<input type="text" class="form-control input-sm" id="bairro_funcionarioU" name="bairro_funcionarioU">
							<label>Endereco-N° Casa</label>
							<input type="number" class="form-control input-sm" id="numero_funcionarioU" name="numero_funcionarioU">	
						</form>
					</div>
					<div class="modal-footer">
						<button id="btnAtualizarFuncionario" type="button" class="btn btn-warning" data-dismiss="modal">Atualizar</button>

					</div>
				</div>
			</div>
		</div>
</body>
</html>
<script type="text/javascript">
		function obterDadosFuncionario(idfuncionario){

			$.ajax({
				type:"POST",
				data:"idfuncionario=" + idfuncionario,
				url:"../procedimentos/funcionario/obterDadosFuncionario.php",
				success:function(r){
					
					dado=jQuery.parseJSON(r);


					$('#cod_funcionarioU').val(dado['cod_funcionario']);
					$('#nome_funcionarioU').val(dado['nome']);
					$('#cpf_funcionarioU').val(dado['cpf']);
					$('#telefone_funcionarioU').val(dado['telefone1']);
					$('#nascimento_funcionarioU').val(dado['nascimento']);
					$('#rua_funcionarioU').val(dado['rua']);
					$('#bairro_funcionarioU').val(dado['bairro']);
					$('#numero_funcionarioU').val(dado['numero']);					
					$('#cargo_funcionarioU').val(dado['cargo']);
					$('#salario_funcionarioU').val(dado['salario']);
					$('#telefone_funcionarioU2').val(dado['telefone2']);
					

					
				}
			});
		}
		$(document).ready(function(){
			$('#btnAtualizarFuncionario').click(function(){
				dados=$('#frmAtualizarFuncionarioU').serialize();

				$.ajax({
					type:"POST",
					data:dados,
					url:"../procedimentos/funcionario/atualizarFuncionarioModal.php",
					success:function(r){

						if(r==1){

							window.location.reload();

						}else{
							alertify.error("Não foi possível atualizar funcionário");
						}
					}
				});
			})
		})
</script>