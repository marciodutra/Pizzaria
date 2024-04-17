<?php 

Class Pedido{
   
    public function iniciarPedido($dados){
        
        $c = new conectar();

		$conexao = $c->conexao();

        session_start();

		$valto = 00;
		$codfun = $_SESSION['cod_func'];
        //$codfun = 1;
    	$data = date('Y/m/d');
    	$hora = date('H:i:s');
    		

    	$sql = "INSERT INTO tab_pedido(data_pedido, hora_pedido, valor_total, cod_cliente, cod_funcionario) VALUES ('$data', '$hora', '$valto', '$dados[0]', '$codfun')";
        

    	$result = mysqli_query($conexao, $sql);

    	if ($result == "false") {
    		return 1;
    	} else {
    		return 0;
    	}

    }
    public function atualizarEstoque($cod_pro_atualizar, $qntEstoque){
         $c = new conectar();

        $conexao = $c->conexao();

        $sql = "UPDATE tab_produtovenda SET qnt_produto = '$qntEstoque' WHERE cod_produtovenda = '$cod_pro_atualizar'";

        return mysqli_query($conexao, $sql);
    }

    public function inserirProdutoPedido($dados){
        $c = new conectar();

        $conexao = $c->conexao();

        $sql = "INSERT INTO tab_itempedido(quantidade, valor_item, cod_produtovenda, cod_pedido) VALUES ('$dados[0]','$dados[4]', '$dados[1]', '$dados[2]')";
        

        $result = mysqli_query($conexao, $sql);
        

        if ($result == "false") {

            return self::atualizarEstoque($dados[1], $dados[3]);

        } else {
            return 0;
        }

    }
    public function buscarIdPedido($dado){
        $c = new conectar();

        $conexao = $c->conexao();


        $sql = "SELECT cod_pedido FROM tab_pedido ORDER BY cod_pedido DESC LIMIT 1";
        

        $result = mysqli_query($conexao, $sql);

        $mostra = mysqli_fetch_row($result);

        $dados = array(

            'cod_pedido' => $mostra[0]
        
         );

        return $dados;

    }

    public function atualizarPedidoModal($dados){

        $c = new conectar();

        $conexao = $c->conexao();

        $sql = "UPDATE tab_pedido SET status_pedido = '$dados[1]' WHERE cod_pedido = '$dados[0]'";

        return mysqli_query($conexao, $sql);
    }

    public function finalizarPedidoTotal($dados){
        $c = new conectar();

        $conexao = $c->conexao();

        $sql = "UPDATE tab_pedido SET valor_total = '$dados[1]', fechado = 'sim' WHERE cod_pedido = '$dados[0]'";

        return mysqli_query($conexao, $sql);

    }

}

?>