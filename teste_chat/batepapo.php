<?php


$nick = 1;
$mesa = $_SESSION["mesa"];
$cor = "black";
$abre = fopen("$mesa.txt", "a");

echo "Vc está na narrativa da mesa " . $mesa;

if($nick == ""){
echo "<script> location.href='index.htm'; </script>";
exit;
}
?>
<html>
<body bgcolor="#C92E01">

 <div><iframe name="chat" src="chat.php" width="100%" height="80%" frameborder="0">Atualize seu navegador.</iframe><br></div><div><iframe name="ultimo" src="ultima.php" frameborder="0" width=300 height=16 marginwidth=0 marginheight=0 hspace=0 vspace=0 frameborder=0 scrolling=no>Favor atualizar seu navegador.</iframe></div>
<!--FORM DE FALA-->
<hr color="white"><form action="gravar.php" method="post" target="chat">
 <font color="<?php echo $cor ?>"><b><?php echo $nick ?></b></font color="<?php echo $cor ?>">
<input name="nick" type="hidden" value="<?php echo $nick ?>">
<input name="cor" type="hidden" value="<?php echo $cor ?>">
 : <input type="text" name="texto"> <input type="submit" value="Falar">
</form>
<form action="sair.php" method="post">
<input name="nick" type="hidden" value="<?php echo $nick ?>">
<input name="cor" type="hidden" value="<?php echo $cor ?>">
</form>

</body>
</html>
