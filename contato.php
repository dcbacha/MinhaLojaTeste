<?php include("cabecalho.php");?>

			<div class="page-header">
        		<h2>Entre em contato</h2>
      		</div>
            <form  method="post" action="envia-contato.php">
            <table class="fixed">
            	
                <tr>
                    <td>Nome</td>
                    <td><input class="form-control" type="text" name="nome" required></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><input class="form-control" type="email" name="email" required></td>
                </tr>
                <tr>
                    <td>Mensagem</td>
                   	<td><textarea class="form-control" name="mensagem" required></textarea></td>
                </tr>
                <tr>
                    <td><button type="submit" class="btn btn-primary">Enviar</button></td>
                </tr>
            </table>
            </form>

<?php 

require_once("rodape.php"); ?>