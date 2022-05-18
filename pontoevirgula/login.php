<?php

	// conexao
	session_start();
	$conexao = mysqli_connect("localhost", "root", "", "pv");

	if (isset($_POST['logar'])) {
		$email = $_POST['email'];
		$senha = $_POST['senha'];

		// confere se os dados estão corretos
		if($inf = mysqli_query($conexao, "SELECT senha, id_user FROM usuarios WHERE email = '".$email."'")){ 

			$linha = mysqli_fetch_array($inf); //ta pegando a linha


			if($senha === $linha['senha']){ // se a senha estiver correta
				$_SESSION['usuario'] = $linha['id_user']; // salva o id do usuario na sessao 
				header("Location: pontoevirgula.php");
			} else {
				echo ("<script type='text/javascript'> alert('Os dados digitados estão incorretos!');</script>"); // se estiverem incorretos
			}
		} else {
			echo ("<script type='text/javascript'> alert('Os dados digitados estão incorretos!');</script>");
		}
	}

	if (isset($_GET["erro"])){ // se recebeu o erro	 
		echo ("<script type='text/javascript'> alert('Você foi banido!!');</script>"); // caso a pessoa tenha sido banido ela recebe essa mensagem {CSS, se conseguir no javascript}
	}


?>



<!doctype html>
<meta charset="UTF-8">
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Ponto&Vírgula</title>
		<link rel="stylesheet" type="text/css" href="css/testecss.css">
	</head>
		<body>

			<div class="fundo"></div>
			<div class="faixa"></div><br><br><br>
			<div class="fadeIn">
			<center><font face="Courier new" size="10">Ponto&Vírgula</font><br><br><br><br><br><br><br><br>
			<font face="Giddyup Std" size="7"> Login </font></center>
			</br></br>
			<center><form action="login.php" method="post">
				<font face="Courier New">
					<table>
						<tr><td> Email: </td><td><input type="email" name="email" class="campo" required autofocus></td></tr>
						<tr><td> Senha: </td><td><input type="password" name="senha" class="campo" required autofocus></td></tr>
					</table>
					<br>
					<input type="submit" value="Enviar" name="logar" class="botao_enviar">
				</font>	
			</form>
			<br><br><font face="Giddyup Std" size="5"><a href="cadastro.php"> Cadastre-se </a></font>
			</center>
			</div>
		</body>
</html>