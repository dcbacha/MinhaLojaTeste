<?php

	$host = 'localhost'; 
	$user = 'root';
	$senhabd = '';
	$bd = 'loja';

	/*$host = 'mysql.hostinger.com.br'; 
	$user = 'u523012763_danie';
	$senhabd = 'eocwginh';
	$bd = 'u523012763_loja'; */


	$conexao = mysqli_connect($host, $user, $senhabd, $bd);

//quando o programa é puro php, não precisamos fechar o programa com o com a seta e pa