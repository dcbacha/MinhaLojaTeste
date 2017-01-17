<?php
	include("cabecalho.php");
	include("funcoes.php");
	//include("validar.php");
	include("conecta.php");

	$nome_usr = $_SESSION['altera_usuario'];
//$_COOKIE["nome_usr"];
?>
	<!--<form method="post" > <!aqui ele define que o fomrulario irá realiar a acao de chamar a outra página
		
		Nome do produto: <input type = "text" name="novo_nome" value = "<? $nome_prod ;?>" /><br/> <!pode-se notar que o type muda se queremos digitar um texto ou apenas numeros

		Novo preco: <input type = "number" name="novo_preco" value= "<?$prec_prod ;?>"/><br/> <! cuidado nos espaços!!!
		<input type = "submit" name="alterar_bd"  value = "Alterar" />

	</form> -->
			<div class="page-header">
        		<h2>Alterar dados usuários</h2>
      		</div>
            <form  method="post">
            <table class="fixed">
            	
                <tr>
                    <td>Nome do Produto</td>
                    <td><input class="form-control" type="text" name="novo_usr" value = "<?=$nome_usr?>"></td>
                </tr>
                <tr>
                    <td><button type="submit" class="btn btn-primary" name="alterar_bd">Alterar</button>
						<button type="submit" class="btn btn-danger" name="cancela">Cancelar</button>
                    </td>
                </tr>
            </table>
            </form>



<?php
	
	if(isset($_POST['alterar_bd'])){ 

		$novo_usr = $_POST['novo_usr'];

		$query_checa = "select * from usuarios where user = '".$nome_usr."'  ";

		$resultado = mysqli_query($conexao, $query_checa);

		if( mysqli_num_rows($resultado) > 0 ){
			
			//setcookie("alterado");
			$query_altera = "update usuarios set user ='".$novo_usr."' where user ='".$nome_usr."' " ;
			//essa query altera os dois valores que queremos.. ele separa os sets por uma virgula e depois joga no where
							 
			mysqli_query($conexao, $query_altera);

			$_SESSION['altera_usuario'] = array();
			?>
				<!--<meta http-equiv="refresh" content="0;url=http://localhost/loja/checa_bd_usuarios.php"> 
				<meta http-equiv="refresh" content="0"> -->
			<?php
			header ("location: http://localhost/loja/checa_bd_usuarios.php?");

		}

		mysqli_close($conexao);
	}
	elseif(isset($_POST['cancela'])){
		header ("location: http://localhost/loja/checa_bd_usuarios.php?");
	}

	include("rodape.php");
?>