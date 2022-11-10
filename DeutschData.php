<?php


session_start();
$login = $_GET['l'];
$dbh4 = new PDO('mysql:host=localhost;dbname=bslanguages', 'example', 'example') or die("błąd");

    if($_SESSION['logged']==true AND $login !='Admin'){
	  $sth4 = $dbh4->query("select MAX(id) AS Max_Id from bslanguages.{$login}Deutsch;");
	}
 else
 {
	 $sth4 = $dbh4->query("select MAX(id) AS Max_Id from bslanguages.Deutsch;");
 }
 $sth4->execute();

$max=$sth4->fetch(PDO::FETCH_ASSOC);
$maxval = $max['Max_Id'];
$min=1;

$id=rand ( $min,$maxval ) ;
$id2=$id ;
 $dbh4 = null;	  
$sth4= null ;

	$dbh = new PDO('mysql:host=localhost;dbname=bslanguages', 'example', 'example') or die("błąd");

   if($_SESSION['logged']==true AND $login !='Admin'){
	  $sth = $dbh->query("SELECT word FROM {$login}Deutsch WHERE id={$id}");
   }
 else{
	  $sth = $dbh->query("SELECT word FROM Deutsch WHERE id={$id}");
 }
$sth->execute();
$word=$sth->fetch(PDO::FETCH_ASSOC);
$resultstring = $word['word'];


$dbh = null;	  
$sth= null ; 
$dbh2 = new PDO('mysql:host=localhost;dbname=bslanguages', 'example', 'example') or die("błąd");
 if($_SESSION['logged']==true AND $login !='Admin'){
	  $sth2 = $dbh2->prepare("SELECT translation FROM {$login}Deutsch WHERE id={$id2}");
 }
else{
	  $sth2 = $dbh2->prepare("SELECT translation FROM Deutsch WHERE id={$id2}");
 }
$sth2->execute();
$translation=$sth2->fetch(PDO::FETCH_ASSOC);
$resultstring2 = $translation['translation'];


$dbh2 = null;
$sth2= null;

$arr=array('w'=>"$resultstring",'t'=>"$resultstring2");
echo (json_encode($arr));

?>
