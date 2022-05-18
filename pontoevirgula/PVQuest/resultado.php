<!-- fazer um pra se for igual -->

<?php 
	
	include ("contagem.php");
	include("../limpa.php");
	
?>
 <html>
 <head> 
	<link rel="stylesheet" type="text/css" href="pvcss.css">
	<head> 
 <body>
<div class="fundo"> </div>
					<div class="cabecalho"></div>
					<div class="fadeIn"> <br>
					
					<font face="Courier new" class="sla" size="10">&nbsp;Ponto&Vírgula -  <b> Resultado </b></font>
			
					<div class="menu"> </div>
				<header class="pos_menu">
					
				<ul> <font face="giddyup-std.oft">
					
					<!-- draggable é q nao é arrastavel -->
			          <li><a href="../pontoevirgula.php" draggable="false">Home</a></li>
					<li><a href="../ajuda.php" draggable="false">  Ajuda</a></li>
			   		<li><a href="../destroi.php" draggable="false"> Sair</a></li>
					
					</font> </ul>
					</header>
				
	

 </div>
 <br><br><br><br><br><br><br><br><br><br><br>
 <center>
 <font face="corbel" size="5"> <div class="ab"> 

 <?php


 if ((13>$b) && ($b > 10) && (13>$r) && ($r>10)){
 echo "Está cuidando, mas ainda precisa dar um pouco de atenção a sua saúde.";
 } else if ($r > $b) {
 echo "Você não parece bem... Precisa dar mais atenção à sua saúde. Aconselhamos procurar ajuda profissional!"; 
 } else if ($b > $r) {
 echo "Parabéns! Está cuidando muito bem de sua saúde, continue assim :)"; }

 ?>
 </div>
 </body> 
 </html>