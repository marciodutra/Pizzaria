<?php require_once "dependencias.php" ?>

<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
<body>

  <!-- Begin Navbar -->
  <div id="nav">
    <div class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand" href="../index.php"><img class="img-responsive logo img-thumbnail" src="../img/" alt="" width="200px" height="150px"></a>-->
        </div>
        <div id="navbar" class="collapse navbar-collapse">

          <ul class="nav navbar-nav navbar-right">
            <!--<span id="mostra_usuario" style="color: #FFFF;">Usuario: <?php echo $_SESSION['usuario'] ?></span>-->
            

            <li class="active"><a href="TelaInicio.php"><span class="glyphicon glyphicon-home"></span> Inicio</a>
            </li>


          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list"></span> Gestão Inicial <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="TelaListagemPedidos.php">Listagem de Pedidos</a></li>
              <li><a href="TelaCadPedidos.php">Iniciar Novo Pedido</a></li>
              <li><a href="TelaAtualizarEstoque.php">Atualizar Estoque</a></li>
            </ul>
          </li>  

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-list-alt"></span>Listagem administrativa<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="TelaListagemFuncionario.php">Listagem de Funcionario</a></li>
              <li><a href="TelaListagemPedidos.php">Listagem de Pedidos</a></li>
              <li><a href="TelaListagemClientes.php">Listagem de Clientes</a></li>
              <li><a href="TelaListagemProdutosVenda.php">Listagem Produtos Vendas</a></li>
              <li><a href="TelaListagemItensCozinha.php">Listagem Itens Cozinha</a></li>
            </ul>
          </li>
 

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Cadastros do Sistema <span class="caret"></span></a>
            <ul class="dropdown-menu">
                <li><a href="TelaCadFuncionario.php">Cadastro Funcionário</a></li>
                <li><a href="TelaCadUsuario.php">Cadastro Usuário</a></li>
                <li><a href="TelaCadFornecedor.php">Cadastro Fornecedor</a></li>
                <li><a href="TelaCadProduto.php">Cadastro Produtos</a></li>
                <li><a href="TelaCadCliente.php">Cadastro Clientes</a></li>
                <li><a href="TelaCadItemCozinha.php">Cadastro Itens de Cozinha</a></li>

            </ul>
          </li>   

          
          <li class="dropdown" >
            <a href="#" style="color: red"  class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="glyphicon glyphicon-user"></span> Usuario:<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li> <a style="color: red" href="../procedimentos/login/sair.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
              
            </ul>
          </li>
        </ul>
      </div>
      <!--/.nav-collapse -->
    </div>
    <!--/.contatiner -->
  </div>
</div>
<!-- Main jumbotron for a primary marketing message or call to action -->





<!-- /container -->        


</body>
</html>

<script type="text/javascript">
  $(window).scroll(function() {
    if ($(document).scrollTop() > 150) {
      $('.logo').width(100);
      $('.logo').height(60);

    }
    else {
      $('.logo').height(100);
      $('.logo').width(150);
    }
  }
  );
</script>