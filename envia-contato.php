<?php

$nome = $_POST["nome"];
$email = $_POST["email"];
$mensagem = $_POST["mensagem"];

require_once("/PhpMailer/PHPMailerAutoload.php");

$mail = new PHPMailer();

$mail->isSMTP();
$mail->Host = 'smtp.gmail.com';
$mail->Port = 587;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;
$mail->Username = "dcbacha@gmail.com";
$mail->Password = "kfcyxk75";

$mail->setFrom("dcbacha@gmail.com", "Minha Loja"); //quem está enviando

$mail->addAddress("dcbacha@gmail.com"); //quem vai receber 

$mail->Subject = "Email contato da Loja"; //título do email

$mail->msgHTML("<html>De: {$nome}<br/><br/>Email: {$email}<br/><br/>Mensagem: {$mensagem}</html>"); //corpo da mensagem em html

$mail->AltBody = "de: {$nome}\nemail: {$email}\nmensagem: {$mensagem}"; //caso não abra em html

if($mail->send()){
	

	?>
		<meta http-equiv="refresh" content="0;url=http://localhost/loja/index.php"> 
	<?php
	
}else{
	
	?>
		<meta http-equiv="refresh" content="0;url=http://localhost/loja/contato.php"> 
	<?php
}
?>