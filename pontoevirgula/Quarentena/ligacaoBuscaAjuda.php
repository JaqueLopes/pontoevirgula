<?php

	session_start();
 	$conexao = mysqli_connect("localhost", "root", "", "pv");;

 	if($_SESSION['usuario'] === null){
 		header("location: login.php");
 	}

 	mysqli_query(" INSERT INTO sala_busca_ajuda SET id_usuario_busca_ajuda= "$_SESSION['id_user']);  //{id_user}

 	$senha = mysqli_query(" SELECT senha_busca_ajuda FROM sala_ajudante WHERE id_usuario_ajudante={id_user}");

 	if ((mysqli_query(" SELECT id_usuario_busca_ajuda FROM sala_busca_ajuda WHERE senha_busca_ajuda = ".$senha)) == null ){
 		header("Location: PegaNickDois.php");
 	}

 ?>