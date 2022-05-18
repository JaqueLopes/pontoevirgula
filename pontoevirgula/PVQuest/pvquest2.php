 <?php

 	include("../limpa.php");

 	$conexao = mysqli_connect("localhost", "root", "", "pv");;

 	if($_SESSION['usuario'] === null){
 		header("location: ../login.php");
 	}

 	$inf = mysqli_query($conexao, "SELECT nome FROM usuarios WHERE id_user = ". $_SESSION['usuario']);
 	$linha = mysqli_fetch_array($inf);
 	$SESSION['nome'] = $linha['nome'];

?>
<!doctype html>
<meta charset UTF-8>
<html>
<head>
		<meta charset="UTF-8">
		<title>Ponto&Vírgula | Questionário </title>
		<link rel="stylesheet" type="text/css" href="pvcss.css">
		
		<script type="text/javascript">
			count = 0;
			
			function toggle(obj) { // esse é qianmdo passa o mouse por cima para explicar a pergnt
				var el = document.getElementById(obj);
					if ( el.style.display != 'none' ) {
						el.style.display = 'none';
					} else {
						el.style.display = '';
					}
			}

			function carroselPerguntas() {
				count++;
				if(count <= 23 /* quantidade de perguntas do seu questionário */) {
					document.getElementById("pergunta"+count+"").setAttribute("class", "pergunta-inativa");
					document.getElementById("pergunta"+(count+1)+"").setAttribute("class", "pergunta-ativa");
				} else {
					document.getElementById("prosseguir-btn").setAttribute("class", "pergunta-inativa");
				}
			}

		</script> 
		

		
</head>

<body>

<div class="fundo"> </div>
					<div class="cabecalho"></div>
					<div class="fadeIn"> <br>
					
					<font face="Courier new" class="sla" size="10">&nbsp;Ponto&Vírgula - <font size="6.5"> <b> Como você está cuidando da sua saúde? </b></font></font>
			
					<div class="menu"> </div>
				<header class="pos_menu">
					
				<ul> <font face="Giddyup Std">
					
					<!-- draggable é q nao é arrastavel -->
			          <li><a href="../pontoevirgula.php" draggable="false">Home</a></li>
					<li><a href="../ajuda.php" draggable="false">  ajuda</a></li>
			   		<li><a href="../destroi.php" draggable="false"> Sair</a></li>
					
					</font> </ul>
					</header>
				<div class="lateral"></div>
					</div>
					<div class="cont_lateral">

					<br><br><br>
					<center><font face="Giddyup Std" size="5" color="white"> Seja Bem-Vindo </font>
					<br><br><br>
					 <img src="../fotos/icone.png" class="imge">  <br><br>
					<font face="Courier New" size="4" color="white"> <?php echo ($SESSION['nome']); ?> </font>
					<br><br><br></center>

					
				</div>




<br><br><br><br>
<div class="a"> 
<font face="Comic Sans MS" size="4">



