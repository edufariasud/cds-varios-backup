<?php
$abre = fopen("../listaPjs.js", "a");

if($abre) {

fwrite($abre,"<b>Alguém está espiando a conversa!</b><br>");

}

fclose($abre);

?>
<meta http-equiv="refresh" content="0; url=chat.php">