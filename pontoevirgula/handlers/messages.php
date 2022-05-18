<?php
include('../config.php');
date_default_timezone_set('America/Sao_Paulo');

session_start();

	// pegando o id da conv
	$database = new Database();
	$db = $database->getConnection(); 
	$query = $db->prepare("SELECT id_conv FROM usuarios WHERE id_user = ".$_SESSION['usuario']); 
 	$run = $query->execute();
 	$linha = $query->fetch(PDO::FETCH_ASSOC); // ta recebendo a linha toda
 	$id_conv = $linha['id_conv']; // seleciona a linha que quer e salvando o conteudo em $id_conv




switch($_REQUEST['action']){

 	case "sendMessage": // para salvar a msg

 		$database = new Database();
		$db = $database->getConnection();
 		$query = $db->prepare("INSERT INTO mensagens SET nick_remetente=?, texto=?, id_conv=?, id_remetente=?"); 
 		$run = $query->execute([$_SESSION['nick_atual'], $_REQUEST['texto'], $id_conv, $_SESSION['usuario']]);

 		if($run){ // se $run funcionar retorna 1 
 			echo 1;
 			exit;
 		}

 	break;

 	case "getMessages": // para pegar as mensagens

 		$database = new Database();
		$db = $database->getConnection();
 		$query = $db->prepare("SELECT * FROM mensagens WHERE id_conv = ".$id_conv); // vendo em todas as mensagens salvas quais tem o id dessa conversa
 		$run = $query->execute();

 		$rs = $query->fetchAll(PDO::FETCH_OBJ); 

 		$chat = '';
 		foreach( $rs as $mensagens ){ 
 			$mensagens->texto = str_replace("\n","<br>", $mensagens->texto);

			// essa é a mensagem, como ela vai aparecer para o usuario {CSS} 		
 			$chat .= '<div class="single-message"><strong>'.$mensagens->nick_remetente.': </strong> '.$mensagens->texto.'<br>'.date('h:i a', strtotime($mensagens->dt_hr)).'<span></span> </div>'; 
 		} 

 	// para conferir se o outro usuario ainda está na conversa	
 	$queryDois = $db->prepare("SELECT online FROM conversa WHERE id_conv = ".$id_conv); 
 	$runDois = $queryDois->execute();
 	$linha = $queryDois->fetch(PDO::FETCH_ASSOC); 
 	$online = $linha['online'];

 	if($online == 0){
 		// aviso de que o outro usuario saiu {CSS}
 		$chat .= '<div class="single-message"> <font face="verdana" color="red"> <em> O outro usuário saiu da conversa, sinta-se a vontade para sair também :) </em> </font> <span>'.date('h:i a').'</span></div>';

 	}
     
 	echo $chat; // o que retorna para a tela de chat está aqui em $chat

 	break;

 	case "denuncia": // para fazer um denuncia

 	$database = new Database();
	$db = $database->getConnection();

	$res_qtd = 0;

 	// CONFERINDO QUAL É O ID DESSE USER

	// pegando id1 	 	
 	$queryIdUm = $db->prepare("SELECT id1 FROM conversa WHERE id_conv = ".$id_conv); // ver isso
 	$runIdUm = $queryIdUm->execute();
 	$linhaIdUm = $queryIdUm->fetch(PDO::FETCH_ASSOC); // ta recebendo a linha toda
 	$id1 = $linhaIdUm['id1'];

 	// conferindo se é igual ao id1
 	if ($id1 != $_SESSION['usuario']){


 		// confere
 		$queryDenun = $db->prepare("SELECT COUNT(*) FROM denuncias WHERE id_conv =".$id_conv." AND id_denunciado =".$id1);
		$runDenun = $queryDenun->execute();
		$linhaDenun = $queryDenun->fetch(PDO::FETCH_ASSOC);

		foreach( $linhaDenun as $denun){
		
			if($denun === "1"){ //  quantidade de registros que retornou
				echo 2;
 				exit;
			}	

		}

 		// colocando a denuncia
 		$queryDenun = $db->prepare("INSERT INTO denuncias SET id_conv=?, id_denunciado=?, descricao=?"); 
 		$runDenun = $queryDenun->execute([$id_conv, $id1, $_REQUEST['denunciaTex']]);


 		// pegando a qntd de denuncias
		$query1 = $db->prepare("SELECT qtd_denuncias FROM usuarios WHERE id_user = ".$id1); 
 		$run1 = $query1->execute();
 		$linha1 = $query1->fetch(PDO::FETCH_ASSOC);
 		$qtd1 = $linha1['qtd_denuncias'];

 		// acrescentando 1 a variavel
 		$res_qtd = $qtd1 + 1;

 		$queryDois = $db->prepare("UPDATE usuarios SET qtd_denuncias = '".$res_qtd."' WHERE id_user = ".$id1); 
 		$runDois = $queryDois->execute();

 		if($runDois){ // retorna 1 para mostrar que a denuncia foi feita
 			echo 1;
 			exit;
 		}

 	} else {

 		// pegando o id2
 		$queryIdDois = $db->prepare("SELECT id2 FROM conversa WHERE id_conv = ".$id_conv); // ver isso
 		$runIdDois = $queryIdDois->execute();
 		$linhaIdDois = $queryIdDois->fetch(PDO::FETCH_ASSOC); // ta recebendo a linha toda
 		$id2 = $linhaIdDois['id2'];

 		// confere
 		$queryDenun = $db->prepare("SELECT COUNT(*) FROM denuncias WHERE id_conv =".$id_conv." AND id_denunciado =".$id2);
		$runDenun = $queryDenun->execute();
		$linhaDenun = $queryDenun->fetch(PDO::FETCH_ASSOC);

		foreach( $linhaDenun as $denun){
		
			if($denun === "1"){ //  quantidade de registros que retornou
				echo 2;
 				exit;
			}	

		}


 		// colocando a denuncia
 		$queryDenun = $db->prepare("INSERT INTO denuncias SET id_conv=?, id_denunciado=?, descricao=?"); 
 		$runDenun = $queryDenun->execute([$id_conv, $id2, $_REQUEST['denunciaTex']]);

 		// pegando a qntd de denuncias
		$query2 = $db->prepare("SELECT qtd_denuncias FROM usuarios WHERE id_user = ".$id2); 
 		$run2 = $query2->execute();
 		$linha2 = $query2->fetch(PDO::FETCH_ASSOC);
 		$qtd2 = $linha2['qtd_denuncias'];

 		// acrescentando 1 a variavel
 		$res_qtd = $qtd2 + 1;

 		$queryTres = $db->prepare("UPDATE usuarios SET qtd_denuncias = '".$res_qtd."' WHERE id_user = ".$id2); 
 		$runTres = $queryTres->execute();

 		if($runTres){
 			echo 1;
 			exit;
 		}

 	}




 	break;



}


?>