<form action="resultado.php" method="POST"></br>

	<div id="pergunta1" class="pergunta-ativa">
		
		<p> <b>	Com que frequência você tem observado o que é necessário para sua vida, avaliando o “porquê” e o “como” tem feito algumas coisas? </p> </b>
		<input type='radio' name='p1' value='true' id='p1' > Frequentemente.</input></br>
		<input type='radio' name='p1' value='true' id='p1' > Às vezes.</input></br>
		<input type='radio' name='p1' value='false' id='p1' > Raramente.</input></br>
		<input type='radio' name='p1' value='false' id='p1' > Quase nunca.</input></br>

			 <center> 
			<div id='maisinfo' style='display:none' >
					Se você seleciona o que realmente é importante e escolhe o que,
				embora muito legal, ficará para uma outra oportunidade em sua vida. Não dá para
				fazer tudo. 
			</div> 	 </center> 
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo');"> Não entendi a pergunta</a> 
		    </header> <br><br><br><br>
		
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div> 

	<div id="pergunta2" class="pergunta-inativa">
		<p> <b> Já parou para avaliar suas emoções, prestando atenção em si mesmo e nos seus pensamentos? Se sim, com que frequência? </p></b>
		<input type='radio' name='p2' value='true' id='p2' > Sim, frequentemente. </input></br>
		<input type='radio' name='p2' value='true' id='p2' > Sim, as vezes. </input></br>
		<input type='radio' name='p2' value='false' id='p2' > Sim, porém raramente. </input></br>
		<input type='radio' name='p2' value='false' id='p2' > Não, em nenhum momento. </input></br>
			 <center> 
			<div id='maisinfo2' style='display:none' >
					Ao buscar diferenciar suas
					emoções você tem condições de compreender o que realmente
					precisa e selecionar estratégias para lidar com o
					problema?
			</div> </center>
			<header class="a_pos">  <br><br><br><br>
			<a href='pvquest2.php' onmouseover="toggle('maisinfo2');">Não entendi a pergunta</a>
			</header>
		
	
		
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>

	<div id="pergunta3" class="pergunta-inativa">
		<p> <b>	Como você tem cuidado do seu horário de sono? </p></b>
		<input type="radio" name="p3" value="true" id="p3" > Eu hiberno (mais de 10 horas).</input></br>
		<input type="radio" name="p3" value="true" id="p3" > Dormido bem (mais de 8 horas por dia).</input></br>
		<input type="radio" name="p3" value="true" id="p3" > Dormido mais ou menos (entre 6 e 8 horas por dia).</input></br>
		<input type="radio" name="p3" value="false" id="p3" > Dormido pouco (cerca de 6 horas por dia).</input></br>
		<input type="radio" name="p3" value="false" id="p3" > Dormir? O que é isso? (Menos de 6 horas por dia).</input></br>
		<input type="radio" name="p3" value="false" id="p3" > Tento dormir, porém acordo muito durante a noite.</input></br>
		
			 <center> 
			<div id='maisinfo3' style='display:none' >
				Dormir bem contribui para que seu corpo se sinta descansado e
				seu dia possa render mais.  
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo3');">Não entendi a pergunta</a>
			</header>  <br><br><br>
		
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>

	<div id="pergunta4" class="pergunta-inativa">
		<p> <b>	Como tem sido sua alimentação? </p> </b> 
		<input type="radio" name="p4" value="true" id="p4" > Me alimento bem, comendo frutas e vegetais diariamente e sem ficar longos períodos sem comer.</input></br>
		<input type="radio" name="p4" value="false" id="p4" > Me alimento com frutas e vegetais, porém passo longos períodos sem comer.</input></br>
		<input type="radio" name="p4" value="false" id="p4" > Passo curtos períodos sem comer, porém não como muitas frutas e vegetais.</input></br>
		<input type="radio" name="p4" value="false" id="p4" > Péssima. Como coisas que fazem mal a saúde e passo longos períodos sem comer.</input></br> <P>
			 <center> 
			<div id='maisinfo4' style='display:none' >
					Ser uma pessoa ativa e alimentar-se bem ajudam a manter a saúde corporal e
					mental.
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo4');">Não entendi a pergunta</a>
			</header>  <br><br><br><br>
		
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>

	<div id="pergunta5" class="pergunta-inativa">
		<p> <b> Pratica algum esporte? Se sim, com que frequência? </p> </b> 	
		<input type="radio" name="p5" value="true" id="p5" > Sim, frequentemente </input></br>
		<input type="radio" name="p5" value="true" id="p5" > Sim, as vezes </input></br>
		<input type="radio" name="p5" value="false" id="p5" > Sim, porém raramente </input></br>
		<input type="radio" name="p5" value="false" id="p5" > Não. </input></br>
			 <center> 
			<div id='maisinfo5' style='display:none' >
					Exercícios liberam substâncias químicas de bem-estar no seu organismo.
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo5');">Não entendi a pergunta</a>
			</header> <br><br><br><br>
		
		
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>

	<div id="pergunta6" class="pergunta-inativa">
		<p> <b>	Como tem sido seu relacionamento com as pessoas?</p> </b>
		<input type="radio" name="p6" value="true" id="p6" > Ótimo! Consigo lidar bem com o perdão e expectativas que coloco sobre elas. </input></br>
		<input type="radio" name="p6" value="true" id="p6" > Razoável. Tem muitos momentos em que eu me decepciono e demoro para voltar a amizade, porém sempre acabo perdoando. </input></br>
		<input type="radio" name="p6" value="false" id="p6" > Ruim. Não perdoo e guardo muito rancor, até criando desafetos. </input></br>
				<center> 
			<div id='maisinfo6' style='display:none' >
					Se você  fortalece desafetos e crenças sobre o quanto pessoas
					são isso ou aquilo, ou fortalece afetos e procura sempre não julgar o outro 
					e não guardar rancor. 

			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo6');">Não entendi a pergunta</a>
			</header>  <br><br><br><br>
	
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>

	<div id="pergunta7" class="pergunta-inativa">
		<p> <b>	Ao estabelecer suas metas, você tem cobrado quanto de si mesmo? Ou seja, quanto tem sido rígido consigo mesmo?</p> </b>
		<input type="radio" name="p7" value="false" id="p7" > Muito. Eu quero fazer tudo rapidamente e que o resultado seja perfeito.</input></br>
		<input type="radio" name="p7" value="true" id="p7" > Tento manter dentro do que sei que sou capaz de fazer, sem subestimar e nem superestimar minhas capacidades, me dou tempo e sei admitir meus erros.</input></br>
		<input type="radio" name="p7" value="false" id="p7" > Não acredito o suficiente em mim mesmo, logo não estabeleço metas.</input></br>
				<center> 	
					<div id='maisinfo7' style='display:none' >
				Se você tem um objetivo você age de acordo com os níveis disponíveis de energia,
			    sempre se estressa e cansa muito durante o processo ou não acredita que é capaz? 
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo7');">Não entendi a pergunta</a>
			</header>  <br><br><br><br>
		
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
		</div>

	<div id="pergunta8" class="pergunta-inativa">
		<p> <b> Você tem aproveitado a vida? Isto é, além das atividades obrigatórias, você tem realizado atividades que lhe dão prazer? Se sim, com que frequência?</p> </b>
		
		<input type="radio" name="p8" value="true" id="p8" > Sim, frequentemente. </input></br>
		<input type="radio" name="p8" value="true" id="p8" > Sim, as vezes. </input></br>
		<input type="radio" name="p8" value="false" id="p8" > Sim, porém raramente. </input></br>
		<input type="radio" name="p8" value="false" id="p8" > Não. </input></br>
			<center> 	
					<div id='maisinfo8' style='display:none' >
						Você reserva um tempo para realizar atividades que lhe dão prazer?
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo8');">Não entendi a pergunta</a>
			</header>  <br><br><br><br>
		
		
		<center><button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>

	<div id="pergunta9" class="pergunta-inativa">
		<p> <b> Participa de algum grupo com os mesmos interesses que os seus? (Grupo de amigos, comunidade, etc.)</p></b>
		<input type="radio" name="p9" value="true" id="p9" > Sim. </input></br>
		<input type="radio" name="p9" value="false" id="p9" > Não. </input></br>
		
			<center> 	
					<div id='maisinfo9' style='display:none' >
						Se você pertence a algum grupo que te faz bem.
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo9');">Não entendi a pergunta</a>
			</header>  <br><br><br><br>
		
		
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>

	<div id="pergunta10" class="pergunta-inativa">
		<p> <b> Tem ajudado o próximo de alguma forma? Dedicando seu tempo, atenção e etc.?</p></b>
		<input type="radio" name="p10" value="true" id="p10" > Sim. </input></br>
		<input type="radio" name="p10" value="false" id="p10" > Não. </input></br>
		
			<center> 	
					<div id='maisinfo10' style='display:none' >
						Se você está se envolvendo com projetos sociais e trabalho voluntário ou 
						praticando a empatia no seu cotidiano, com ações de ajuda. 
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo10');">Não entendi a pergunta</a>
			</header>  <br><br><br><br>
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>

	<div id="pergunta11" class="pergunta-inativa">
		<p> <b>Se desafia? Isto é, faz algo fora da sua rotina saindo da sua zona de conforto? Se sim, com que frequência? </p></b>
		
		<input type="radio" name="p11" value="true" id="p11" > Sim, frequentemente. </input></br>
		<input type="radio" name="p11" value="true" id="p11" > Sim, as vezes. </input></br>
		<input type="radio" name="p11" value="false" id="p11" > Sim, porém raramente. </input></br>
		<input type="radio" name="p11" value="false" id="p11" > Não. </input></br>
			<center> 	
					<div id='maisinfo11' style='display:none' >
						Você tem buscado sair da rotina e aprender mais com a vida? Experimentar 
						coisas novas, praticar atividades fora do seu costume e etc.
			</div> </center> 
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo11');">Não entendi a pergunta</a>
			</header> <br><br><br><br>
		
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>

	<div id="pergunta12" class="pergunta-inativa">
		<p> <b> Você tem conseguido lidar com seu estresse?</p></b>
		<input type="radio" name="p12" value="true" id="p12" > Sim! Tenho administrado meus gatilhos para o estresse muito bem e tenho praticado atividades que lidem com isso. </input></br>
		<input type="radio" name="p12" value="false" id="p12" > Mais ou menos. Eu não sei administrar meus gatilhos de estresse e/ou não tenho feito atividades para lidar com isso. </input></br>
		<input type="radio" name="p12" value="false" id="p12" > Não. Tenho constantes crises de estresse e não sei lidar com elas, e também não faço nenhuma atividade contra isso. </input></br>
			<center> 	
					<div id='maisinfo12' style='display:none' >
						Nos seus momentos de estresse você tenta manter a calma,
					    não consegue manter nem um pouco de calma ou você consegue lidar com a tensão? 
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo12');">Não entendi a pergunta</a>
			</header> <br><br><br><br>
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>

	<div id="pergunta13" class="pergunta-inativa">
		<p><b> Você tem dedicado mais tempo pensando no Passado, Presente ou Futuro? </p> </b>
		<input type="radio" name="p13" value="false" id="p13" > Passado, me prendo muito a coisas que já aconteceram. </input></br>
		<input type="radio" name="p13" value="false" id="p13" > Presente, deixo o que está acontecendo ao meu redor nesse momento como centro dos meus pensamentos. </input></br>
		<input type="radio" name="p13" value="false" id="p13" > Futuro, foco muito em algo que ainda não aconteceu. </input></br>
		<input type="radio" name="p13" value="false" id="p13" > Fico oscilando entre os três de maneira confusa. </input></br>
		<input type="radio" name="p13" value="true" id="p13" > Sei administrar o que merece mais foco no momento, sem me prender muito a apenas um. </input></br>
			<center> 	
					<div id='maisinfo13' style='display:none' >
						Se os seus pensamentos estão <b> frequentemente </b> em projetos futuros, acontecimentos passados ou
						vivendo o aqui e agora. 
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo13');">Não entendi a pergunta</a>
			</header><br><br><br><br>
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>

	
	<div id="pergunta14" class="pergunta-inativa">
		<p> <b> Você desabafa com alguém? </p> </b>
		<input type="radio" name="p14" value="true" id="p14" > Sim. </input></br>
		<input type="radio" name="p14" value="false" id="p14" > Não. </input></br>
		
			<center> 	
					<div id='maisinfo14' style='display:none' >
						Se quando está em uma situação difícil, você compartilha por que acha ruim carregar tudo 
						sozinho(a) ou guarda tudo pra você por que não gosta de se abrir.
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo14');">Não entendi a pergunta</a>
			</header> <br><br><br><br>
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>

	<div id="pergunta15" class="pergunta-inativa">
		<p> <b> O(s) ambiente(s) onde você passa mais tempo é organizado? </p> </b>
		<input type="radio" name="p15" value="true" id="p15" > Sim. </input></br>
		<input type="radio" name="p15" value="false" id="p15" > Não. </input></br>
		
			
			<center> 	
					<div id='maisinfo15' style='display:none' >
						Se o local onde vive e onde visita no cotidiano é bagunçado ou arumado.
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo15');">Não entendi a pergunta</a>
			</header><br><br><br><br>
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
		</div>

	<div id="pergunta16" class="pergunta-inativa">
		<p> <b> Como anda sua vida social? </p></b>
		<input type="radio" name="p16" value="true" id="p16" > Boa! Passo muito tempo com pessoas que amo! </input></br>
		<input type="radio" name="p16" value="true" id="p16" > Mais ou menos. É difícil, porém eu consigo dedicar um tempo as pessoas que amo. </input></br>
		<input type="radio" name="p16" value="false" id="p16" > Ruim. Não consigo dedicar nenhum ou quase nada de tempo as pessoas que amo. </input></br>
		
			<center> 	
					<div id='maisinfo16' style='display:none' >
						Você dá atenção para as atividades com as pessoas ao seu redor?
						Isto é, passa um tempo com as pessoas que são importantes pra você?
						
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo16');">Não entendi a pergunta</a>
			</header><br><br><br><br>
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>
	
	<div id="pergunta17" class="pergunta-inativa">
		<p> <b>	Se diverte com que frequência? </p></b>
		<input type="radio" name="p17" value="true" id="p17" > Frequentemente.</input></br>
		<input type="radio" name="p17" value="true" id="p17" > As vezes</input></br>
		<input type="radio" name="p17" value="false" id="p17" > Raramente</input></br>
		<input type="radio" name="p17" value="false" id="p17" > Quase nunca</input></br>
			<center> 	
					<div id='maisinfo17' style='display:none' >
						Você ri, faz coisas que te deixam muito feliz e/ou procura ver o lado engraçado 
						das coisas nos momentos certos?
						
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo17');">Não entendi a pergunta</a>
			</header> <br><br><br><br>
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>
		
	<div id="pergunta18" class="pergunta-inativa">
		<p> <b> Você tem conseguido notar as coisas boas ao seu redor? Ou você foca apenas nas ruins? </p> </b>
		<input type="radio" name="p18" value="true" id="p18" > Sim, noto as coisas boas ao meu redor. </input></br>
		<input type="radio" name="p18" value="true" id="p18" > As vezes consigo ver coisas boas ao meu redor. </input></br>
		<input type="radio" name="p18" value="false" id="p18" > Raramente observo coisas boas ao meeu redor.</input></br>
		<input type="radio" name="p18" value="false" id="p18" > Não consigo notar nada de bom ao meu redor, ou tenho muita dificuldade.</input></br>
			<center> 	
					<div id='maisinfo18' style='display:none' >
						Se você consegue ver as coisas boas da sua vida ou 
						só as ruins. 
						
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo18');">Não entendi a pergunta</a>
			</header> <br><br><br><br>
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>
	
	<div id="pergunta19" class="pergunta-inativa">
		<p><b> Tem dado atenção para sua espiritualidade? Se sim, como você se sente espiritualmente (independente do que acredita)? </p></b>
		<input type="radio" name="p19" value="true" id="p19" > Sim, me sinto bem. </input></br>
		<input type="radio" name="p19" value="false" id="p19" > Sim, me sinto mal. </input></br>
		<input type="radio" name="p19" value="false" id="p19" > Não parei para pensar nisso. </input></br>
			<center> 	
					<div id='maisinfo19' style='display:none' >
						Você possui alguma conexão espiritual com você mesmo ou em alguma religião? E isso te faz bem? 
						
			</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo19');">Não entendi a pergunta</a>
			</header><br><br><br><br>
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>
	
	<div id="pergunta20" class="pergunta-inativa">
		<p><b> Tem tido sabedoria para por o dinheiro e coisas materiais em seu devido lugar? </p></b>
		<input type="radio" name="p20" value="true" id="p20" > Sim. </input></br>
		<input type="radio" name="p20" value="false" id="p20" > Não. </input></br>
		
			<center> 	
					<div id='maisinfo20' style='display:none' >
						Você sabe reconhecer os limites e importância do dinheiro e das coisas materiais para você
						ou não vê necessidade de reconhecer limites?
						
					</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo20');">Não entendi a pergunta</a>
			</header><br><br><br><br>
		<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>
	
	<div id="pergunta21" class="pergunta-inativa">
		<p> <b> Tem algum vício? Se sim, o que tem feito em relação a isso? </p></b>
		
		<input type="radio" name="p21" value="true" id="p21" > Sim, porém já estou em algum tipo de tratamento para me livrar desse vicio. </input></br>
		<input type="radio" name="p21" value="false" id="p21" > Sim, e não tenho buscado ajuda. </input></br>
		<input type="radio" name="p21" value="true" id="p21" > Não. </input> </br>
			<center> 	
					<div id='maisinfo21' style='display:none' >
						Se possui vícios, em qualquer aspecto (drogas, desejos, comida e etc), 
						você trata isso?
						
					</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo21');">Não entendi a pergunta</a>
			</header><br><br><br><br>
	<center> <button id="prosseguir-btn" type="button" class="botao_enviar" onClick="carroselPerguntas()">Prosseguir </button> <!-- bota prosseguir--> </center> 
	</div>
	
	<div id="pergunta22" class="pergunta-inativa">
		<p> <b> Tem algum caso de transtorno psicológico (hereditário ou não) na sua família? Se sim, o que tem feito em relação a isso? </p> </b>
		
		<input type="radio" name="p22" value="true" id="p22" > Sim, porém eu tenho procurado ajuda profissional para cuidar disso. </input></br>
		<input type="radio" name="p22" value="false" id="p22" > Sim, e não tenho buscado ajuda. </input></br>
		<input type="radio" name="p22" value="true" id="p22" > Não. </input></br>

				<center> 	
					<div id='maisinfo22' style='display:none' >
						Algum familiar já passou por alguma situação de depressão, alguma síndrome,
						ansiedade, toc, estresse pós traumático e outros?
						
					</div> </center>
			<header class="a_pos">
			<a href='pvquest2.php' onmouseover="toggle('maisinfo22');">Não entendi a pergunta</a>
			</header>  <br><br><br><br>
		
	<center>
		<button id="enviar" type="submit" class="botao_enviar">Enviar</button>
	</center><br> <p>
	</div>

	</form>
</div>
</body>
</html>