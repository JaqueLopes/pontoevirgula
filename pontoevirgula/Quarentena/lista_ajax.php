<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Lista</title>
	<link rel="stylesheet" href="style.css" media="all" />
	<script>
		function ajax(){

		var req = new XMLHttpRequest();

		req.onreadystatechange = function(){

			if(req.readyState == 4 && req.status == 200){

				document.getElementById('listando').innerHTML = req.responseText;

				}
			}

			req.open('GET', 'listando.php', true);
			req.send();

		}

		setInterval(function(){ajax();},1000); // Isso serve para fazer a msg chegar na outra tela ao msm tempo. 1 sec = 1000 milisecs

	</script>
	</head>

<body onload="ajax();"> <!-- para carregar a funçao ajax() -->
	

<div id="lista"></div>

<?php


$run = $con->query($query);

		if($run){
			echo "<embed loop='false' src='chat.wav' hidden='true' autoplay='true' />";
		}
?>


</body>
</html>