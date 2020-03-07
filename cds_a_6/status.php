<?php
include "verifica.php";
include "header.php";
include "conectadb.php";

echo "<h2>Bem-vindo ".$_SESSION["nome_usuario"]."</h2>";

$html = "";
$q = "select p.id, p.texto, p.titulo, 
		date_format(p.data_criacao,'%d/%m/%Y  %H:%i:%s') as data,
		u.nome, count(c.id) as comentarios
	  from post p
		inner join usuario u on u.id = p.id_usuario
		left join comentario c on c.id_post = p.id
	  group by p.id, p.texto, p.titulo, p.data_criacao, u.nome
	  order by data desc";
$res = mysqli_query($conexao,$q);
if($res){
	if (mysqli_num_rows($res)>0){
		while ($linha = mysqli_fetch_array($res)){
			$html .= "<table border='1' style='border-collapse:collapse'>";
			$id = $linha['id'];
			$titulo = $linha['titulo'];
			$texto = $linha['texto'];
			$usuario = $linha['nome'];
			$data_criacao = $linha['data'];
			$numCom = $linha["comentarios"];
			$html .= "<tr><td width='200px'>$usuario</td><td style='text-align:right' width='150px'>$data_criacao</td></tr>";
			$html .= "<tr><td colspan='2'><a href='ver_post.php?id=$id'>$titulo</a></td></tr>";
			$html .= "<tr><td colspan='2' style='text-align:right'>Comentários: $numCom</td></tr>";
			$html .= "</table><br />";
		}
	}else{
		$html = "<h3>Não existem Posts registrados</h3>";
	}	
}else{
	$html = "<h3>Erro ao realizar consulta</h3>";
}
echo $html;
include "footer.php";
?>
