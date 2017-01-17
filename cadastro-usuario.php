
<?php include("cabecalho.php"); ?> <!-- aqui ele insere o codigo que está no arquivo cabecalho.php para reaproveitarmos codigo!!--> 
<?php include("funcoes.php");
include("conecta.php"); ?>
			
<?php

		
	$cad_usr = $_POST['user'];
	$cad_senha = $_POST['senha'];

	$senha_crip = md5($cad_senha); 

	
	$query = "insert into usuarios (user, senha) values ('".$cad_usr."', '".$senha_crip."')";

	if(mysqli_query($conexao, $query)){

	header ("location: http://localhost/loja/usuario-formulario.php?");
    

	}
	else{
		echo "Usuário inválido";
	}
	

	voltar() ;
?>

<?php include("rodape.php"); ?>