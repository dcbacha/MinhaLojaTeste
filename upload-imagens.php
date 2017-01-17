<?php include("cabecalho.php"); ?>

	<div class="page-header">
    	<h2>Upload de Imagens</h2>
    </div>
    <div class="row">
    	<div class="col-md-4"></div>
    	<form  action="#" method="post" enctype="multipart/form-data">
    	<table class="fixed">

    		<td><input class="form-control" type="file" name="fileUpload"></td>
    		<td><button type="submit" class="btn btn-primary" name="cadastrar">Enviar</button></td>                 
   		
   		</table>
    	</form>

<?php
	
	if(isset($_FILES['fileUpload'])){

		/*require 'WideImage/WideImage.php';

		$name = $_FILES['fileUpload']['name']; // Atribiu array com nomes dos arquivos à variável
		$tmp_name = $_FILES['fileUpload']['tmp_name']; // array com os nomes temporários

		$allowedExts = array(".gif", ".jpeg", ".jpg", ".png", ".btm"); // extensões permitidas */

		date_default_timezone_get("Brazil/East"); //define timezone

		$ext = strtolower(substr($_FILES['fileUpload']['name'], -4)); // pega a extensão do arquivo
		//$_FILES['fileUpload']['name'] é o nome original do arquivo no computador do usuário

		$new_name = date("Y.m.d-H.i.s") . $ext; //define o novo nome do arquivo, no caso, ele seta a data de hoje com a extensão do arquivo original

		$dir = 'uploads/'; // define o diretório para onde elas irão

		//move_uploaded_file($_FILES['fileUpload']['tmp_name'] , $dir.$new_name); //faz o upload do arquivo
		//$_FILES['fileUpload']['tmp_name'] é o nome temporário do arquivo que foi guardado no servidor

		if(move_uploaded_file($_FILES['fileUpload']['tmp_name'] , $dir.$new_name)){
		?>
		<div class="alert alert-success" role="alert">
        	Imagem "<strong><?= $new_name ?></strong>" adicionada.
     	</div>

     	<?php
     	}else{
     	?>
     	<div class="alert alert-danger" role="alert">
        	Algo deu errado no upload da imagem.
     	</div>
     	<?php
     	}
	}


?>




<?php include("rodape.php"); ?>