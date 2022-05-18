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
		<title>Ponto&Vírgula | Procure ajuda </title>
		<link rel="stylesheet" type="text/css" href="css/pvaj.css">
	  


				<script type="text/javascript">
					count = 0;
					function toggle(obj) { 
					var el = document.getElementById(obj);
					if ( el.style.display != 'none' ) {
						el.style.display = 'none';
					} else {
						el.style.display = '';
					}
					} 

			</script> 
	</head>


<body>

					<div class="fundo"></div>
					<div class="cabecalho"></div>
					<div class="fadeIn"> <br>
					
					<font face="Courier new" class="sla" size="10">&nbsp;Ponto&Vírgula</font>
			
					<div class="menu"> </div>
				<header class="pos_menu">
					
				<ul> <font face="Giddyup Std">
					
					<!-- draggable é q nao é arrastavel -->
			          <li><a href="pontoevirgula.php" draggable="false">Home</a></li>
					<li><a href="PVQuest/pvquest2.php" draggable="false">  Quest</a></li>
			   		<li><a href="destroi.php" draggable="false"> Sair</a></li>
					
					</font> </ul>
					</header>
	
					</div>			
					<div class="lateral"></div>
					</div>
					<div class="cont_lateral">
				
				
				

					<br><br><br>
					<center><font face="Giddyup Std" size="5" color="white"> Seja Bem-Vindo </font>
					<br><br><br>
					 <img src="fotos/icone.png" class="imge">  <br><br>
					<font face="Courier New" size="4" color="white"> <?php echo ($SESSION['nome']); ?> </font>
					<br><br><br></center>

					
				</div>
				 
				<br><br><br><br><br><br><br><br><br>
				
				<center>
			<button type="submit"  class="botao_c" onclick="toggle('maisinfo');">
			  <b> Atendimentos gratuitos em Campinas </b>  </button>
			<div id='maisinfo' style='display:none' >
			<font face="courier new" size="4">
			<ul class="texto" align="justify"> 
			
			<li><b>CAPS (Centro de Atendimento Psicossocial)</b>- Em Campinas existem 13 CAPS. As pessoas interessadas devem procurar o Centro de Saúde mais próximo ao bairro onde moram para serem encaminhadas.</li><br><p><br>
			
			<p><br><br><b>QUALQUER UNIVERSIDADE COM CURSO DE PSICOLOGIA DEVE TER ATENDIMENTO PSICOLOGICO – EXEMPLOS: <p></b><br>
			<li> <b>Universidade São Francisco (USF) </b> </li> <p> <br><br>
			Possui no Campus Campinas (Unidade Swift) o Serviço-Escola de Psicologia, que oferece à comunidade atendimentos gratuitos <p>
			<b>Endereço:</b> Rua Waldemar César da Silveira, 105. Vila Cura D’Ars (Swift).<p>
			<b>Telefone:</b> (19) 3779-3327<p>
			Horário de funcionamento: De segunda a sexta-feira, das 8h às 21h30, e aos sábados, das 9h30 às 13h30. Os agendamentos podem ser feitos pessoalmente ou pelo telefone.<br><p><br>
 
			<li> <b> Unicamp </b> </li> <p><br><br>
			<b>Endereço:</b> Rua Tessália Vieira de Camargo, 126, Cidade Universitária, Zeferino Vaz.<p>
			<b>Telefone:</b> (19) 3521-7206 e 3521-7514 <p>
			<b>E-mail:</b> psi@fcm.unicamp.br<p>
			Horário de funcionamento: A definir, de acordo com o encaminhamento médico.<p><br><br>

			
			<li><b> Clínica Escola de Psicologia da PUC-Campinas (a PUCC anunciou a suspenção de atendimentos pelo SUS por tempo indeterminado) <p><br> </b></li>
			<b>Procedimento:</b> O atendimento é aberto à comunidade, por procura espontânea ou encaminhamento.<p>
			<b>Endereço:</b> Campus II da PUC-Campinas – Avenida John Boyd Dunlop – s/n° - Jd. Ipaussurama <p>
			<b>Telefone:</b> (19) 3776-6846. <p>
			Horário de funcionamento: Informado mediante a demanda relatada no contato por telefone. <p><br>

			
			<li> <b> Clínica de Psicologia da Unip </b> </li> <p><br><br>
			O atendimento é gratuito para crianças, adolescentes e adultos que apresentam transtornos comportamentais e afetivos e dificuldades de aprendizagem, entre outros. A pessoa interessada deve agendar um horário e aguardar a chamada para atendimento.
			<b> Endereço:</b> Rua Sampainho, 45 – Cambuí <p>
			<b> Telefones: </b> (19) 3294-1128 / (19) 3254-1921 / (19) 3294-1209 <p>
			Dias e horários de atendimento: de 2ª a 6ª feira, das 8h às 23h, e sábado, das 8h às 12h.<br><p><br>
			
			<li> <b> Clínica de Psicologia da Faculdade Anhanguera </b> </li><p><br><br>
			<b>Data da triagem:</b> Atendimentos na modalidade plantão psicológico são realizados de segunda a sexta-feira, das 10h às 18h. Não é necessário agendamento. Os atendimentos são realizados por ordem de chegada.<p>
			<b>Local:</b> Laboratório de Psicologia Aplicada. Faculdade Anhanguera de Campinas - Taquaral <p>
			<b>Endereço:</b> Rua Bento de Arruda Camargo, 772 São Quirino. <p><br>

			<li> <b> ITCR Campinas </b> </li> <p><br><br>
			A clínica, que é particular, atende por um sistema de triagem dos interessados. É preciso marcar a triagem por telefone.
			<b> Endereço: </b> Rua Josefina Sarmento, 387/395, Cambuí, Campinas <p>
			<b> Telefones:</b> (19) 3294-1960, 3294-8544 e 3254-2839 <p>
			<b> Horário de funcionamento: </b> A triagem é feita sempre às sextas-feiras, das 8h às 17h30, mas é preciso agendar o atendimento antes <p>
			<b> Custo:</b> O preço das sessões varia de acordo com a avaliação socioeconômica feira pela equipe do ITCR <p><br>

			<li><b> UNISAL - Unidade Campinas / Liceu (É preciso marcar a triagem)</li></b> <p><br><br>
			
			<b>Endereço:</b> Rua Baroneza Geraldo de Resende, 330 - Jd. Guanabara, Campinas - SP, 13075-270 <p>
			<b> Telefones:</b> 19 3744-6800 <p>

			</ul>
			</div> 
			<p><br> 
	
			 <button type="submit"  class="botao_c" onclick="toggle('imagem');">
			 <b> Quando a boca cala, o corpo fala  </b>  </button>
			 <div id="imagem" style='display:none' > 
			 <img src="fotos/soma.jpg"> 
			 </div> 
			 
			 <p><br>
			 <button type="submit"  class="botao_c" onclick="toggle('imagem2');">
			 <b> Tabelinha dos sentimentos ❤ </b>  </button>
			 <div id="imagem2" style='display:none' > 
			 <img src="fotos/tabela.jpg"> 
			 </div> 
			 
			 <p><br>
			 <button type="submit"  class="botao_c" onclick="toggle('imagem3');">
			 <b> É bom saber ❤ </b>  </button>
			 <div id="imagem3" style='display:none' > 
			 <img src="fotos/imagem3.jpg"> 
			 </div> 
			 
			  <p><br>
			 <button type="submit"  class="botao_c" onclick="toggle('maisinfo2');">
			 <b> Links Úteis </b>  </button>
			 <div id='maisinfo2' style='display:none' >
			<font face="impact, fantasy" size="4">

			<p align="justify" class="textolinks"> 
				<br><br><b>


				<a href="http://mds.gov.br/assuntos/assistencia-social/unidades-de-atendimento/cras" target="_blank"> CRAS </a> <br><br>
				<a href="http://www.setembroamarelo.org.br/" target="_blank"> Movimento Setembro Amarelo, Dia mundial de Prevenção ao Suicídio </a> <br><br>
				<a href="http://www.amigosdozippy.org.br/" target="_blank"> Educação Emocional </a> <br><br>

				<a href="http://www.rebraps.com.br/" target="_blank"> Rede Brasileira de Prevenção ao Suicídio </a> <br><br>

				<a href="https://www.befrienders.org/portugese" target="_blank"> Befrienders Worldwide </a> <br><br>
				<a href="https://www.mapadoacolhimento.org/" target="_blank"> Mapa do Acolhimento (Exclusivo para violência contra a mulher)</a> <br><br>
				<a href="http://www.iasp.info" target="_blank"> Associação Internacional para a Prevenção do Suicídio </a> <br><br>
				<a href="https://www.psicologiamsn.com/2015/02/psicoterapia-conheca-os-8-principais-tipos.html" target="_blank"> Principais Tipos de psicoterapia </a> <br><br>
				<a href="https://www.disque100.gov.br/" target="_blank"> Disque 100 (Denuncia de crimes virtuais) </a>  
			</p></b>				
			 </div> 
			</center>
			
			
			

			
			
		</body>
</html>