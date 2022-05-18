         <?php

include("limpa.php");
 	$conexao = mysqli_connect("localhost", "root", "", "pv");;

 	if($_SESSION['usuario'] === null){
 		header("location: login.php");
 	}

 	$inf = mysqli_query($conexao, "SELECT nome FROM usuarios WHERE id_user = ". $_SESSION['usuario']);
 	$linha = mysqli_fetch_array($inf);
 	$SESSION['nome'] = $linha['nome'];

	

?>

<!doctype html>
<meta charset="UTF-8">
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Ponto&Vírgula | Instruções </title>
		<link rel="stylesheet" type="text/css" href="pvaj.css">
	  


			
	</head>


<body>

					<div class="fundo"></div>
					<div class="cabecalho"></div>
					<div class="fadeIn"> <br>
					
					<font face="Courier new" class="sla" size="10">&nbsp;Ponto&Vírgula</font>
			
					<div class="menuN"> </div>
					<header class="pos_menuN" >
						
					<ul> <font face="Giddyup Std">
					<li><a href="pontoevirgula.php" draggable="false"> Home </a></li>
					<li><a href="destroi.php" draggable="false">  Sair</a></li>
					
					</font> </ul>
					</header>
	
					</div>			
			
				 
					<br><br><br><br><br><br><br>
					<center><div id="tv-radio">
		
					<video id="filme" controls="controls" poster="fotos/atencaov.jpg">
					<source src="pontoandvirgula.mp4" type="video/mp4">
					Desculpe, mais nao foi possível carregar o vídeo
					</video>
					</center>
					</div> <br><br><br>
						<center> 
					<form action="nick_ajudante.php" class="form"> <input type="submit" name="seguir" class="botao_enviar" value="Prosseguir" > </form>
						</center>
				
			
	</body>
	</html>