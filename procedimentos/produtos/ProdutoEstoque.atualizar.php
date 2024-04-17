<?php 

require_once "../../classes/produtos.class.php";
require_once "../../classes/conexao.class.php";

$obj = new produtos();

$dados = array(

    $_POST['cod_produto'],
    $_POST['decremento'],
    $_POST['qnt_atualizada']

);

echo $obj->atualizarProdutoEstoque($dados);

?>