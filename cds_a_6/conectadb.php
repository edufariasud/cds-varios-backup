<?php
$hostdb="localhost";
$userdb="root";
$senhadb="";
$db = "blog"; 

$conexao = mysqli_connect($hostdb,$userdb,$senhadb,$db);


if(!$db){
	echo "<h3>Não foi possível se conectar com o Banco de Dados</h3>";
}
?>