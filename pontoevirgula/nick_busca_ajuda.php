<?php

// confere se nao esta em nenhuma conversa e nem sala de espera
include('limpa.php');
include ('class_busca_ajuda.php');

$database = new Database();
$db = $database->getConnection();

$busca_ajuda = new Sala_busca_ajuda($db);


if($_SESSION['usuario'] === null){
 		header("location: login.php");
 	}


if($_POST){
	 	
		$busca_ajuda->id_usuario_busca_ajuda = $_SESSION['usuario'];
		$busca_ajuda->nick_busca_ajuda = $_POST['nick1'];
		
		// cria o busca ajuda
		if($busca_ajuda->entra()){
			// se funcionar vai para a sala de espera
			header("Location: Sala_busca_ajuda.php");
		}	 
		// se nao
		else{
			echo "<div class='alert alert-danger'>Algo deu errrado :( </br> Por favor, tente novamente </div>";
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
			<div class="faixaN"></div>  
			<div class="cabecalho"></div>
			<div class="fadeIn"><br>
			<font face="Courier new" class="sla" size="10">&nbsp;Ponto&Vírgula</font>
			</div>
			
			<div class="menuN"> </div>
			
			<header class="pos_menuN" >
					
			<ul> <font face="Giddyup Std">
					
			<!-- draggable é q nao é arrastavel -->
			<li><a href="pontoevirgula.php" draggable="false">Home &nbsp; </a></li>
			<li><a href="destroi.php" draggable="false">&nbsp;  Sair</a></li>
					
			</ul> </font> 
			</header>
			<br><br><br><br><br><br><br><br><br><br><br><br><br><br>
			
				<center> 
				
				<form action="nick_busca_ajuda.php" method="post">
				<font face="Courier New">
					<b> Escolha um nome para usar nessa conversa:</b><br><br>
					<tr> <td> <input type="text" name="nick1" maxlength="15" placeholder=" Máximo 15 caracteres" class="campo" required autofocus></td></tr> <!-- onde o usuario coloca o nick -->
				<br><br><br> 
				<input type="submit" value="Enviar" name="Enviar_nick1" class="botao_enviar">
				</font>	
				</form>
</body>		
</html>

