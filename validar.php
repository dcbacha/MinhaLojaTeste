<?php

session_start();



function logar($usuario, $senha){


	$senha_crip = md5($senha);
	include("conecta.php");
	$query = "select * from usuarios where user = '".$usuario."' and senha = '".$senha_crip."' ";


	$resultado = mysqli_query($conexao, $query);
	$usr = mysqli_fetch_assoc($resultado);


	if (mysqli_num_rows($resultado)>0){

		$usuario_session = $usr['user'];

		$_SESSION['user'] = $usuario_session;
		$_SESSION['altera_antigo'] = array();
		$_SESSION['altera_novo'] = array();
		$_SESSION['del_produto'] = array();
		
		$_SESSION['nome_produto'] = array();
		$_SESSION['preco_produto'] = array();
		$_SESSION['nome_usuario'] = array();
		$_SESSION['del_usuario'] = array();
		$_SESSION['altera_usuario'] = array();
		
		header ("location: http://localhost/loja/index.php");

	}
	else{
		?>
		 <div class="alert alert-danger" role="alert">
        	<strong>Oh snap!</strong> Usuário ou senha inválidos.
     	 </div>
     	<?php
		session_destroy();
	}

}  

function logout(){
	session_destroy();
	$_SESSION = array();
	session_start();

}