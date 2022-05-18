<?php
	include 'config.php';
	
	$query = "SELECT
					senha_busca_ajuda, nick_busca_ajuda
				FROM
					sala_busca_ajuda
				ORDER BY
					senha_busca_ajuda ASC ";
	$run = $con->query($query);

		while($row = $run->fetch_array()) : 
	?>
		<div id="lista"> <!-- chat_data -->
		<span style="color:green;"> <?php echo $row['senha_busca_ajuda']; ?> </span> <!-- chamando o nome do usuario do banco de dados --> :
		<span style="color:brown;"><?php echo $row['nick_busca']; ?></span>
		
		</div>

	<?php endwhile;	?>