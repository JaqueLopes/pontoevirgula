<?php
    include('config.php');

	//recupera a sessao
	session_start();

	$database = new Database();
	$db = $database->getConnection(); 

	// tirar da conversa

	// pega id_conv
	$queryIdConv = $db->prepare("SELECT id_conv FROM usuarios WHERE id_user = ".$_SESSION['usuario']); 
 	$runIdConv = $queryIdConv->execute();
 	$linhaIdConv = $queryIdConv->fetch(PDO::FETCH_ASSOC);
 	$id_conv = $linhaIdConv['id_conv'];

	if ($id_conv != '0'){
	// limpa do usuario
	$query = $db->prepare("UPDATE usuarios SET nick_atual = null, id_conv = '0' WHERE id_user = ".$_SESSION['usuario']); 
 	$run = $query->execute();

 	// tira o on da conversa
 	$queryDois = $db->prepare("UPDATE conversa SET online = '0' WHERE id_conv = ".$id_conv); 
 	$runDois = $queryDois->execute();
	}

	// tirar da sala de espera

	// confere se existe esse dado
	$queryConfere = $db->prepare("SELECT COUNT(*) FROM sala_busca_ajuda WHERE id_usuario_busca_ajuda =".$_SESSION['usuario']);   
	$runConfere = $queryConfere->execute();
	$linhaConfere = $queryConfere->fetch(PDO::FETCH_ASSOC);

	foreach( $linhaConfere as $confere){
		
		if($confere >= "1"){ //  quantidade de registros que retornou
			$deleteB = "DELETE FROM sala_busca_ajuda WHERE id_usuario_busca_ajuda = :id_usuario_busca_ajuda";
			$resultadoDelB = $db->prepare($deleteB);
			$resultadoDelB->bindValue(':id_usuario_busca_ajuda', $_SESSION['usuario'], PDO::PARAM_STR);
			$resultadoDelB-> execute();
		}	
	}


	// deleta



	// confere


	$queryConfere2 = $db->prepare("SELECT COUNT(*) FROM sala_ajudante WHERE id_usuario_ajudante =".$_SESSION['usuario']);   
	$runConfere2 = $queryConfere2->execute();	
	$linhaConfere2 = $queryConfere2->fetch(PDO::FETCH_ASSOC);


	// deleta

	foreach( $linhaConfere2 as $confere2){

		if($confere2 >= "1"){

		$delete = "DELETE FROM sala_ajudante WHERE id_usuario_ajudante = :id_usuario_ajudante";
		$resultadoDel = $db->prepare($delete);
		$resultadoDel->bindValue(':id_usuario_ajudante', $_SESSION['usuario'], PDO::PARAM_STR);
		$resultadoDel-> execute();

		}
	}

	// mudar o selecionado

	// confere se o selecionado é 0 
	$querySelec = $db->prepare("SELECT selecionado FROM usuarios WHERE id_user = ".$_SESSION['usuario']); 
 	$runSelec = $querySelec->execute();
 	$linhaSelec = $querySelec->fetch(PDO::FETCH_ASSOC);
 	$selec = $linhaSelec['selecionado'];

 	// muda o selecionado para 0
 	if($selec == '1'){
 	$queryZero =  $db->prepare("UPDATE usuarios SET selecionado = '0' WHERE id_user = ".$_SESSION['usuario']); 
 	$runZero = $queryZero->execute();	
 	}

 	// ve se tem alguma conv com ele que ta on e muda para 0 

 	// confere se tem conversa on
 	$queryConvId1 = $db->prepare("SELECT COUNT(*) FROM conversa WHERE id1 =".$_SESSION['usuario']." AND online = '1'");
	$runConvId1 = $queryConvId1->execute();
	$linhaConvId1 = $queryConvId1->fetch(PDO::FETCH_ASSOC);

	foreach( $linhaConvId1 as $ConvId1){
		
		if($ConvId1 >= "1"){ //  quantidade de registros que retornou
		$queryConvId1 =  $db->prepare("UPDATE conversa SET online = '0' WHERE id1 = ".$_SESSION['usuario']); 
 		$runConvId1 = $queryConvId1->execute();	
		}	
	}


	// confere se tem conversa on
 	$queryConvId2 = $db->prepare("SELECT COUNT(*) FROM conversa WHERE id2 =".$_SESSION['usuario']." AND online = '1'");
	$runConvId2 = $queryConvId2->execute();
	$linhaConvId2 = $queryConvId2->fetch(PDO::FETCH_ASSOC);

	foreach( $linhaConvId2 as $ConvId2){

		if($ConvId2 >= "1"){ //  quantidade de registros que retornou
		$queryConvId2 =  $db->prepare("UPDATE conversa SET online = '0' WHERE id2 = ".$_SESSION['usuario']); 
 		$runConvId2 = $queryConvId2->execute();	
		}
	}

?>	