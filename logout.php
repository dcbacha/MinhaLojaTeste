<?php
	
	include("validar.php");

	session_destroy();
	$_SESSION = array();
	$_SESSION['user'] = array();
	session_start();

	header ("location: http://localhost/loja/index.php?");