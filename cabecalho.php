<!DOCTYPE html>



<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="psgicon.ico">
       <!-- <link rel="icon" href="../../favicon.ico"> aqui o cara pega o icone que fica na aba!!--> 

    <title>Minha Loja</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap theme 

    <link href="css/bootstrap-theme.min.css" rel="stylesheet"> -->



    <!-- Custom styles for this template 
    <link href="theme.css" rel="stylesheet">
    <link href = "css/loja.css" rel="stylesheet" /> -->

  </head>

<?php  include("validar.php"); 


    
  if(isset($_SESSION['user'])){
    $usuario = $_SESSION['user'];
  }
  else{
    $usuario = NULL;
    header ("location: http://localhost/loja/index.php?");
  }

    ?>



<body>

    <!-- Static navbar -->
    <nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--<a class="navbar-brand">Minha Loja</a> -->
		      <a class="navbar-brand" href="index.php">Minha Loja</a>

        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="http://localhost/loja/checa_bd.php">Checa BD</a></li> <!-- essa class active que fala q está ali?-->
            <li><a href="produto-formulario.php">Cadastro de Produtos</a></li>

            <?php 
            if($usuario == "admin"){
            	 ?>
            <li><a href="checa_bd_usuarios.php">Usuários</a></li>
            <li><a href="usuario-formulario.php">Cadastro de Usuários</a></li>
 			<?php 
 			}
            ?>
            <li><a href="contato.php">Contato</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">

          	  <?php 
            if($usuario != NULL){
            	 ?>
            <li><a>Você está logado como: <?= $usuario ?></a></li>

            <?php 
 			}else{
            ?>
             <li><a>Você NÃO está logado!!!</a></li>
            <?php 
 			}
            ?>
           <!-- <li class="inactive"><a href="./">Static top<span class="sr-only">(current)</span></a></li> -->
            <li class="active" ><a href="logout.php">Logout</a></li> <!-- href="../navbar-fixed-top/"-->

		

          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>
    <br/>




    <!-- PRECISA DESSES PARA O DROPDOWN  DE MEDIA QUERY FUNCIONAR!!!! -->
    <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>

    

</body>



	
	<div class = "container fixed">
		
		<div class = "principal">

