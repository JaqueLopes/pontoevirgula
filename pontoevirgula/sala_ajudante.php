<html>
<?php

// confere se nao esta em nenhuma conversa
include('limpa_salas.php');

if($_SESSION['usuario'] === null){
 		header("location: login.php");
 	}

 	// confere se está na sala de espera
 	$query = $db->prepare("SELECT COUNT(*) FROM sala_ajudante WHERE id_usuario_ajudante =".$_SESSION['usuario']);
	$run = $query->execute();
	$linha = $query->fetch(PDO::FETCH_ASSOC);

	foreach( $linha as $sala){
		//var_dump($sala);

		if($sala === "0"){ // 0 é a quantidade de registros que retornou
		// nao esta na sala de espera
		header("location: nick_ajudante.php");
	}

	}



?>

<!-- Pode botas CSS em tudo de HTML -->



<!doctype html>
<meta charset="UTF-8">
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">
		<title>Sala de Espera</title>
		<link rel="stylesheet" type="text/css" href="css/testecss.css">
	</head>
<script  src="https://code.jquery.com/jquery-3.4.1.js"  
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>



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
	<center><div id="lista"></div></center> <!-- aqui vai ter a lista de quem está esperando para ser selecionado-->


		<script>

		LoadChat();

		setInterval(function(){
			LoadChat(); // faz a funçao agir de tanto em tanto tempo
		}, 1000);
		
		function LoadChat()
		{ // aqui embaixo está a rolagem
			$.post('lista.php?action=carregaLista', function(response){ 
				// $.post('invoca o link e, se preciso, envia algo', pega o que foi recebido em function(resposta))

				var scrollpos = $('#lista').scrollTop();
				var scrollpos = parseInt(scrollpos) + 520;
				var scrollHeight = $('#lista').prop('scrollHeight');				


				$('#lista').html(response); // coloca dentro do html de #lista a resposta recebdida

				if(scrollpos < scrollHeight){

				} else{
					$('#lista').scrollTop( $('#lista').prop('scrollHeight') );
				}


			});
		}

		$( "#sair" ).click(function() {		
			$.post('lista.php?action=sairAjudante', function(response){
				if(response==1){
					window.location.assign("pontoevirgula.php");
				}

			});



		});

	</script>

</body>
</html>