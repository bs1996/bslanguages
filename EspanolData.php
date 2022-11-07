<?php


session_start();

$dbh4 = new PDO('mysql:host=localhost;dbname=bslanguages', 'root', '7xd8sG56') or die("błąd");

    if($_SESSION['logged']==true AND $_SESSION['login'] !='Admin'){
	  $sth4 = $dbh4->query("select MAX(id) AS Max_Id from bslanguages.{$_SESSION['login']}Espanol;");
	}
 else
 {
	 $sth4 = $dbh4->query("select MAX(id) AS Max_Id from bslanguages.Espanol;");
 }
 $sth4->execute();

$max=$sth4->fetch(PDO::FETCH_ASSOC);
$maxval = $max['Max_Id'];
$min=1;

$id=rand ( $min,$maxval ) ;
$id2=$id ;
 $dbh4 = null;	  
$sth4= null ;

	$dbh = new PDO('mysql:host=localhost;dbname=bslanguages', 'root', '7xd8sG56') or die("błąd");

   if($_SESSION['logged']==true AND $_SESSION['login'] !='Admin'){
	  $sth = $dbh->query("SELECT word FROM {$_SESSION['login']}Espanol WHERE id={$id}");
   }
 else{
	  $sth = $dbh->query("SELECT word FROM Espanol WHERE id={$id}");
 }
$sth->execute();
$word=$sth->fetch(PDO::FETCH_ASSOC);
$resultstring = $word['word'];


$dbh = null;	  
$sth= null ; 
$dbh2 = new PDO('mysql:host=localhost;dbname=bslanguages', 'root', '7xd8sG56') or die("błąd");
 if($_SESSION['logged']==true AND $_SESSION['login'] !='Admin'){
	  $sth2 = $dbh2->prepare("SELECT translation FROM {$_SESSION['login']}Espanol WHERE id={$id2}");
 }
else{
	  $sth2 = $dbh2->prepare("SELECT translation FROM Espanol WHERE id={$id2}");
 }
$sth2->execute();
$translation=$sth2->fetch(PDO::FETCH_ASSOC);
$resultstring2 = $translation['translation'];


$dbh2 = null;
$sth2= null;

$arr=array('w'=>"$resultstring",'t'=>"$resultstring2");
echo json_encode($arr);

?>
