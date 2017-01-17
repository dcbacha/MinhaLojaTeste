<?php
	include("cabecalho.php");
	include("funcoes.php");
	//include("validar.php");
	include("conecta.php");

	$nome_prod = $_SESSION["nome_produto"];
	$prec_prod = $_SESSION["preco_produto"];

?>
	<!--<form method="post" > <!-- aqui ele define que o fomrulario irá realiar a acao de chamar a outra página
		
		Nome do produto: <input type = "text" name="novo_nome" value = "<?php echo $nome_prod ;?>" /><br/> <!-- pode-se notar que o type muda se queremos digitar um texto ou apenas numeros

		Novo preco: <input type = "number" name="novo_preco" value= "<?php echo $prec_prod ;?>"/><br/> <!-- cuidado nos espaços!!!
		<input type = "submit" name="alterar_bd"  value = "Alterar" />

	</form> -->
			<div class="page-header">
        		<h2>Alterar dados</h2>
      		</div>
            <form  method="post" enctype="multipart/form-data">
            <table class="fixed">
            	
                <tr>
                    <td>Nome do Produto</td>
                    <td><input class="form-control" type="text" name="novo_nome" value = "<?php echo $nome_prod ;?>"></td>
                </tr>
                <tr>
                    <td>Preço</td>
                    <td><input class="form-control" type="number" name="novo_preco" value= "<?php echo $prec_prod ;?>"></td>
                </tr>
                <tr>
                <tr>
                    <td>Imagem:</td>
                   	<td><input type="file" name="fileUpload"></td>
                </tr>
                    <td><button type="submit" class="btn btn-primary" name="alterar_bd">Alterar</button>
						<button type="submit" class="btn btn-danger" name="cancela">Cancelar</button>
                    </td>
                </tr>
            </table>
            </form>



<?php
	
	if(isset($_POST['alterar_bd'])){ 

		$novo_nome = $_POST['novo_nome'];
		$novo_preco = $_POST['novo_preco'];

		$query_checa = "select * from produtos where nome = '".$nome_prod."'  ";

		$resultado = mysqli_query($conexao, $query_checa);

		$_SESSION['nome_produto'] = array();
    	$_SESSION['preco_produto'] = array();


    	if(file_exists('uploads/'.$nome_prod.'.png')){
			rename('uploads/'.$nome_prod.'.png', 'uploads/'.$novo_nome.'.png' );
		}

		if( mysqli_num_rows($resultado) > 0 ){
			
			$_SESSION['altera_antigo'] = $nome_prod;
			$_SESSION['altera_novo'] = $novo_nome;
 			$query_altera = "update produtos set nome ='".$novo_nome."', preco = '".$novo_preco."' where nome ='".$nome_prod."' " ;
			//essa query altera os dois valores que queremos.. ele separa os sets por uma virgula e depois joga no where
							 
			mysqli_query($conexao, $query_altera);

			//header ("location: http://localhost/loja/checa_bd.php?");

			if(isset($_FILES['fileUpload'])){

				if(file_exists('uploads/'.$nome_prod.'.png')){
					unlink('uploads/'.$nome_prod.'.png');
				}

            	$ext = strtolower(substr($_FILES['fileUpload']['name'], -4)); // pega a extensão do arquivo

            	$new_name = $novo_nome . '.png'; //define o novo nome do arquivo, no caso, ele seta a data de hoje com a extensão do arquivo original

            	$dir = 'uploads/'; // define o diretório para onde elas irão


            	move_uploaded_file($_FILES['fileUpload']['tmp_name'] , $dir.$new_name);
            }

			?>
				<meta http-equiv="refresh" content="0;url=http://localhost/loja/checa_bd.php"> 
				<!--<meta http-equiv="refresh" content="0"> -->
			<?php

		}
		else{
			echo "<font color='red'>Produto não encontrado!</font>";
		}

		mysqli_close($conexao);
	}
	elseif(isset($_POST['cancela'])){
		//header ("location: http://localhost/loja/checa_bd.php?");
		$_SESSION['nome_produto'] = array();
    	$_SESSION['preco_produto'] = array();

		?>
				<meta http-equiv="refresh" content="0;url=http://localhost/loja/checa_bd.php"> 
				<!--<meta http-equiv="refresh" content="0"> -->
			<?php
	}

	include("rodape.php");
?>