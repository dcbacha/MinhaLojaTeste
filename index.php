<!DOCTYPE html>
<?php include("validar.php"); ?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="psgicon.ico">

    <title>Minha Loja</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/cover.css" rel="stylesheet">

  </head>

  <body>

    <div class="site-wrapper">

      <div class="site-wrapper-inner">

        <div class="cover-container">

		   
          	<div class="masthead clearfix">
            <div class="inner">
                <nav class="navbar navbar-inverse navbar-fixed-top">
        		<div class="container">
        		<div class="navbar-header">
          		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            		<span class="sr-only">Toggle navigation</span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
            		<span class="icon-bar"></span>
          		</button>
          		<a class="navbar-brand">Minha Loja</a>
        		</div>
        		<div id="navbar" class="navbar-collapse collapse">
          			
        		
      				<ul class="nav navbar-nav navbar-right">

          	  		<?php 
            		if(isset($_SESSION['user'])){
            	 	?>
            			<li><a>Você está logado como: <?= $_SESSION['user'] ?></a></li>            		
           			<!-- <li class="inactive"><a href="./">Static top<span class="sr-only">(current)</span></a></li> -->
            		<li class="active" ><a href="logout.php">Logout</a></li> <!-- href="../navbar-fixed-top/"-->
            		<?php 
 					}
            		?>
          		</ul>
    			</nav>
            	</div>
          	</div>
         
			
          <div class="inner cover">
          <img src="img/psg.jpg" class="img-thumbnail">
            <h1 class="cover-heading">Minha Loja</h1>

            <p class="lead">Descrição</p>
            <p class="lead">
              <?php
              	if(isset($_SESSION['user'])){	
              ?>
              	<a href="checa_bd.php" class="btn btn-lg btn-default">Entrar</a>
             <?php
          		}
              	else{
              ?>
             	<a href="login.php" class="btn btn-lg btn-default">Login</a>
              <?php
          		}
              ?> 

            </p>
          </div>

          <div class="mastfoot">
            <div class="inner">
              <p>Minha loja @psg</p>
            </div>
          </div>

        </div>

      </div>

    </div>


  <script>window.jQuery || document.write('<script src="js/jquery.min.js"><\/script>')</script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
