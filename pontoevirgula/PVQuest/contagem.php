
<!-- pagina com as funcoes pra contar as respotas -->
<!-- se Palgumacoisa for o valido, fazer i++ pra resposta referente, se o cuidado ta
 "BOM", MEDIO", "RUIM" --> 
<!-- colocar uma resposta personalizada pra cada questao -->
<?php

// var b = 0, r = 0;
 $b = 0;
// $m = 0;   em, duvida ainda sobre isso ou nao
 $r = 0;

 

 
 if ($_POST['p1']=="true") {

	 $b++;
	 

 } else if ($_POST['p1']=="false") {
 $r++; 

 } else if ($_POST['p1'] == null ) {
	 header ("Location: pvquest2.php?erro=1");   
	die (); 
} 

 
   if ($_POST['p2']=="true") {
	 $b++;
 } else if ($_POST['p2']=="false") {
 $r++; 
 } else if ($_POST['p2'] == null ) {
	 header ("Location: pvquest2.php?erro=1");
	die (); 
} 
 
   if ($_POST['p3']=="true") {
	 $b++;
 } else if ($_POST['p3']=="false") {
 $r++;
 } else if ($_POST['p3'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
}  
 
   if ($_POST['p4']=="true") {
	 $b++;
 } else if ($_POST['p4']=="false") {
 $r++; 
 } else if ($_POST['p4'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} 

 if ($_POST['p16']=="true") {
	 $b++;
 } else if ($_POST['p16']=="false")  {
 $r++; 
	} else if ($_POST['p16'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} 
 
   if ($_POST['p5']=="true") {
	 $b++;
 } else if ($_POST['p5']=="false")  {
 $r++; 
 } else if ($_POST['p5'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} 
 

 
   if ($_POST['p7']=="true") {
	 $b++;
 } else  if ($_POST['p7']=="false") {
 $r++; 
 } else if ($_POST['p7'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} 
 
   if ($_POST['p8']=="true") {
	 $b++;
 } else if ($_POST['p8']=="false")  {
 $r++; 
	} else if ($_POST['p8'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} 
 
   if ($_POST['p9']=="true") {
	 $b++;
 } else if ($_POST['p9']=="false")  {
 $r++; 
	} else if ($_POST['p9'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} 
 
   if ($_POST['p10']=="true") {
	 $b++;
 } else if ($_POST['p10']=="false")  {
 $r++; 
	}  else if ($_POST['p10'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} 
 
  if ($_POST['p11']=="true") {
	 $b++;
 } else if ($_POST['p11']=="false")  {
 $r++; 
	} else if ($_POST['p11'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} 
 
   if ($_POST['p12']=="true") {
	 $b++;
 } else if ($_POST['p12']=="false")  {
 $r++;
	} elseif ($_POST['p12'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} 
 
   if ($_POST['p13']=="true") {
	 $b++;
 } else if ($_POST['p13']=="false")  {
 $r++; 
	} else if ($_POST['p13'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} 
 
   if ($_POST['p14']=="true") {
	 $b++;
 } else if ($_POST['p14']=="false")  {
 $r++; 
	} else if ($_POST['p14'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} 
 
   if ($_POST['p15']=="true") {
	 $b++;
 } else if ($_POST['p15']=="false")  {
 $r++; 
	} else if ($_POST['p15'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} 
 
  
 

 
   if ($_POST['p18']=="true") {
	 $b++;
 } else if ($_POST['p18']=="false")  {
 $r++; 
	} /*else if ($_POST['p18'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} */
 
   if ($_POST['p19']=="true") {
	 $b++;
 } else if ($_POST['p19']=="false")  {
 $r++; 
	} /*else if ($_POST['p19'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
}*/ 

   /*if ($_POST['p20']=="true") {
	 $b++;
 } else if ($_POST['p20']=="false")  {
 $r++; 
	} else if ($_POST['p20'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} */
 
  
 
   if ($_POST['p21']=="true") {
	 $b++;
 } else if ($_POST['p21']=="false")  {
 $r++; 
	}/* else if ($_POST['p21'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} */
   if ($_POST['p22']=="true") {
	 $b++;
 } else if ($_POST['p22']=="false")  {
 $r++; 
	} /*else if ($_POST['p22'] == null ) {
	header ("Location: pvquest2.php?erro=1");
	die (); 
} */
 
 

 
 
	/*var_dump($b); // para ver o q tem na variavel
	var_dump($r); */?>