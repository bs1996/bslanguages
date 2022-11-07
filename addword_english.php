<?php
$globals['language']=$_POST['languages'];
session_start();
$newword=$_GET['w'];
$newtranslation=$_GET['t'];

	$dbh3 = new PDO('mysql:host=localhost;dbname=bslanguages', 'root', '7xd8sG56') or die("błąd");
 
    if($_SESSION['logged']==true AND $_SESSION['login'] !='Admin'){
     
	  $sth3 = $dbh3->query("INSERT INTO bslanguages.{$_SESSION['login']}English ( word,translation) VALUES ('{$newword}','{$newtranslation}');");
	
	}
	else
	{
	$sth3 = $dbh3->query("INSERT INTO bslanguages.English ( word,translation) VALUES ('{$newword}','{$newtranslation}');");	
	}


$dbh3 = null;	  
$sth3= null ; 
echo("DONE");
?>