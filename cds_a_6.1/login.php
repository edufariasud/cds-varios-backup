<!DOCTYPE html>
<?php
	include "conectadb.php";
	$resultado = "";
	if(sizeof($_POST)>0){
		$email = $_POST["email"];
		$senha = $_POST["senha"];
		$query = "select * from usuario where senha = md5('$senha') and email = '$email'";
		$ret = mysqli_query($conexao,$query);
		if (mysqli_num_rows($ret) == 1){
			$usuario = mysqli_fetch_array($ret);
			session_start();
			$_SESSION["usuario_logado"] = true;
			$_SESSION["nome_usuario"] = $usuario["nome_pj"];
			$_SESSION["id_usuario"] = $usuario["id"];
			$_SESSION["mesa"] = $usuario["mesa"];
			$_SESSION["ultima_acao"] = time();
			header("Location: index.php");
		}else{
			$resultado = '<h3>Acesso negado</h3>';
		}
	}
?>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blog</title>
	</head>
	<body>
		<h1>Login</h1>
		<form method="post">
			<div>
				<label for="email">E-mail</label>
				<input type="email" id="email" name="email" placeholder="e-mail" required>
			</div>
			<div>
				<label for="senha">Senha</label>
				<input type="password" id="senha" name="senha" placeholder="senha" required>
			</div>
			<br />
			<button type="submit">Entrar</button>
			<a href="cadastro.php"><input type="button"value="Cadastrar"/></a>
		</form>
		<?=$resultado?>
	</body>
</html>