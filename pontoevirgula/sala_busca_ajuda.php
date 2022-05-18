<?php

// confere se nao esta em nenhuma conversa 
include('limpa_salas.php');

if($_SESSION['usuario'] === null){
 		header("location: login.php");
 	}

 		// confere se está na sala de espera
 	$query = $db->prepare("SELECT COUNT(*) FROM sala_busca_ajuda WHERE id_usuario_busca_ajuda =".$_SESSION['usuario']);
	$run = $query->execute();
	$linha = $query->fetch(PDO::FETCH_ASSOC);

	foreach( $linha as $sala){
		//var_dump($sala);

		if($sala === "0"){ // 0 é a quantidade de registros que retornou
		// nao esta na sala de espera
		header("location: nick_busca_ajuda.php");
	}

	}


?>
<html>

<!-- onde o usuario que pediu um conselho está esperando para ser selecionado -->
<!-- pensei em colocar um daqueles gifs para controlar o tempo da respiração, para a pessoa ir fazendo -->
<!-- ou colocar algo para distrair -->
<!-- pode botar css em tudo que é html -->

<head>
<!doctype html>
<meta charset="UTF-8">
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Sala de Espera</title>
		<link rel="stylesheet" type="text/css" href="css/pvaj.css">
	</head>
<script  src="https://code.jquery.com/jquery-3.4.1.js"  
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>


</head>

<body>

	<div class="fundo"></div>
  
  			<div class="caixacentro"></div>  
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

<br><br><br><br><br><br><br><br><br><br>
	<center><font face="Courier New" color=""> Caso não haja ninguém na sala, aguarde um momento <br> até outro usuário se conectar 😊 </font></center>

	<br><br>
	<center><img class="gif" src="fotos/giphy.gif"></img></center>


		<script>

			LoadSala();

		setInterval(function(){
			LoadSala();
		}, 1000);
		
		function LoadSala()
		{ 
			$.post('lista.php?action=confere', function(response){ // confere se foi selecionado

					if (response == '1'){ // selecionado é 1 (ou seja, foi escolhido)
						$.post('lista2.php?action=apaga'); // apaga o selecionado
						
						window.location.assign("chat.php"); // envia para a pagina de chat
					}

			});
		}
		
		$( "#sair" ).click(function() {		// para sair da sala de espera
			$.post('lista.php?action=sairBuscaAjuda', function(response){
				if(response==1){
					window.location.assign("pontoevirgula.php");
				}

			});



		});

	</script>

</body>
</html>