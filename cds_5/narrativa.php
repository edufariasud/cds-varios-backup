<?php
include "verifica.php";
include "header.php";
include "conectadb.php";

echo "<h2>Bem-vindo ".$_SESSION["nome_usuario"]."</h2>";

$nick = $_SESSION["nome_usuario"];
include "footer.php";
?>
<html>
<head>
  <title>Bate Papo</title>
</head>
<body bgcolor="#C92E01"><font face="Verdana" size="2" color="#FFFFFF">


 <div>
	<iframe name="chat" src="chat-narrativa.php" width="100%" height="80%" frameborder="0">
		Atualize seu navegador.
	</iframe>
	<br>
	</div>
	<div>
		<iframe name="ultimo" src="ultima.php" frameborder="0" width=300 height=16 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling=no>
			Favor atualizar seu navegador.
		</iframe>
	</div>
</body>
</html>