<?php

session_start();

include('config.php');

// PARA PEGAR O ID DO BUSCA AJUDA, ta recebendo da url
$id_busca_ajuda = $_GET['id']; 

// PARA PEGAR O NICK DO BUSCA AJUDA, ta recebendo da url
$nick_busca_ajuda = $_GET['nick']; 

// o id ajudante que vem para essa sala, entao salvando o id dele
$id_ajudante = $_SESSION['usuario'];

// PARA PEGAR O NICK DO AJUDANTE
$database = new Database();

$db = $database->getConnection();

$query = $db->prepare("SELECT nick_ajudante FROM sala_ajudante WHERE id_usuario_ajudante=".$_SESSION['usuario']);

$runAjudante = $query->execute();

$linha = $query->fetch(PDO::FETCH_ASSOC); // puxando uma linha do resultado

$nick_ajudante = $linha['nick_ajudante']; 

// PARA SALVAR NA CONVERSA os dados ---> cria conversa
$insert = "INSERT INTO conversa (nick1, nick2, id1, id2, online) VALUES (:nick1, :nick2, :id1, :id2, :online)"; // salva esse comando dentro de $insert
$resultado = $db->prepare($insert); 
$resultado->bindValue(':nick1', $nick_busca_ajuda, PDO::PARAM_STR);
$resultado->bindValue(':nick2', $nick_ajudante, PDO::PARAM_STR);
$resultado->bindValue(':id1', $id_busca_ajuda, PDO::PARAM_STR);
$resultado->bindValue(':id2', $id_ajudante, PDO::PARAM_STR);
$resultado->bindValue(':online', '1', PDO::PARAM_STR);
$resultado-> execute();

//mudar o selecionado para 1 do usuario busca ajuda
$insertSel = "UPDATE usuarios SET selecionado = :selecionado WHERE id_user = :id_busca_ajuda";
$resultadoSel = $db->prepare($insertSel);
$resultadoSel->bindValue(':selecionado', '1', PDO::PARAM_STR);
$resultadoSel->bindValue(':id_busca_ajuda', $id_busca_ajuda, PDO::PARAM_STR);
$resultadoSel-> execute();

// pega o id da conv
$select = $db->prepare("SELECT id_conv FROM conversa WHERE nick1='$nick_busca_ajuda' AND nick2='$nick_ajudante' AND id1='$id_busca_ajuda' AND id2='$id_ajudante' AND online='1'");

$runSel = $select->execute();

$linhaSel = $select->fetch(PDO::FETCH_ASSOC); // puxando uma linha do resultado

$id_conv = $linhaSel['id_conv'];


// insere o id conv na tabela usuario (ajudante)
$insertConv = "UPDATE usuarios SET id_conv = :id_conv WHERE id_user = :id_ajudante";
$resultadoConv = $db->prepare($insertConv);
$resultadoConv->bindValue(':id_conv', $id_conv, PDO::PARAM_STR);
$resultadoConv->bindValue(':id_ajudante', $id_ajudante, PDO::PARAM_STR);
$resultadoConv-> execute();

// insere o id conv na tabela usuario (busca ajuda)
$insertConvDois = "UPDATE usuarios SET id_conv = :id_conv WHERE id_user = :id_busca_ajuda";
$resultadoConvDois = $db->prepare($insertConvDois);
$resultadoConvDois->bindValue(':id_conv', $id_conv, PDO::PARAM_STR);
$resultadoConvDois->bindValue(':id_busca_ajuda', $id_busca_ajuda, PDO::PARAM_STR);
$resultadoConvDois-> execute();

// insere o nick na tabela usuario (ajudante)
$insertNickDois = "UPDATE usuarios SET nick_atual = :nick_atual WHERE id_user = :id_ajudante";
$resultadoNickDois = $db->prepare($insertNickDois);
$resultadoNickDois->bindValue(':nick_atual', $nick_ajudante, PDO::PARAM_STR);
$resultadoNickDois->bindValue(':id_ajudante', $id_ajudante, PDO::PARAM_STR);
$resultadoNickDois-> execute();

// insere o nick na tabela usuario (busca ajuda)
$insertNickUm = "UPDATE usuarios SET nick_atual = :nick_atual WHERE id_user = :id_busca_ajuda";
$resultadoNickUm = $db->prepare($insertNickUm);
$resultadoNickUm->bindValue(':nick_atual', $nick_busca_ajuda, PDO::PARAM_STR);
$resultadoNickUm->bindValue(':id_busca_ajuda', $id_busca_ajuda, PDO::PARAM_STR);
$resultadoNickUm-> execute();

// se ha uma conversa em andamento deleta eles da sala de espera
if ($id_conv != null){
$delete = "DELETE FROM sala_ajudante WHERE id_usuario_ajudante = :id_usuario_ajudante";
$resultadoDel = $db->prepare($delete);
$resultadoDel->bindValue(':id_usuario_ajudante', $id_ajudante, PDO::PARAM_STR);
$resultadoDel-> execute();

$deleteDois = "DELETE FROM sala_busca_ajuda WHERE id_usuario_busca_ajuda = :id_usuario_busca_ajuda";
$resultadoDelDois = $db->prepare($deleteDois);
$resultadoDelDois->bindValue(':id_usuario_busca_ajuda', $id_busca_ajuda, PDO::PARAM_STR);
$resultadoDelDois-> execute();

// envia para o chat
header("location: chat.php");
}


?>