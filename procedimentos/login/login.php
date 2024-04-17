<?php 

require_once "../../classes/conexao.class.php";
require_once "../../classes/usuarios.class.php";

$obj = new usuarios();


$dados = array(

  $_POST['usuario'],
  $_POST['senha']

);

echo $obj->logar($dados);

?>