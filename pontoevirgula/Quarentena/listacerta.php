<?php
include_once 'config.php';
include_once 'class_busca_ajuda.php';
echo "<script
  src='js/jquery.js'></script>
";

$database = new Database();
$db = $database->getConnection();

$busca_ajuda = new Sala_busca_ajuda($db);



session_start();

if($_SESSION['usuario'] === null){
 		header("location: login.php");
 	}

$stmt = $busca_ajuda->listar(); // o resultado é salvo na stmt

/*  para colocar dentro do script qlqr coisa

 LoadLista();

    setInterval(function(){
            LoadLista();
        }, 1000); 

            function LoadLista(){ $('#lista').load('listacerta.php #lista'); }




2:



<script type='text/javascript' src='js/jquery.js'> var intervalo = setInterval(function() { $('#lista').load('listacerta.php'); }, 1000); </script>

3:

  $(document).ready(function(){
        atualiza();
    });

    function atualiza(){
       $.get('listacerta.php', function(resultado){
        $('#lista').html(resultado);
       })
       setTimeout('atualiza()', 3000);
    } 

*/

$num = $stmt->rowCount();

if($num>0){
 
  

    echo " <script type='text/javascript'>

    LoadLista();

    setInterval(function(){
            LoadLista();
        }, 1000); 

            function LoadLista(){ $('#lista').load('listacerta.php'); }
            
   </script>"; 

    echo "<div id='lista' ";
    echo "<table  class='table table-hover table-responsive table-bordered'>";
        echo "<tr>";
            echo "<th>Senha: </th>";
            echo "<th>Nick: </th>";
        echo "</tr>";
 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
 
            extract($row);
 
            echo "<tr>";
                echo "<td>{$senha_busca_ajuda}</td>";
                echo "<td>{$nick_busca_ajuda}</td>";              
                echo "</td>";
 
            echo "</tr>";
 
        }
 
    echo "</table>";
	echo "</div>";

/*	// the page where this paging is used
	$page_url = "lista.php?";
	 
	// count all products in the database to calculate total pages
	$total_rows = $ajudante->countAll();
	 
	// paging buttons here
	include_once 'paging.php'; */
 
}
 
// tell the user there are no products
else{
    echo "<div class='alert alert-info'>Ninguem precisa de ajuda</div>";
}

?>