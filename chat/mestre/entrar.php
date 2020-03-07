<?php
$nick = $_POST['nick'];
$cor = $_POST['cor'];
if($nick == ""){
echo "<script> location.href='index.htm'; </script>";
exit;
}
$abre = fopen("../listaPjs.js", "a");

fclose($abre);
header("Location: batepapo.php",TRUE,307); 
?>