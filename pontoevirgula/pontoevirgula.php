<?php

	include("limpa.php");
 	$conexao = mysqli_connect("localhost", "root", "", "pv");

 	// pegando a quantidade de denuncias recebidas
 	$infDenun = mysqli_query($conexao, "SELECT qtd_denuncias FROM usuarios WHERE id_user = ". $_SESSION['usuario']);
 	$linhaDenun = mysqli_fetch_array($infDenun);
 	$qtd = $linhaDenun['qtd_denuncias'];

 	// se tiver 3 denuncias volta para a pagina de login com o erro
 	if ($qtd >= '3'){
 		header ("Location: login.php?erro=1"); 
		$_SESSION["login"] = false;
		die();
 	}

 	// se nao tiver logado, volta
 	if($_SESSION['usuario'] === null){
 		header("location: login.php");
 	}

 	// pegando o nome do usuario
 	$inf = mysqli_query($conexao, "SELECT nome FROM usuarios WHERE id_user = ". $_SESSION['usuario']);
 	$linha = mysqli_fetch_array($inf);
 	$SESSION['nome'] = $linha['nome'];

 	// avisa que tem denuncias {CSS, se souber no js}

 	if ($qtd == '2'){
 		echo ("<script type='text/javascript'> alert('Você tem duas denuncias.');  </script>");
 	}

 	if ($qtd == '1'){
 		echo ("<script type='text/javascript'> alert('Você tem uma denuncia.');  </script>");
 	}

 	?>

 	<!doctype html>
<meta charset="UTF-8">
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Ponto&Vírgula | Home</title>



		<link rel="stylesheet" type="text/css" href="css/testecss.css">


	</head>
		
		<body>

		
			<div class="fundo"></div>
			<div class="cabecalho"></div>
			<div class="fadeIn"> <br>

				
				<font face="Courier new" class="sla" size="10">&nbsp;Ponto&Vírgula</font>
			</div>


				<div class="menu"> </div>
				<header class="pos_menu">
					
				<ul> <font face="Giddyup Std">
					
					<!-- draggable é q nao é arrastavel -->


			          <li><a href="PVQuest/pvquest2.php" draggable="false">Quest</a></li>

			          			        <li><a href="#Quemsomos?" draggable="false"> O projeto &nbsp; </a></li>
					<li><a href="ajuda.php" draggable="false">&nbsp; &nbsp; &nbsp; Ajuda</a></li>
			   		<li><a href="destroi.php" draggable="false">&nbsp; &nbsp; &nbsp; Sair</a></li>
					
			    </font> </ul>
				</header>


				 
				<div class="lateral"> </div>
				
				<div class="cont_lateral">
	
					<br><br><br>
					<center><font face="Giddyup Std" size="5" color="white"> Seja Bem-Vindo </font>
					<br><br><br>
					<img src="fotos/icone.png"> <br><br>
					<font face="Courier New" size="4" color="white"> <?php echo ($SESSION['nome']); ?> </font>
					<br><br><br></center>

					<!-- <font face="Giddyup Std" size="5" color="white"> &nbsp&nbsp&nbsp Mensagens: </font> -->
				</div>

				<br><br><br><br><br><br><br><br><br><br><br><br><br>
	
				<center>
				<span style="position: absolute; top:180px; left:550px;"> 



				<br><br><br><br><br><br><br> 
				
						 <form action="instrucao1.php"> <input type="submit" class="botao_a" id="aconselhar" name="aconselhar" value="Estou disposto a ouvir! ❤ "> </form> 
						<br><br>
						<form  action="instrucao2.php"><input type="submit" id="Receber" name="receber" class="botao_a" value="Preciso desabafar... 💔"> </form> 
				</center>
				</span>
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
				<section id="Quemsomos?">
				<span style="position: absolute; left:300px;"> 
				<center><blockquote>
					<div name="quem somos" class="blockquote_a" > <br> Olá! Nós somos da equipe Ponto&Vírgula, que nada mais é do que um site de chat anônimo em que você pode pedir e dar conselhos quando quiser :) </p>
        A ideia surgiu quando percebemos que há altos índices de suicídio no mundo e muitas vezes as pessoas ao redor não percebem, acabando por não oferecer ajuda.
        É aí que entra o Ponto&Vírgula que na língua portuguesa indica uma pausa maior que a vírgula e menor que o ponto, é usado quando o autor de um texto poderia terminar uma frase, mas escolhe continuá-la. Porém, aqui na vida real tem um significado importante para as pessoas que já pensaram em cometer suicídio, que é justamente esse: as pessoas com tendências depressivas e suicidas escolham também seguir em frente, continuar, sem desistir no meio do caminho. </p>
        </span></div>
        <br><br><br><br>


				
				</blockquote> </center>
			
				</section>
				
				<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	
				
				<nav class="rod">

				<br><font size="3"><b><center>Projeto desenvolvido por: Jaqueline Lopes, Laura Rios Moreira, Luccas Bueno e Victoria Matiuzzo <br><br><br>
				<center><a href="agradecimentos.html"> <font color="#070719"><b> Agradecimentos </b></font></a> ||
				<a href='https://www.facebook.com/ProjetoPontoeVirgulaOficial/' target="_blank"><font color="#070719"><b> Facebook </b></a></font> ||
				<a href='download.php'> <font color="#070719"><b> Termos de Uso (PDF) </b></font></a>
				<br><br>
				<br>Copyright © 2019 </center></h1></b>
				
				</nav>					
		
	</body>
</html>