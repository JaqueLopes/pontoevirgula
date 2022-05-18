<?php


	session_start();

	include('config.php');


	switch($_REQUEST['action']){
 	case "carregaLista": // mostra quem está na sala de espera

 		$database = new Database();
		$db = $database->getConnection();

 		$query =  $db->prepare("SELECT * FROM sala_busca_ajuda"); // todos da sala busca ajuda

 		$run = $query->execute();

 		$rs = $query->fetchAll(PDO::FETCH_OBJ); 

 		$lista = '';
 		foreach( $rs as $usuario ){ // pra ir avançando no array
 		
 			// mostrando a senha e o nick dos usuarios {CSS}
 			$lista .= '<div> <a href="conexao.php?id='.$usuario->id_usuario_busca_ajuda.'&nick='.$usuario->nick_busca_ajuda.'"><font face="Courier New"> <strong> Ordem de chegada: </strong> '.$usuario->senha_busca_ajuda.' <strong> | Nick: </strong> '.$usuario->nick_busca_ajuda.' </font> </a> </div>';
 		} 

 		echo $lista;

 	break;

 	case "confere": // confere se o usuario foi selecionado

 	$database = new Database();
	$db = $database->getConnection();

	$query =  $db->prepare("SELECT selecionado FROM usuarios WHERE id_user = ". $_SESSION['usuario']); 

 	$run = $query->execute();

 	$linha = $query->fetch(PDO::FETCH_ASSOC); // puxando uma linha do resultado

 	echo $linha['selecionado']; // retorna o valor em selecionado --> se for 1 ele foi selecionado

 	break;

 	case "apaga": // muda o selecionado para 0

 	$database = new Database();
	$db = $database->getConnection();

	$query =  $db->prepare("UPDATE usuarios SET selecionado = '0' WHERE id_user = ".$_SESSION['usuario']); 

 	$run = $query->execute();

 	break;

 	case "sairBuscaAjuda": // sair da sala de espera

 	$database = new Database();
	$db = $database->getConnection();

	$query = $db->prepare("DELETE FROM sala_busca_ajuda WHERE id_usuario_busca_ajuda = ". $_SESSION['usuario']);

	$run = $query->execute();

 	if($run){
 			echo 1;
 			exit;
 		}

 	break;

 	case "sairAjudante": // sair da sala de espera

 	$database = new Database();
	$db = $database->getConnection();

	$query = $db->prepare("DELETE FROM sala_ajudante WHERE id_usuario_ajudante = ". $_SESSION['usuario']);

	$run = $query->execute();

 	if($run){
 			echo 1;
 			exit;
 		}

 	break;

 }



?>