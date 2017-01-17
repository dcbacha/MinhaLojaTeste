<?php
include_once("cabecalho.php");
include("funcoes.php");
include("conecta.php");


	$usuarios = listaUsuarios(); //chama a funcao
	$cookie_nome_usr = $_SESSION['nome_usuario'];
	$cookie_del_usr = $_SESSION['del_usuario'];
?>
	<div class="row">
	<div class="page-header">
        <h2>Usuários no BD</h2>
      </div>

	<?php
		if($cookie_nome_usr != NULL){
	?>
			<div class="alert alert-warning" role="alert">
        		<strong>Boa!</strong> Usuário "<strong><?= $cookie_nome_usr ?></strong>" adicionado com sucesso!
     	 	</div>
    <?php

    	$_SESSION['nome_usuario'] = array();
 
		}

		if($cookie_del_usr != NULL){
	?>
			<div class="alert alert-danger" role="alert">
        		<strong>Boa!</strong> Usuário "<strong><?= $cookie_del_usr ?></strong>" deletado com sucesso!
     	 	</div>
    <?php

    	$_SESSION['del_usuario'] = array();
 
		}

	?>
	<form  method="post">
	<table class = "table table-striped">
		<thead>
		<tr>
			<th class="col-md-1"><h3>#</h3></th>
			<th><h3>Usuários</h3></th>  <!-- aqui ele cria o título da tabela, sem atualizar dentro do loop-->
			<th><h3>Senha</h3></th>
			<th class="col-md-3"></th>
		</tr>
		</thead>
		<tbody>

	<?php
	$usr = array();
	$pass = array();
	$del = array();
	$i=1;
	//$i = integer;

	foreach ($usuarios as $usuario) {
		
	?>
		<tr>
			<td><?= $i ?></td>
			<td><?= $usuario['user'] ?></td>
			<td><?= $usuario['senha'] ?></td>
			<?php $usr[$i] = $usuario['user'] ; 
				  $pass[$i] = $usuario['senha'] ;
				  $del[$i] = $i;
			?>

			<td><button type="submit" class="btn btn-primary" name="<?=$usr[$i]?>">Altera</button>
				<button type="submit" class="btn btn-danger" name="<?=$del[$i]?>">Deleta</button>
			</td>
		</tr>
		<?php

		if(isset($_POST[$usr[$i]])){
					
			//setcookie("nome_usr", $usr[$i]);
			$_SESSION['altera_usuario'] = $usr[$i];
			
			?>
				<meta http-equiv="refresh" content="0;url=http://localhost/loja/altera-usuarios.php"> 
				<!--<meta http-equiv="refresh" content="0"> -->
			<?php

			//header ('location: http://localhost/loja/altera-usuarios.php');
			die();
		}


		if(isset($_POST[$del[$i]])) {

			$query_checa = "select * from usuarios where user = '".$usr[$i]."'  ";

			$resultado = mysqli_query($conexao, $query_checa);

			if( mysqli_num_rows($resultado) > 0 ){
				
				$_SESSION['del_usuario'] = $usr[$i];
				$query_deleta = "delete from usuarios where user = '".$usr[$i]."'";
							 
				mysqli_query($conexao, $query_deleta);
				

				//$link = "http://localhost/loja/checa_bd_usuarios.php";
				//chamaPagina($link);
		?>
				<!--<meta http-equiv="Location" content="http://localhost/loja/checa_bd_usuarios.php"> -->
				<meta http-equiv="refresh" content="0">
		<?php
				//header ("Refresh:0");
				die();
				
			}
		
		}

		

	 $i ++;
	}
	
	?>
	</tbody>
	</table>
	</form>
	</div>
<?php include("rodape.php") ?>