<?php

session_start();
$_SESSION['logged'] = false;
if( $_SESSION['logged'] == false){
$logininput = $_GET['l'];
$comparepassword = $_GET['p'];

$hashpass=sha1($comparepassword);
if($logininput!='' AND $comparepassword !=''){
$loginmysql = new PDO('mysql:host=localhost;dbname=bslanguages', 'root', '7xd8sG56') or die("błąd");
    

	  $loginquery = $loginmysql->query("SELECT password,active FROM bslanguages.Users WHERE login='{$logininput}';");
 
// $checkactive=$loginquery->fetch(PDO::FETCH_ASSOC);
  // $activation = $checkactive['active'];
$getpassword=$loginquery->fetch(PDO::FETCH_ASSOC);
$activation = $getpassword['active'];
$password = $getpassword['password'];
if($password==$hashpass AND $activation =="yes"){

	$_SESSION['logged'] = true;
    $_SESSION['login'] = $logininput;
	setcookie("login_successful","login_successful");
	setcookie("user","{$logininput}");
	echo($_COOKIE["login_successful"]);
	echo($_COOKIE["user"]);
}
else{
	echo("WRONG PASSWORD");
}
 $loginmysql = null;	  
$loginquery= null ;
      
    }
	else{
		print('Zostaly puste pola!');
}
}

?>

