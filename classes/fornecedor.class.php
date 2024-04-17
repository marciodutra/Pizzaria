<?php 

Class fornecedores{

	public function cadastrarFornecedor($dados){
		$c = new conectar();
		$conexao = $c->conexao();

		$sql = "INSERT INTO tab_fornecedor (nome_fornecedor, razao_social, cnpj_fornecedor, email, telefone, bairro_fornecedor, rua_fornecedor, numero) VALUES ('$dados[0]','$dados[1]','$dados[2]','$dados[3]','$dados[4]','$dados[5]','$dados[6]','$dados[7]')";


		return mysqli_query($conexao, $sql);

	}
}

?>