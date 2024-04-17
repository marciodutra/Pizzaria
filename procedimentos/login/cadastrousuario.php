<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/usuarios.class.php";

$obj = new usuarios();

$dados = array(
   $_POST['nome_user'],
   $_POST['senha_user'],
   $_POST['acesso_user'],
   $_POST['codigo_funcionario']

);

echo $obj->cadastroUsuario($dados);

?>