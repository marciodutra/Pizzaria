<?php 

Class clientes{

	public function cadastrarCliente($dados){

		$con = new conectar();

    	$conexao = $con->conexao();
	   

		$sql = "INSERT INTO tab_cliente (nome_cliente, cpf_cliente, telefone, data_nascimento, rua_cliente, bairro_cliente, numero ) VALUES ('$dados[0]','$dados[1]','$dados[2]','$dados[3]','$dados[4]','$dados[5]','$dados[6]');";

	    return mysqli_query($conexao, $sql);


	}
	public function obterDadosCliente($dados){

		$con = new conectar();

    	$conexao = $con->conexao();
	   

		$sql = "SELECT nome_cliente, cpf_cliente, bairro_cliente, rua_cliente, numero, telefone, data_nascimento, cod_cliente FROM tab_cliente WHERE cod_cliente = '$dados'";

		$result = mysqli_query($conexao, $sql);
		$mostrar = mysqli_fetch_row($result);

		$dados = array(

			'nome' => $mostrar[0],
			'cpf' => $mostrar[1],
			'bairro' => $mostrar[2],
			'rua' => $mostrar[3],
			'numero' => $mostrar[4],
			'telefone' => $mostrar[5],
			'nascimento' => $mostrar[6],
			'cod_cliente' => $mostrar[7]
				
		);

		return $dados;

	}
	public function atualizarDadosCliente($dados){

		$con = new conectar();

    	$conexao = $con->conexao();
	   

		$sql = "UPDATE tab_cliente SET nome_cliente = '$dados[1]', cpf_cliente = '$dados[2]',telefone = '$dados[3]',data_nascimento = '$dados[4]',rua_cliente = '$dados[5]',bairro_cliente = '$dados[6]', numero = '$dados[7]' where cod_cliente = '$dados[0]'";

		echo mysqli_query($conexao, $sql);

	}
}


?>