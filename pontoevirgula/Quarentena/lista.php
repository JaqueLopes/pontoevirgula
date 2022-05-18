

<?php
include_once 'config.php';
include_once 'class_busca_ajuda.php';
echo "<script
  src='https://code.jquery.com/jquery-3.4.1.js'
  integrity='sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=''
  crossorigin='anonymous'></script>
";

$database = new Database();
$db = $database->getConnection();

$busca_ajuda = new Sala_busca_ajuda($db);



session_start();

if($_SESSION['usuario'] === null){
 		header("location: login.php");
 	}

$stmt = $busca_ajuda->listar(); // o resultado é salvo na stmt



$num = $stmt->rowCount();

if($num>0){
 
    echo "<table class='table table-hover table-responsive table-bordered'>";
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