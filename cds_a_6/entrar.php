<?php
$nick = $_POST['nick'];
$cor = $_POST['cor'];
if($nick == ""){
echo "<script> location.href='index.htm'; </script>";
exit;
}
$abre = fopen("chat.txt", "a");
if($abre) {
fwrite($abre,"<b><font color={$cor}>{$nick}</font color={$cor}><i> entrou na mesa.</i></b><br>");
}
fclose($abre);
header("Location: batepapo.php",TRUE,307); 
?>