<?php
	// PEGA NICK BUSCA AJUDA

	include_once 'ligacaoBuscaAjuda.php';
	include_once 'ligacao.php';

	session_start();
 	$conexao = mysqli_connect("localhost", "root", "", "pv");;

 	if($_SESSION['usuario'] === null){
 		header("location: login.php");
 	}

 	if(isset($_POST['Enviar_nick2'])){

		$nick2 = $_POST['nick2'];

	$query = "INSERT INTO conversa SET nick2= ".$nick2." WHERE id_conv = ".$id_conv;


	header("Location: chat.php");

 	}

 ?>
 <!doctype html>
<meta charset="UTF-8">
<html lang="pt-br">
 <form action="PegaNickDois.php" method="post">
							<font face="Courier New">

									<tr><td> Nick: </td><td> <input type="text" name="nick2" class="campo" required autofocus></td></tr>

								<br>
								<input type="submit" value="Enviar" name="Enviar_nick2" class="botao_enviar">
							</font>	
						</form>
</html>