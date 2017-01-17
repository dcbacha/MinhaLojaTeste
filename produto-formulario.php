
<?php include("cabecalho.php"); 
//include("validar.php");
include("funcoes.php");
include("conecta.php");

?>
			<div class="page-header">
        		<h2>Cadastro de Produtos</h2>
      		</div>
      		  <div class="row">
             <div class="col-md-4"></div>
            <form  method="post" enctype="multipart/form-data"> <!-- precisa desse enctype senão NÃO funciona o upload!!!-->
            <table class="fixed">
            
                <tr>
                    <td>Nome:</td>
                    <td><input class="form-control" type="text" name="nome" required></td>
                </tr>
                <tr>
                    <td>Preço:</td>
                    <td><input class="form-control" type="number" name="preco" required></td>
                </tr>
                <tr>
                    <td>Imagem:</td>
                   <td><input type="file" name="fileUpload"></td>
                </tr>
                <tr>
                    <td><button type="submit" class="btn btn-primary" name="cadastrar">Cadastrar</button></td>                 
                </tr>
            </table>
            </form>
<?php 

	if(isset($_POST['cadastrar'])){
		$nome = $_POST['nome']; 
		$preco = $_POST['preco'];
        //$imagem = $_FILES['fileUpload'];

	
		$query = "insert into produtos (nome, preco) values ('".$nome."', '".$preco."')";

		//setcookie('nome_produto', $nome);
        if(isset($_FILES['fileUpload'])){

            echo "<br/>entrou no isset files";
           // date_default_timezone_get("Brazil/East"); //define timezone

            $ext = strtolower(substr($_FILES['fileUpload']['name'], -4)); // pega a extensão do arquivo

            $new_name = $nome . '.png'; //define o novo nome do arquivo, no caso, ele seta a data de hoje com a extensão do arquivo original

            $dir = 'uploads/'; // define o diretório para onde elas irão


            move_uploaded_file($_FILES['fileUpload']['tmp_name'] , $dir.$new_name);
        }

		$_SESSION['nome_produto'] = $nome;

		if(mysqli_query($conexao, $query)){

			header ('location: http://localhost/loja/checa_bd.php');
			die();
		}

	}


?>


<?php include("rodape.php"); ?>
