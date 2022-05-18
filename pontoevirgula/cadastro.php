<?php

	session_start();

	$_SESSION['nome'] = null;
	$_SESSION['email'] = null;

	if(isset($_POST['cadastrar'])){
		$_SESSION['nome'] = $_POST['nome'];
		$_SESSION['email'] = $_POST['email'];
		$senha = $_POST['senha'];
		$confsenha = $_POST['confsenha']; 
		$CEP = $_POST['CEP'];
		$tel = $_POST['tel'];
		$data_nasc = $_POST['data_nasc'];
		$RG = $_POST['RG'];
 

	include('config.php');

	$database = new Database();
	$db = $database->getConnection();

	//$_SESSION['email'] = "laura@laura.com";

	$linhaEmail = null;
	$queryEmail = null;
	$repetido = null;

	$queryEmail = $db->prepare("SELECT COUNT(*) FROM usuarios WHERE email ='".$_SESSION['email']."'");
	$runEmail = $queryEmail->execute();
	//$linhaEmail = $queryEmail->fetchAll(PDO::FETCH_NUM);
	$linhaEmail = $queryEmail->fetch(PDO::FETCH_ASSOC);

	/*var_dump($linhaEmail);
	echo ("<br>");
	var_dump($_SESSION['email']);
	echo ("<br>");
	var_dump($queryEmail);
	echo ("<br>");
	var_dump($runEmail);
	echo ("<br>");
	var_dump($repetido);*/

	foreach( $linhaEmail as $repetido){
		if($repetido >= "1"){ //  quantidade de registros que retornou
		echo ("<script type='text/javascript'> alert('Este e-mail já está em uso.');</script>");
		} else {


		$conexao = mysqli_connect("localhost","root","","pv");

		if($senha === $confsenha){
			$query = "INSERT INTO usuarios (nome,email,senha,CEP,tel,data_nasc,RG) VALUES ('".$_SESSION['nome']."','".$_SESSION['email']."','".$senha."','".$CEP."','".$tel."','".$data_nasc."','".$RG."');";
			if(mysqli_query($conexao,$query)){
				echo ("<script type='text/javascript'> alert('Cadastro realizado com sucesso!');</script>");
				header("Location: login.php");
			}
		} else {
			echo ("<script type='text/javascript'> alert('As senhas não correspondem');</script>");
		}


		}
	}


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
				<center><font face="Courier new" size="10">Ponto&Vírgula</font><br><br><br><br><br>
					<font face="Giddyup Std" size="7"> Cadastre-se </font></center>
					</br></br>
						<center><form action="cadastro.php" method="post">
							<font face="Courier New">
								<table>
									<tr><td> Nome: </td><td> <input type="text" name="nome" placeholder=" Seu nome" class="campo" value="<?php echo($_SESSION['nome']); ?>" required autofocus></td></tr>
									<tr><td> Email: </td><td><input type="email" name="email" placeholder=" Ex.: você@você.com" class="campo" value="<?php echo($_SESSION['email']); ?>" required autofocus></td></tr>




									<tr><td> Senha: </td><td><input type="password" name="senha" pattern=".{8,}"  required title=" Mínimo 8 caracteres" placeholder=" Mínimo 8 caracteres" class="campo" required autofocus></td></tr>
									<tr><td> Confirme: &nbsp </td><td><input type="password" name="confsenha" pattern=".{8,}" required title=" Repita sua senha" placeholder=" Repita sua senha" class="campo" required autofocus></td></tr>
									<tr><td> CEP: </td><td><input type="int" name="CEP" pattern=".{8}" required title="CEP"  maxlength="10" placeholder=" Ex.: 00.000-000" class="campo" required autofocus></td></tr>
									<tr><td> Telefone: </td><td><input type="int"  name="tel" pattern=".{11}" required title="Seu telefone" maxlength="14" placeholder=" Ex.: (00) 0 0000-0000" class="campo" required autofocus></td></tr>
									<tr><td> Data de nascimento: </td><td><input type="date" name="data_nasc" class="campo" required autofocus></td></tr>

									<tr><td> RG: </td><td><input type="int" name="RG" pattern=".{9}" required title="Seu RG" maxlength="12" class="campo" placeholder=" Ex.: 00.000.000-0" required autofocus></td></tr>
									<tr><td> <input type="checkbox" name="termos" class="radio" required autofocus> </td> <td>  Li e concordo com os <br> <a href="termosdeuso.html" target="_blank"> termos de uso. </a> </td> </tr> 
									
								</table> 
								<br>
								<input type="submit" value="Enviar" name="cadastrar" class="botao_enviar">
							</font>	
						</form>
					<br><br><font face="Giddyup Std" size="5"><a href="login.php"> Voltar ao Login </a></font>
				</center>
			</div>
		</body>
</html>