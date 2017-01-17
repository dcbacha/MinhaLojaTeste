<?php
	include("cabecalho.php");
	include("funcoes.php");


?>
	<form method="post"> <!-- aqui ele define que o fomrulario irá realiar a acao de chamar a outra página-->
		
		Nome do produto: <input type = "text" name="nome_prod" /><br/> <!-- pode-se notar que o type muda se queremos digitar um texto ou apenas numeros
																		e que também o nome da variável é definida em name-->

		Novo preco: <input type = "text" name="preco_novo" /><br/> 
		<input type = "submit" name="alterar"  value = "Alterar" />

	</form>



<?php
	
	if(isset($_POST['alterar'])){ //aqui ele só chama a função depois que apertamos o deletar

		altera_preco();
	}
	
	voltar_BD();

	include("rodape.php");
?>