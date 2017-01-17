
<?php include("cabecalho.php"); ?> <!-- aqui ele insere o codigo que está no arquivo cabecalho.php para reaproveitarmos codigo!!--> 
<?php include("funcoes.php") ;
include("conecta.php"); ?>
			
<?php

		
	$nome = $_POST['nome']; //pega parametro enviado pela URL
	$preco = $_POST['preco'];

	
	$query = "insert into produtos (nome, preco) values ('".$nome."', '".$preco."')";

	if(mysqli_query($conexao, $query)){
		echo "Produto adicionado com sucesso";
?>
	 <!--<p class = "alert-success">
		Produto <?= $nome; ?> , <?= $preco; ?> adicionado com sucesso 
	</p> -->	
	<?php  voltar_formulario() ?>

<?php
	}

	//die();


?>

<?php include("rodape.php"); ?>