<?php
$nick = $_POST['nick'];
$hora = date("h:i");
if($nick == ""){
echo "<script> location.href='index.htm'; </script>";
exit;
}
$texto = $_POST['texto']; 

$abre = fopen("mesa1.txt", "a");

if($abre) {

fwrite($abre,"<b><a class='blue-text'>[{$hora} - {$nick}]:</a></b><br> <div class='container'>{$texto}</div><br><br>");

}

fclose($abre);

 // marca hora da ultima mensagem

$ultima = fopen("ultima.txt", "w");

fwrite($ultima, $hora);

fclose($ultima);

?>

<meta http-equiv="refresh" content="0; url=chat-mesa.php">