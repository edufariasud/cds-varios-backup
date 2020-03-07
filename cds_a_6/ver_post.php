<!DOCTYPE html>
<?php
	include "verifica.php";
	include "header.php";
	$msg = '';
	$comentarios = "";
	if (sizeof($_GET)>0){
		include "conectadb.php";
		$id = $_GET["id"];
		if(sizeof($_POST)>0){
			$texto = $_POST["comentario"];
			$id_usuario = $_SESSION["id_usuario"];
			$id_post = $id;
			$ins = "insert into comentario (texto, id_usuario, id_post)
					values ('$texto','$id_usuario', '$id_post')";
			$res = mysql_query($ins);
			if ($res) {
				$comentarios .= '<h3>Comentário cadastrado com sucesso</h3>';
			}else{
				$comentarios .= '<h3>Erro ao cadastrar comentario</h3>'.mysql_error();
			}
			
		}
		$q = "select p.id, p.texto, p.titulo, u.nome,
				date_format(p.data_criacao,'%d/%m/%Y  %H:%i:%s') as data
			  from post p
				inner join usuario u on u.id = p.id_usuario
			  where p.id = $id";
		$res = mysqli_query($conexao,$q);
		if (!$res) {
			$msg = '<h3>Erro ao carregar post</h3>'.mysql_error();
		}else{
			if (mysqli_num_rows($res)>0){
				$linha = mysqli_fetch_array($res);
				$titulo = $linha["titulo"];
				$texto = $linha["texto"];
				$data = $linha["data"];
				$usuario = $linha["nome"];
				$msg .= "<table border='1' style='border-collapse:collapse'>";
				$msg .= "<tr><td width='200px'>$usuario</td><td style='text-align:right' width='150px'>$data</td></tr>";
				$msg .= "<tr><td width='350px' colspan='2'>$texto</td></tr>";
				$msg .= "</table><br />";
			}else{
				$msg .= "<h3>Este post não foi encontrado</h3>";
			}
		}
		$q = "select c.id, c.texto, c.data, u.nome
			  from comentario c
				inner join usuario u on u.id = c.id_usuario
				inner join post p on p.id = c.id_post
			  where p.id = $id
			  order by c.data desc";
		$res = mysqli_query($conexao,$q);
		if (!$res) {
			$msg = '<h3 class="text-center bg-danger">Erro ao carregar comentários</h3>'.mysql_error();
		}else{
			if (mysqli_num_rows($res)>0){
				while($linha = mysql_fetch_array($res)){
					$texto = $linha["texto"];
					$data = $linha["data"];
					$usuario = $linha["nome"];
					$comentarios .= "<table border='1' style='border-collapse:collapse'>";
					$comentarios .= "<tr><td width='200px'>$usuario</td><td style='text-align:right' width='150px'>$data</td></tr>";
					$comentarios .= "<tr><td width='350px' colspan='2'>$texto</td></tr>";
					$comentarios .= "</table><br />";
				}
			}else{
				$comentarios .= "<h3'>Nenhum comentário até o momento</h3>";
			}
		}
	}else{
		$titulo = "Essa página não pode ser exibida diretamente.";
	}
	
?>
<html>
	<body>
		<div class="container">
			<div class='row'>
				<h1 class="text-center"><?=$titulo?></h1>
				<div class='col-md-8 col-md-offset-2'>
					<?=$msg?>
				</div>
			</div>
			<br />
			<div class='row'>
				<div class='col-md-8 col-md-offset-2 well'>
					<h1 class="text-center">Comentários</h1>
					<form class="form-horizontal" method="post">
						<div class="form-group">
							<div class="col-md-12">
								<textarea rows="6" id="comentario" name="comentario" class="form-control" placeholder="Deixe aqui seu comentário"></textarea>
							</div>
						</div>
						<div class="form-group">
							<div class="col-md-12 text-center">
								<button class="btn btn-lg btn-primary" type="submit">Enviar</button>
							</div>
						</div>
					</form>
					<br />
					<?=$comentarios?>
				</div>
			</div>
		</div>
	</body>
</html>