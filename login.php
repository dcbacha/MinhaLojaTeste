<?php 

include("conecta.php");
include("funcoes.php");
include("validar.php");
?>

<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Minha Loja</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
  </head>
<body>


<body>

    <!-- Static navbar -->
    <nav class="navbar navbar-inverse navbar-static-top">
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
        </div><!--/.nav-collapse -->
      </div>
    </nav>
	
	<div class = "container fixed">
		
		<div class = "principal">

			<h1>Bem Vindo!</h1>

<?php

	if (!isset($_SESSION['user'])){ 
?>
           <div class="page-header">
                <h2>Login</h2>
            </div>
            <div class="row">
             <div class="col-md-4"></div>
            <form  method="post">
            <table class="fixed">
            
                <tr>
                    <td>User</td>
                    <td><input class="form-control" type="text" name="user"></td>
                </tr>
                <tr>
                    <td>Senha</td>
                    <td><input class="form-control" type="password" name="senha"></td>
                </tr>
                <tr>
                    <td><button type="submit" class="btn btn-primary" name="login">Login</button></td>
                </tr>
            </table>
            </form>


<?php } 


if(isset($_POST['login'])){
	$usuario = $_POST['user'];
	$senha = $_POST['senha'];

	logar($usuario , $senha );

	$_SESSION['user']=$usuario;

	}
	

?>



<?php include("rodape.php") ?>