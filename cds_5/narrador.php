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

 <div><iframe name="chat" src="chat-narrador.php" width="100%" height="80%" frameborder="0">Atualize seu navegador.</iframe><br></div><div><iframe name="ultimo" src="ultima.php" frameborder="0" width=300 height=16 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling=no>Favor atualizar seu navegador.</iframe></div>
<!--FORM DE FALA-->
<hr color="white"><form action="gravar-narrador.php" method="post" target="chat">
 <font color="<?php echo $cor ?>"><b></b></font color="<?php echo $cor ?>">
<input name="nick" type="hidden" value="<?php echo $nick ?>">
<input name="cor" type="hidden" value="<?php echo $cor ?>">
<input type="text" name="texto"> <input type="submit" value="Falar">
</form>
<form action="sair.php" method="post">
<input name="nick" type="hidden" value="<?php echo $nick ?>">
<input name="cor" type="hidden" value="<?php echo $cor ?>">
<input type="submit" value="Sair">
</form>
</font>
</body>
</html>