<?php
		session_start();
		$code_rand= rand(10000,1000000);
		$mailtitle='Account activation' ;
		$newlogin=$_POST['l'];
		$mailactivation=" Welcome {$newlogin} activation code: {$code_rand}" ;
$newpassword=$_POST['p'];
$mail=$_POST['m'];
		
			$uppercase = preg_match('@[A-Z]@', $newpassword);
$lowercase = preg_match('@[a-z]@', $newpassword);
$number    = preg_match('@[0-9]@', $newpassword);
$specialChars = preg_match('@[^\w]@', $newpassword);

if(!$uppercase || !$lowercase || !$number || !$specialChars || strlen($newpassword) < 6) {
    echo('Password should be at least 6 characters in length and should include at least one upper case letter, one number, and one special character.');
}

else{
	$hashpassword=sha1($newpassword) ;
			$logmysql = new PDO('mysql:host=localhost;dbname=bslanguages', 'example', 'example') or die("błąd");
$loginexistquery=$logmysql->query(" SELECT COUNT(login) FROM bslanguages.Users WHERE login = '{$newlogin}' ;");
$existlogin=$loginexistquery->fetch(PDO::FETCH_ASSOC);
$loginexist=$existlogin['COUNT(login)'];
$mailexistquery=$logmysql->query("SELECT COUNT(mail) FROM bslanguages.Users WHERE mail = '{$mail}' ;");
$existmail= $mailexistquery->fetch(PDO::FETCH_ASSOC);
$mailexist=$existmail['COUNT(mail)'];

if ($mailexist!=0 OR $loginexist!=0 ) {
     echo("This mail or login is used !");
}
else {
	  $createquery = $logmysql->query("INSERT INTO bslanguages.Users(login,password,mail,code) VALUES('{$newlogin}','{$hashpassword}','{$mail}',{$code_rand});");
	  
	  mail($mail, $mailtitle, $mailactivation);
	  $_SESSION['loginactive']= $newlogin; 
	  echo('done');
		}
		}
		
        
		?>