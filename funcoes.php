<?php
/*

function altera(){

		include("conecta.php");  //tem que dar include dentro da function, senao da ruim!!
		$nome_produto = $_POST['nome_prod'];
		$nome_novo = $_POST['nome_novo'];

		$query_checa = "select * from produtos where nome = '".$nome_produto."'  ";

		$resultado = mysqli_query($conexao, $query_checa);

		if( mysqli_num_rows($resultado) > 0 ){
			
			$query_altera = "update produtos set nome = '".$nome_novo."' where nome = '".$nome_produto."'";
			mysqli_query($conexao, $query_altera);
			//echo  "<script>alert('Produto alterado com sucesso!'); </script>";
			echo "Produto alterado com Sucesso!";

		}
		else{
			//echo  "<script>alert('Produto não encontrado!'); </script>";
			echo "<font color='red'>Produto não encontrado!</font>";
		}
		

	
		mysqli_close($conexao);


}

function altera_preco(){

		include("conecta.php");  //tem que dar include dentro da function, senao da ruim!!
		$nome_produto = $_POST['nome_prod'];
		$preco_novo = $_POST['preco_novo'];

		$query_checa = "select * from produtos where nome = '".$nome_produto."'  ";

		$resultado = mysqli_query($conexao, $query_checa);

		if( mysqli_num_rows($resultado) > 0 ){
			
			$query_altera = "update produtos set preco = '".$preco_novo."' where nome = '".$nome_produto."'";
			mysqli_query($conexao, $query_altera);
			//echo  "<script>alert('Preco de alterado com sucesso!'); </script>";
			echo "Produto alterado com sucesso!";

		}
		else{
			//echo  "<script>alert('Produto não encontrado!'); </script>";
			echo "<font color='red'>Produto não encontrado!</font>";
		}
		

	
		mysqli_close($conexao);

}




function voltar_BD(){

?>
	<form action= "checa_bd.php"> 
		
			<input type = "submit" value = "Voltar" />

	</form>


<?php
	die();
}
*/

function botao_checaBd(){

?>
	<form action= "checa_bd.php">  <!-- aqui ele cria o botão que vai chamar esta função-->
		
		<input type = "submit" value = "Verificar BD" />
	</form>
	<?php
}


function botao_ir_para_cadastro(){

?>
	<form action= "produto-formulario.php">  <!-- aqui ele cria o botão que vai chamar esta função-->
		
		<input type = "submit" value = "Cadastro de produtos" />
	</form>
	<?php
}


///////////////////////////////////////////////////////////
function botao_logout(){

?>	
	<form method="post"> <!-- aqui ele define que o fomrulario irá realiar a acao de chamar a outra página-->
		
		
		<input type = "submit" name="logout"  value = "logout" />

	</form>
	<?php

		if(isset($_POST['logout'])){ //aqui ele só chama a função depois que apertamos o deletar

		logout();
		header ("location: index.php");

}
}


///////////////////////////////////////////////////////////
function botao_cadastro_Usuarios(){

?>
	<form action= "usuario-formulario.php">  <!-- aqui ele cria o botão que vai chamar esta função-->
		
		<input type = "submit" value = "Cadastro Usuarios" />
	</form>
	<?php
}

?>

<?php

//////////////////////////////////////////
function botao_cadastro(){

?>
	<form action= "produto-formulario.php"> 
		
			<input type = "submit" value = "Cadastro de Produtos" />

	</form>


<?php
}
?>


<?php
//////////////////////////////////////////////////////////
function voltar(){

?>
	<form method="post"> 
				<input type = "submit" name="voltar" value = "Voltar" />
	</form>

<?php

	if(isset($_POST['voltar'])){

		header ("location: http://localhost/loja/checa_bd.php?");
	}
}



/////////////////////////////////
function listaProdutos(){
	include("conecta.php");
	$produtos = array();   //define a variavel produtos como array
	$query = "select * from produtos" ;
	$resultado = mysqli_query($conexao, $query);

	while ($produto = mysqli_fetch_assoc($resultado)){
		array_push($produtos, $produto); 	//aqui ele salva os dados de produtO na array produtoS, meio q uma redundância para reutilização de codigo?
	}
	return $produtos;
 	
 }

//////////////////////////////////////////////
 function listaUsuarios(){
	include("conecta.php");
	$usuarios = array();   //define a variavel produtos como aruray
	$query = "select * from usuarios" ;
	$resultado = mysqli_query($conexao, $query);

	while ($usuario = mysqli_fetch_assoc($resultado)){
		array_push($usuarios, $usuario); 	//aqui ele salva os dados de produtO na array produtoS, meio q uma redundância para reutilização de codigo?
	}
	return $usuarios;
 	
 }

 ?>