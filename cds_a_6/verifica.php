<?php
	session_start();
	
	$_SESSION["ultima_acao"] = time();

	if ($_SESSION["nome_usuario"] == ""){
	session_start();
	session_unset();
	session_destroy();
	unset($_SESSION);
	header("Location: login.php");
}
?>
