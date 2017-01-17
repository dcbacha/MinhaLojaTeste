	<?php include_once("cabecalho.php");
include("funcoes.php");
//include("validar.php");
include("conecta.php");


	$produtos = listaProdutos(); //chama a funcao
	$cookie_nome = $_SESSION['nome_produto'];
	$cookie_del = $_SESSION['del_produto'];

	$cookie_nome_antigo = $_SESSION['altera_antigo'];
	$cookie_nome_novo = $_SESSION['altera_novo'];
?>

	<div class="row">
	<div class="page-header">
        <h2>Estoque no BD</h2>
      </div>



	<form  method="post">
	<table class = "table table-striped">
		<thead>
		<tr>
			<th class="col-md-1"><h4>#</h4></th>
			<th><h4>Nome</h4></th>  <!-- aqui ele cria o título da tabela, sem atualizar dentro do loop-->
			<th><h4>Preço</h4></th>
			<th><h4>Foto</h4></th>
			<th class="col-md-3"></th>
		</tr>
		</thead>
		<tbody>
	<?php
	$prod = array();
	$prec = array();
	$del = array();
	$i=1;
	//$i = integer;

	foreach ($produtos as $produto) {
		
	?>
			<tr>
			<td><?= $i ?></td>
			<td> <?= $produto['nome'] ?> </td>
			<td> R$ <?= $produto['preco'] ?> </td>
			<td>
			<?php 
			if(file_exists('uploads/'.$produto['nome'].'.png')){
			?>
				<img src="uploads/<?= $produto['nome'] ?>.png" class="img-thumbnail" width="50"></td>
			<?php
			}
			else{
			?>
				Sem imagem</td>
			<?php
			}
			?>
			<?php $prod[$i] = $produto['nome'] ; 
				  $prec[$i] = $produto['preco'] ;
				  $del[$i] = $i; ?>

			<td><button type="submit" class="btn btn-primary" name="<?=$prod[$i]?>">Alterar</button>
				<button type="submit" class="btn btn-danger" name="<?=$del[$i]?>">Deleta</button>
			</td>
			
		</tr>
	<?php

		if(isset($_POST[$prod[$i]])){

			$_SESSION['nome_produto'] = $prod[$i];
			$_SESSION['preco_produto'] = $prec[$i];
			
			?>
				<meta http-equiv="refresh" content="0;url=http://localhost/loja/altera-geral.php"> 
				<!--<meta http-equiv="refresh" content="0"> -->
			<?php
			die();
		}


		if(isset($_POST[$del[$i]])) {

			$query_checa = "select * from produtos where nome = '".$prod[$i]."'  ";

			$resultado = mysqli_query($conexao, $query_checa);

			if( mysqli_num_rows($resultado) > 0 ){
				
				$_SESSION['del_produto'] = $prod[$i];
				$query_deleta = "delete from produtos where nome = '".$prod[$i]."'";

				if(file_exists('uploads/'.$prod[$i].'.png')){
					unlink('uploads/'.$prod[$i].'.png');
				}
							 
				mysqli_query($conexao, $query_deleta);
				
				?>
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


<!--
*************************************************************************** 
aqui em baixo ta rolando as notificações caso algum item do bd foi alterado
-->

	<?php
		if($cookie_nome != NULL){
	?>
			 <div class="alert alert-warning" role="alert">
        		<strong>Boa!</strong> Produto "<strong><?= $cookie_nome ?></strong>" adicionado com sucesso!
     	 	</div>
    <?php

    	$_SESSION['nome_produto'] = array();
    	$_SESSION['preco_produto'] = array();
 
		}

	?>

	<?php
		if($cookie_del != NULL){
	?>
			 <div class="alert alert-danger" role="alert">
        		<strong>Boa!</strong> Produto "<strong><?= $cookie_del ?></strong>" deletado com sucesso!
     	 	</div>
    <?php

    	$_SESSION['del_produto'] = array();
 
		}

	?>
	<?php
		if($cookie_nome_novo){
	?>
			 <div class="alert alert-success" role="alert">
        		<strong>Boa!</strong> Produto "<strong><?= $cookie_nome_antigo ?></strong>" alterado para "<strong> <?= $cookie_nome_novo ?></strong>".
     	 	</div>
    <?php

    	$_SESSION['altera_novo'] = array();
    	$_SESSION['altera_antigo'] = array();
 
		}

	?> 
 		

<?php include("rodape.php") ?>