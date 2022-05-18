<?php

// confere se nao esta em nenhuma conversa e nem sala de espera
include('limpa.php');
include('class_sala_ajudante.php');

$database = new Database();
$db = $database->getConnection();

// para a class ajudante
$ajudante = new Sala_ajudante($db);



//session_start();

if($_SESSION['usuario'] === null){
 		header("location: login.php");
 	}


if($_POST){ // se o botao for clicado
	 	
		$ajudante->id_usuario_ajudante = $_SESSION['usuario']; // salva o id do usuario na lista de ajudante
		$ajudante->nick_ajudante = $_POST['nick2']; // salva o nick do usuario na lista de ajudante
		
		// criando o ajudante
		if($ajudante->entra()){	
			header("Location: sala_ajudante.php"); // se foi criado vai para a lista 
		}
	 
		// se não deu certo, avisa o usuario
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
				
				<form action="nick_ajudante.php" method="post">
				<font face="Courier New">
					<b> Escolha um nome para usar nessa conversa:</b><br><br>
				<tr> <td> <input type="text" name="nick2" maxlength="15" placeholder=" Máximo 15 caracteres" class="campo" required autofocus></td></tr> <!-- onde o usuario coloca o nick --> <!-- onde o usuario coloca o nick -->
				<br><br><br> 
				<input type="submit" value="Enviar" name="Enviar_nick2" class="botao_enviar">
				</font>	
				</form>
</body>		
</html>

