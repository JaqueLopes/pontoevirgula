<?php
include('config.php');

switch($_REQUEST['action']){
	case "listar": 

		$db = mysqli_connect("localhost", "root", "", "pv");

 		$query = $db->prepare("SELECT
					senha_busca_ajuda, nick_busca_ajuda
				FROM
					sala_busca_ajuda
				ORDER BY
					senha_busca_ajuda ASC "); // ver isso
 		$run = $query->execute();

 		$rs = $query->fetchAll(PDO::FETCH_OBJ); // p mostrar todas as msgs

 		$listando = '';
 		foreach( $rs as $senha_busca_ajuda ){ // o fetchAll mostra mais de um valor, e ele só funciona por causa desse foreach
 		
 			$listando .= '<div class="single-message"><strong>'.$senha_busca_ajuda->sala_busca_ajuda.': </strong> '.$nick_busca_ajuda->sala_busca_ajuda.'</div>';
 		} // m-d-Y h:i a


 		echo $listando;

 	break;
}

?>