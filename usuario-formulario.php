
<?php include("cabecalho.php"); 
//include("validar.php");
include("funcoes.php");
include("conecta.php");


?>

		</div>
			<div class="page-header">
        		<h2>Cadastro de Usuários</h2>
      		</div>

			 <div class="row">
       		 <div class="col-md-4"></div>


            <form  method="post">
            <table class="fixed">
            
                <tr>
                    <td>Nome:</td>
                    <td><input class="form-control" type="text" name="user" required></td>
                </tr>
                <tr>
                    <td>Senha:</td>
                    <td><input class="form-control" type="password" name="senha" required></td>
                </tr>
                <tr>
                    <td><button type="submit" class="btn btn-primary" name="CadastrarUsuario">Cadastrar Usuário</button></td>   
                </tr>
            </table>
            </form>
<?php

	if(isset($_POST['CadastrarUsuario'])){	
		
		$cad_usr = $_POST['user'];
		$cad_senha = $_POST['senha'];

		$senha_crip = md5($cad_senha); 
	
		$query = "insert into usuarios (user, senha) values ('".$cad_usr."', '".$senha_crip."')";

		$_SESSION['nome_usuario'] = $cad_usr;

		if(mysqli_query($conexao, $query)){


			header ('location: http://localhost/loja/checa_bd_usuarios.php');
			echo "uai";
			die();
		}
	}

?>
<?php include("rodape.php"); ?>
