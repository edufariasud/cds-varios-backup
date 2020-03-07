<!DOCTYPE html>
<?php
	$msg = "";
	$nome = "";
	$email = "";
	$nascimento = "";
	if(sizeof($_POST)>0){
		include "conectadb.php";
		if ($_POST["nome"]!=""&&$_POST["email"]!=""&&$_POST["nascimento"]!=""&&$_POST["senha"]!=""&&$_POST["confSenha"]!=""){
			$nome = $_POST["nome"];
			$email = $_POST["email"];
			$nascimento = $_POST["nascimento"];
			$senha = $_POST["senha"];
			$confSenha = $_POST["confSenha"];
			if($senha != $confSenha){
				$msg = '<h3>A confirmação de senha não confere</h3>';
			}else{
				//$q = "select * from usuario where email = '$email'";
				$res = mysqli_query($conexao,"select * from usuario where email = '$email'");
				if (!$res){
					$msg = '<h3>'.mysql_error().'</h3>';
				}else{
					if (mysqli_num_rows($res)>0){
						$msg = '<h3>Este e-mail já está cadastrado</h3>';
					}else{
						$ins = "insert into usuario (nome, email, senha, data_nascimento)
								values ('$nome','$email',md5('$senha'), str_to_date('$nascimento','%d/%m/%Y'))";
						$res = mysqli_query($conexao,$ins);
						if ($res) {
							$msg = '<h3>Usuário cadastrado com sucesso</h3>';
						}else{
							$msg = '<h3>Erro ao cadastrar usuário</h3>';
						}
					}
				}
			}
		}else{
			$msg = '<h3>Preencha todos os campos</h3>';
		}
	}
?>
<html>
	<head>
		<meta charset="utf-8" />
	</head>
	<body>
		<h1>Cadastro</h1>
		<form method="post">
			<label for="nome">Nome: </label>
			<input type="text" id="nome" name="nome" value="<?=$nome?>" placeholder="nome"><br /><br />
			<label for="email">E-mail: </label>
			<input type="email" id="email" name="email" value="<?=$email?>" placeholder="e-mail"><br /><br />
			<label for="nascimento">Data Nascimento: </label>
			<input type="text" id="nascimento" name="nascimento" value="<?=$nascimento?>" placeholder="data nascimento"><br /><br />
			<label for="senha">Senha: </label>
			<input type="password" id="senha" name="senha" placeholder="senha"><br /><br />
			<label for="confSenha">Confirme a Senha: </label>
			<input type="password" id="confSenha" name="confSenha" placeholder="confirmação senha" ><br /><br />
			<button class="btn btn-lg btn-primary" type="submit">Enviar</button>
			<a href="login.php"><input type="button" value="Voltar"/></a>
		</form>
		<?=$msg?>
	</body>
</html>