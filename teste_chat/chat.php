<?php


$nick = $_SESSION["nome_usuario"];
$mesa = $_SESSION["mesa"];
$cor = "black";
$abre = fopen("mesas/$mesa.txt", "a");
?>

<html>
<head>
<title>Bate Papo</title>
<META HTTP-EQUIV="Refresh" CONTENT="5;URL=chat.php">
<script language="javascript">
function ultima() {
location.href = "#ultima";
}
</script>
</head>
<body bgcolor="#ffffff" onLoad="javascript:ultima()">
<font face="Verdana" size="2">
<?php include("mesas/$mesa.txt"); ?>
<a name="ultima"> </a>
</font>
</body>
</html>