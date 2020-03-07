<?php
$nick = $_POST['nick'];
$acao = $_POST['acao'];
$cor = $_POST['cor'];
$hora = date("h:i:s");
if($nick == ""){
echo "<script> location.href='index.htm'; </script>";
exit;
}
$texto = $_POST['texto']; 

$abre = fopen("../listaPjs.js", "a");

if($abre) {

fwrite($abre,"{$texto}='pj';");

}

fclose($abre);

 // marca hora da ultima mensagem

$ultima = fopen("ultima.txt", "w");

fwrite($ultima, $hora);

fclose($ultima);

?>

<meta http-equiv="refresh" content="0; url=chat.php">