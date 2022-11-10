<?php
		$code=$_POST['c'];
		$log=$_POST['l'];
		$pass=$_POST['p'];
		session_start();
		$hashpass=sha1($pass);
		if($log!='' AND $pass !=''){
$loginmysql1 = new PDO('mysql:host=localhost;dbname=bslanguages', 'example', 'example') or die("błąd");

   
	  $loginquery1 = $loginmysql1->query("SELECT password,code FROM bslanguages.Users WHERE login='{$log}';");
	  $getvalues1=$loginquery1->fetch(PDO::FETCH_ASSOC);
	  $password1 = $getvalues1['password'];
	  $code2=$getvalues1['code'];

if($password1==$hashpass ){

	 if($code==$code2){
		 $loginquery2 = $loginmysql1->query("UPDATE bslanguages.Users SET active ='yes' WHERE login = '{$log}';");
		 $loginquery3 = $loginmysql1->query("CREATE TABLE bslanguages.{$log}Deutsch (id int AUTO_INCREMENT PRIMARY KEY, word VARCHAR(20),
       translation VARCHAR(20));");
		 $loginquery4 = $loginmysql1->query("CREATE TABLE bslanguages.{$log}English (id int AUTO_INCREMENT PRIMARY KEY, word VARCHAR(20),
       translation VARCHAR(20));");
	   $loginquery5 = $loginmysql1->query("CREATE TABLE bslanguages.{$log}Espanol (id int AUTO_INCREMENT PRIMARY KEY, word VARCHAR(20),
       translation VARCHAR(20));");
			 
		echo("done");
		}
	
}
else{
	echo("WRONG PASSWORD");
}
 $loginmysql1 = null;	  
$loginquery1= null ;
      
    }
		
		
		?>