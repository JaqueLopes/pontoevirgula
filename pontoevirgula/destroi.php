<?php
    include('limpa.php');

	//recupera a sessao
	session_start();


	//destroi a sessao
	session_destroy();
 	header ("location: login.php");

?>	