<?php 
class usuarios{
	public function logar($dados){
	   
       $con = new conectar();

       $conexao = $con->conexao();

       session_start();
	   
	   $_SESSION['cod_func'] = self::buscarDadosUsuario($dados);
	   $_SESSION['usuario'] = $dados[0];

	   $sql = "SELECT * FROM tab_usuarios WHERE usuario = '$dados[0]' AND senha = '$dados[1]'";

	   $result = mysqli_query($conexao, $sql);

	   if(mysqli_num_rows($result) > 0){
	   	   
			return 1;
		}else{
			return 0;
		}

    }

    public function cadastroUsuario($dados){

    	$c = new conectar();
    	$conexao = $c->conexao();


    	$sql = "INSERT INTO tab_usuarios (usuario, senha, nivel_acesso, cod_funcionario) VALUES ('$dados[0]','$dados[1]','$dados[2]','$dados[3]');";

    	return mysqli_query($conexao, $sql);

    }

    public function buscarDadosUsuario($dados){

    	$c = new conectar();
    	$conexao = $c->conexao();

    	$sql = "SELECT fun.cod_funcionario FROM tab_usuarios usu JOIN tab_funcionario fun on fun.cod_funcionario = usu.cod_funcionario where usu.usuario = '$dados[0]' and usu.senha = '$dados[1]'";

		$result = mysqli_query($conexao, $sql);
		$mostra = mysqli_fetch_row($result);

		return $mostra[0];
    }
}

?>