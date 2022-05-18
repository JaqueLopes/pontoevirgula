<?php

 	session_start();
 	$conexao = mysqli_connect("localhost", "root", "", "pv");;

 	if($_SESSION['usuario'] === null){
 		header("location: login.php");
 	}

?>

<!DOCTYPE html>
<html Lang="en">
<head>
	<meta charset="UTF 8">
	<title>Lista</title>

	<link rel="stylesheet" type="text/css" href="style.css">

	<script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script>

</head>
<body>



			<div id="lista"></div>


	<script>

		listar();

		setInterval(function(){
			listar();
		}, 1000);
		
		function listar()
		{ // aqui embaixo está só o negocio de rolagem
			$.post('b_a.php?action=listar', function(response){ // ta enviando 'listar'

				var scrollpos = $('#lista').scrollTop();
				var scrollpos = parseInt(scrollpos) + 520;
				var scrollHeight = $('#lista').prop('scrollHeight');				


				$('#lista').html(response);

				if(scrollpos < scrollHeight){

				} else{
					$('#lista').scrollTop( $('#lista').prop('scrollHeight') );
				}

			});
		}

		// isso tudo n recarrega a pag

	</script>

</body>
</html>