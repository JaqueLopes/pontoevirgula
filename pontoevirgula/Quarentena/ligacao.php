<?php
    // só de uma lado essa ligação p n dar b.o.
	// só salva o id pro q busca ajuda


	session_start();
 	$conexao = mysqli_connect("localhost", "root", "", "pv");;

 	if($_SESSION['usuario'] === null){
 		header("location: login.php");
 	}

 	mysqli_query(" INSERT INTO sala_ajudante SET id_usuario_ajudante= ".$_SESSION['id_user']); 

 	
 	$id_busca_ajuda = mysqli_query($conexao, "SELECT id_usuario FROM sala_busca_ajuda WHERE id_usuario_busca_ajuda != NULL ");
   // como seleciona só 1?
 	
 	// pega o id do usuario busca ajuda


 	if ($id_busca_ajuda != null){
 	$senha1 = mysqli_query($conexao, "SELECT senha_busca_ajuda FROM sala_busca_ajuda WHERE id_usuario_busca_ajuda = ".$id_busca_ajuda);
 	$senha2 = mysqli_query($conexao, "SELECT senha_ajudante FROM sala_ajudante WHERE id_usuario_ajudante = {id_user}");  	
 	// pegar o user dessa sessao ao inves de buscar na sala de espera
 	
 	mysqli_query ("INSERT INTO conversa (id1, id2) VALUES (".$_SESSION['id_user'].",".$id_busca_ajuda.")"); // $query =
 	$conv = mysqli_query ($conexao, "SELECT id_conv FROM conversa WHERE id1 =". $_SESSION['id_user']);
 	// pega id conv 

 	// faz delete!!!
 	mysqli_query (" UPDATE sala_ajudante SET id_usuario_ajudante = NULL WHERE senha_ajudante = ".$senha1); 
	mysqli_query (" UPDATE sala_busca_ajuda SET id_usuario_busca_ajuda = NULL WHERE senha_busca_ajuda = ".$senha2);

 	header("Location: PegaNick.php");
 	$id_busca_ajuda = null;
?>