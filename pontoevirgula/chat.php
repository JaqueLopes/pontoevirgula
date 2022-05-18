<?php

 	session_start();
 	$conexao = mysqli_connect("localhost", "root", "", "pv");;

 	if($_SESSION['usuario'] === null){
 		header("location: login.php");
 	}

 	// pegando o nick do usuario nessa conversa
 	$inf = mysqli_query($conexao, "SELECT nick_atual FROM usuarios WHERE id_user = ". $_SESSION['usuario']);
 	$linha = mysqli_fetch_array($inf);
 	$_SESSION['nick_atual'] = $linha['nick_atual']; 

 	$infId = mysqli_query($conexao, "SELECT id_conv FROM usuarios WHERE id_user = ". $_SESSION['usuario']);
 	$linhaId = mysqli_fetch_array($infId);
 	$id_conv = $linhaId['id_conv']; 

 	if($id_conv === "0"){
 		header("location: pontoevirgula.php");
 	}

// pro outro nick
	$infId1 = mysqli_query($conexao, "SELECT id1 FROM conversa WHERE id_conv = ".$id_conv);
 	$linhaId1 = mysqli_fetch_array($infId1);
 	$id1 = $linhaId1['id1']; 

 	// conferindo se é igual ao id1
 	if ($id1 != $_SESSION['usuario']){
 		$infN1 = mysqli_query($conexao, "SELECT nick1 FROM conversa WHERE id_conv = ".$id_conv);
 		$linhaN1 = mysqli_fetch_array($infN1);
 		$outro_nick = $linhaN1['nick1']; 
 	} else {
 		$infN2 = mysqli_query($conexao, "SELECT nick2 FROM conversa WHERE id_conv = ".$id_conv);
 		$linhaN2 = mysqli_fetch_array($infN2);
 		$outro_nick = $linhaN2['nick2']; 
 	}


?>

<!DOCTYPE html>
<html Lang="en">
<html lang="pt-br">
<head>
	<meta charset="UTF 8">
	<title>Ponto&Vírgula - Chat</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
<!--<body onbeforeunload="return myFunction()">-->

			<div class="fundo"></div> 
			<div class="cabecalho"></div>
		 	<div class="fadeIn"><br>
			<font face="Courier new" size="7">&nbsp;Ponto&Vírgula - Chat</font></div>

			
			<button id="sair" class="sairdaconversa">Sair da conversa</button>

		

	<!-- denuncia -> ele abre a div (tirei do form do chat pq se nao fica atualizando e sumindo) --> 
<input class="denunciar" value="subscribe" type="button" data-toggle="modal" data-target="#exampleModal"> </input> 
	<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Denunciar</button> -->

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Denunciando Usuário</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" id="denunciaFrm">
          <div class="form-group">
            <label for="message-text" class="col-form-label">Por favor, escreva abaixo a sua denúncia:</label>
            <textarea name="denunciaTex" cols="30" rows="10"  class="form-control" id="message-text"></textarea>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary" id="denuncia">Enviar</button>
      </div>
    </div>
  </div>
</div>



	<div id="wrapperpv"> <!-- wrapper-->
		<center><h2><font face="Times New Roman"><b> Olá, <?php echo ($_SESSION['nick_atual']); ?>! Você está conversando com <?php echo($outro_nick) ?></b></font> </h2></center> <!-- mostrando esse nick {CSS}-->


		<div class="chat_wrapperpv">

			<div id="chatpv"></div> <!-- div onde está as mensagens {CSS}  -->
			
			<form method="POST" id="messageFrm">
				<br><br><br>
								<textarea name="message" cols="30" rows="10" class="textareapv" wrap="hard"></textarea> <!-- textarea onde escreve as mensagens {CSS} -->
				<button id="envia" class="enviar"> Enviar </button>
			<!-- botoes --> 
			
			

			</form>


		</div>

	</div>




	<script>

		$('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget); // Botão que acionou o modal
});

		// tem que clicar no site para funcionar
		window.onbeforeunload = function(event) {
			//$.post('handlers/messages.php?action=teste', function(response){ // sempre que está mudando de site ele coloca 222 no id conv, mas nao avisa nada para o usuario --> ruim pq ele atualiza sozinho por causa do ajax
			event.returnValue = "Write something clever here..";
			//});
		};

		LoadChat(); // funçao que carrega o chat

		setInterval(function(){ // atualizando o chat
			LoadChat();
		}, 1000);
		
		function LoadChat()
		{ // rolagem de mensagens

			$.post('handlers/messages.php?action=getMessages', function(response){ // pega a mensagens recebidas pelo messages.php

				var scrollpospv = $('#chatpv').scrollTop(); // #chatpv é a div
				var scrollpospv = parseInt(scrollpospv) + 520;  
				var scrollHeightpv = $('#chatpv').prop('scrollHeight');				


				$('#chatpv').html(response);

				if(scrollpospv < scrollHeightpv){

				} else{
					$('#chatpv').scrollTop( $('#chatpv').prop('scrollHeight') );
				}

			});

		}

		/*$('.textareapv').keyup(function(e){			
			if (e.which == 13){ // se na caixa de texto for enviado um enter apenas, o 13 é tipo um num do enter, sla
					var texto = $('.textareapv').val();
// nao esta funcionando o nao enviar mensagens sem nada
					if (texto !== ' '){
						$.post('handlers/messages.php?action=sendMessage&texto='+texto, function(response){
							if(response==1){					
								LoadChat();
								document.getElementById('messageFrm').reset(); // apaga o conteudo da caixa de texto
							} 
						});
					}
			
			return false; // para nao dar reflesh
			}	
		});*/

		$( "#envia" ).click(function() { // botao de enviar		
			var texto = $('.textareapv').val();

			if (texto !== ''){
				$.post("handlers/messages.php", {
				    action: "sendMessage", texto
				}, function(response){
				     if(response==1){					
							LoadChat();
							document.getElementById('messageFrm').reset(); // apaga o conteudo da caixa de texto
						} 		
				 });
			}
			/*if (texto !== ''){
				$.post('handlers/messages.php?action=sendMessage&texto='+texto, function(response){
					if(response==1){					
						LoadChat();
						document.getElementById('messageFrm').reset(); // apaga o conteudo da caixa de texto
					} 					
				}); 
			} */ 
		
			return false; // para nao dar reflesh	
		});

		$( "#sair" ).click(function() {		// sair da conversa
				
					window.location.assign("pontoevirgula.php"); // volta para a pagina do ponto do virgula pois no limpa ele remove o nick do usuario e o on da conversa que é o da o aviso de que o outro usuario saiu da conversa
		
		});


		 $( "#denuncia" ).click(function() {	// para fazer uma denuncia

    		event.preventDefault();  
			var resposta = confirm("Deseja mesmo denunciar?"); // confirma se quer a denuncia
    			if (resposta == true){

    			var denunciaTex = $('.form-control').val(); // salvando o texto da denuncia
    			
    				//alert(denunciaTex);
        			$.post('handlers/messages.php?action=denuncia&denunciaTex='+denunciaTex, function(response){ // enviando o texto da denuncia
						if(response==1){ // se a denuncia foi feita avisa que denunciou
							alert("Obrigado pela denuncia!");
							// ele ja carrega depois disso entao nao precisa fechar a div
						}  
						if (response==2){
							alert('Apenas uma denuncia por conversa!');
							// fecha a div
						} 

					});
    			}

		});

		// isso tudo n recarrega a pag

	</script>


 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>