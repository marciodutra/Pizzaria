<?php 

Class itemcozinha{

	public function cadastrarItemCozinha($dados){

		$c = new conectar();

		$conexao = $c->conexao();

		$sql = "INSERT INTO tab_itenscozinha(cod_fornecedor, nome_item, quantidade, validade, valor_item, descricao_item, categoria) VALUES ('$dados[0]','$dados[1]','$dados[2]','$dados[3]','$dados[4]','$dados[5]','$dados[6]')";


		return mysqli_query($conexao, $sql);

	}

	public function obterDadosItemCozinha($iditem){

		$c = new conectar();

		$conexao = $c->conexao();

		$sql = "SELECT cod_itenscozinha, nome_item, valor_item, validade, descricao_item, categoria, quantidade FROM tab_itenscozinha WHERE cod_itenscozinha = '$iditem'";


		$result = mysqli_query($conexao, $sql);


		$mostrar = mysqli_fetch_row($result);

		$dados = array(

			'codigo' => $mostrar[0],
			'nome' => $mostrar[1],
			'valor' => $mostrar[2],
			'validade' => $mostrar[3],
			'descricao' => $mostrar[4],
			'categoria' => $mostrar[5],
			'qnt_estoque' => $mostrar[6]
		);

		return $dados;
	}

	public function atualizarItemModal($dados){

		$c = new conectar();

		$conexao = $c->conexao();

		$sql = "UPDATE tab_itenscozinha SET nome_item = '$dados[1]', valor_item= '$dados[2]', validade = '$dados[5]', descricao_item = '$dados[4]', categoria = '$dados[6]', quantidade = '$dados[3]' WHERE cod_itenscozinha = '$dados[0]'";


		return mysqli_query($conexao, $sql);

	}
}

?>