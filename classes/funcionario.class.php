<?php 

Class funcionarios{

	public function cadastrarFuncionario($dados){

		$c = new conectar();

		$conexao = $c->conexao();

		$sql = "INSERT INTO tab_funcionario (nome_funcionario, cargo, data_nascimento, cpf_funcionario,telefone1, telefone2, data_admissao, rua_funci, bairro_funci, numero, salario) VALUES ('$dados[0]','$dados[1]','$dados[2]','$dados[3]','$dados[4]','$dados[5]','$dados[6]','$dados[7]','$dados[8]','$dados[9]', '$dados[10]')";


		return mysqli_query($conexao, $sql);

	}


	public function obterDadosFuncionario($dados){
		$c = new conectar();

		$conexao = $c->conexao();


		$sql = "SELECT cod_funcionario, nome_funcionario, cpf_funcionario, telefone1, data_nascimento, rua_funci, bairro_funci, numero, cargo, salario, telefone2 FROM tab_funcionario WHERE cod_funcionario = '$dados'";


		$result = mysqli_query($conexao, $sql);

		$mostrar = mysqli_fetch_row($result);

		$dados = array(

			'cod_funcionario' =>    $mostrar[0],
			'nome'            => 	$mostrar[1],
			'cpf' => 				$mostrar[2],
			'telefone1' => 			$mostrar[3],
			'nascimento' => 		$mostrar[4],
			'rua' => 				$mostrar[5],
			'bairro' => 			$mostrar[6],
			'numero' => 			$mostrar[7],
			'cargo' => 				$mostrar[8],
			'salario' => 			$mostrar[9],
			'telefone2' => 			$mostrar[10]
			

		);

		return $dados;

	}


	public function atualizarFuncionarioModal($dados){
		$c = new conectar();

		$conexao = $c->conexao();

		$sql = "UPDATE tab_funcionario SET nome_funcionario = '$dados[1]', cpf_funcionario  = '$dados[2]', telefone1  = '$dados[3]',telefone2  = '$dados[10]' , data_nascimento  = '$dados[4]', rua_funci  = '$dados[5]', bairro_funci  = '$dados[6]', numero  = '$dados[7]', cargo  = '$dados[8]', salario  = '$dados[9]' WHERE cod_funcionario = '$dados[0]'";


		return mysqli_query($conexao, $sql);
	}
}

?>