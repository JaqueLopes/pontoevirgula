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
	$query = $db->prepare("UPDATE usuarios SET id_conv = '0' WHERE id_user = ".$_SESSION['usuario']); 
 	$run = $query->execute();

 	// tira o on da conversa
 	$queryDois = $db->prepare("UPDATE conversa SET online = '0' WHERE id_conv = ".$id_conv); 
 	$runDois = $queryDois->execute();
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