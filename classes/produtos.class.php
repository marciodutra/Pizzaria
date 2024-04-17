<?php 

class produtos{

  public function cadastrarProduto($dados){

  	$con = new conectar();
  	$conexao = $con->conexao();

  	$sql = "INSERT INTO tab_produtovenda(nome_produto, valor_produto, descricao_produto, decremento, qnt_produto)VALUES('$dados[0]','$dados[1]','$dados[2]','$dados[3]', '$dados[4]');";


  	return mysqli_query($conexao, $sql);

  }


  public function buscarProdutoPedido($dados){

    	$con = new conectar();
    	$conexao = $con->conexao();

    	$sql = "SELECT cod_produtovenda, nome_produto, valor_produto, decremento, qnt_produto FROM tab_produtovenda WHERE cod_produtovenda='$dados[0]'";


    	$result = mysqli_query($conexao, $sql);

      $mostra = mysqli_fetch_row($result);

     $dados = array(

        'cod_produtovenda' => $mostra[0],
        'nome_produto' => $mostra[1],
        'valor_produto' => $mostra[2],
        'decremento' => $mostra[3],
        'qnt_produto' => $mostra[4]
        
     );

     return $dados;


  }

  public function obterDadosProdutoModal($dados){
      $con = new conectar();
      $conexao = $con->conexao();

      $sql = "SELECT cod_produtovenda, nome_produto, valor_produto, descricao_produto, qnt_produto FROM tab_produtovenda WHERE cod_produtovenda = '$dados'";


      $result = mysqli_query($conexao, $sql);

      $mostra = mysqli_fetch_row($result);

     $dados = array(

        'cod_produtovenda' => $mostra[0],
        'nome_produto' => $mostra[1],
        'valor_produto' => $mostra[2],
        'descricao_produto' => $mostra[3],
        'qnt_produto' => $mostra[4]
        
     );

     return $dados;

  }

  public function atualizarDadosProduto($dados){
    $con = new conectar();

    $conexao = $con->conexao();
     

    $sql = "UPDATE tab_produtovenda SET nome_produto = '$dados[1]', valor_produto = '$dados[2]', descricao_produto = '$dados[3]' where cod_produtovenda = '$dados[0]'";

    echo mysqli_query($conexao, $sql);


  }

  public function atualizarProdutoEstoque($dados){
    $con = new conectar();

    $conexao = $con->conexao();

    $sql = "UPDATE tab_produtovenda SET qnt_produto = '$dados[2]', decremento = '$dados[1]' WHERE cod_produtovenda = '$dados[0]'";


    echo mysqli_query($conexao, $sql);

  }

}

?>