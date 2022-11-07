<!DOCTYPE html>
<html>
    <head>
        <title>Bartosz Stefaniak </title>
		
		
		<meta charset="UTF-8">
		</head>
 <style>
body{
   background-size:cover;
  background-image: url('tlo2.jpg');
  background-repeat: no-repeat;
}
h1{
   color: yellow ;
}
		
   div {
         line-height:60px;
         
         
        }
  #tekst1 {
position:absolute;
         top:1000;
         left:500;
          }
#tekst2{

}
#formularz1 {
position:absolute;
         top:450px;
         left:400px;
}
#empty {
position:absolute;
         top:450px;
         left:400px;
}
#formularz2 {
position:absolute;
         top:450px;
         left:200px;
} 
#formularz3 {
position:absolute;
         top:400px;
         left:800px;
}
#formularz4 {
position:absolute;
         top:450px;
         left:800px;
}
#formularz5 {
position:absolute;
         top:100px;
         left:100px;
		 font-size: 22px;
	
}
#formularz6 {
position:absolute;
         top:150px;
         left:100px;
		 font-size: 22px;
	
}
#button1 {
position:absolute;
         top:490px;
         left:250px;
}   
#button2 {
position:absolute;
         top:490px;
         left:450px;
} 
#button3 {
position:absolute;
         top:490px;
         left:850px;
} 
#button4 {
position:absolute;
         top:200px;
         left:150px;
} 
#checkbox {
position:absolute;
         top:350px;
         left:900px;
}   
#obrazek {
position:absolute;
         top:100px;
         left:300px;
}  
  #info {
position:absolute;
         top:10px;
         left:300px; 
  }
#createaccountform {
position:absolute;
         top:45%;
         left:45%;
		}  

   </style>
<body> 
<meta charset="UTF-8">
<br></br>
  <div id="info">
<center> <h1>Log in to add new words to database </h1> </center>
</div>

<form method="POST" >

 
<div id="formularz5"> 
<input type="text" name="writelogin" id="log" placeholder=login  value="" >
</div>  
<div id="formularz6">
<input type="password" name="writepassword" id=" pass1" placeholder=password value= "">
</div> 
<div id="button4"><button type="submit" name="loginbutton" value="login">Sign in</button></div>
<a href="rejestracja.php">Create account</a> <a href="index.php">Start</a>  <br> </br>

<?php

if(isset($_POST['loginbutton']))
{ 
session_start();
if( $_SESSION['zalogowany'] == false){
$logininput=trim($_POST['writelogin']);
$comparepassword=trim($_POST['writepassword']);
$hashpass=sha1($comparepassword);
if($logininput!='' AND $comparepassword !=''){
$loginmysql = new PDO('mysql:host=localhost;dbname=bslanguages', 'root', '7xd8sG56') or die("błąd");
    

	  $loginquery = $loginmysql->query("SELECT password,active FROM bslanguages.Users WHERE login='{$logininput}';");
 
// $checkactive=$loginquery->fetch(PDO::FETCH_ASSOC);
  // $activation = $checkactive['active'];
$getpassword=$loginquery->fetch(PDO::FETCH_ASSOC);
$activation = $getpassword['active'];
$password = $getpassword['password'];
if($password==$hashpass  AND $activation =="yes"){

	 $_SESSION['zalogowany'] = true;
            $_SESSION['login'] = $logininput;
	
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
}

?>

</form>

<?php
session_start();

if(  $_SESSION['zalogowany'] == true){
	echo("ZALOGOWANY {$_SESSION['login']} &nbsp <form method='POST'> <input type='submit' name='logout' value='logout'> </form> <script type='text/javascript'> var element5 = document.getElementById('formularz4'); element5.style.display='block';</script>");
	if(isset($_POST['logout']))
	{
		$_SESSION['zalogowany'] = false;
		
		header('Location:English.php'); 
	}
}

?>

<div id="obrazek">     
<img src="English1.jpg" width="250" height="150"> </div>
</div>



<form method="POST" > 
<select name="select1">
		<option value="English">English</option>
		<option value="Deutsch">Deutsch</option>
                <option value="Espanol">Espanol</option>
	</select> 
	<br></br>
<div id="button5"><input type="submit" name="choose" value="choose"></div>  
<?php
if(isset($_POST['choose']))
{ 
$language=$_POST['select1'] ;
 switch($language)
    {
      case "English": 
	  header('Location: English.php'); 
	  break;
      case "Deutsch":  
	    header('Location:Deutsch.php'); 
	  break;
      case "Espanol":  
	  header('Location:Espanol.php'); 
	  break;
      
    }

}
?>
	</form>
</div>
<form method="POST">
<div id="formularz4" >

<?php
$globals['language']=$_POST['languages'];

if(isset($_POST['addword']))
{
	session_start();
$newword=trim($_POST['word2']);
$newtranslation=trim($_POST['translation2']);
	$dbh3 = new PDO('mysql:host=localhost;dbname=bslanguages', 'root', '7xd8sG56') or die("błąd");
// use the connection here
 
    
     if($_SESSION['zalogowany']==true AND $_SESSION['login'] !='Admin'){
	  $sth3 = $dbh3->query("INSERT INTO bslanguages.{$_SESSION['login']}English ( word,translation) VALUES ('{$newword}','{$newtranslation}');");
	 }

else
{
	$sth3 = $dbh3->query("INSERT INTO bslanguages.English ( word,translation) VALUES ('{$newword}','{$newtranslation}');");
}

// and now we're done; close it

$dbh3 = null;	  
$sth3= null ; 

}
?>

<textarea name="word2" placeholder=new_word rows="1">

</textarea>
<textarea name="translation2" placeholder =translation rows="1">

</textarea>

</div>
<div id="button3"><input type="submit" name="addword" value="add word"></div> 
</form>
 



<form method="POST" >
<div id="formularz2">


<textarea id="wordarea"name="word" readonly>

</textarea>
</div>

<div id="button1"><input type="button" name="word" value="next word"></div>  

</form>


<div id="formularz1">

<textarea id="translationarea" name="translation" readonly>

	</textarea>
</div>
<div id="button2"> <input type="button" name="translation" value="translate"></div>


<div id="empty">
<textarea></textarea>
</div>
<?php
session_start();
if(  $_SESSION['zalogowany'] == false){
	echo('<script> var element6 = document.getElementById("button3"); element6.style.display="none"; </script>');
	
}
if(  $_SESSION['zalogowany'] == true){
	echo(' <script> var element5 = document.getElementById("button3").disabled=true; element5.style.display="block";</script>');
	
}
?>
</body>
<script>


var element1 = document.getElementById('empty');
//var element5 = document.getElementByName('log1').value; 



function tlumacz() {
	element1.style.display = "none";
	
	

}

function phpdat()
{
 var element5 = document.getElementById('empty');
 element5.style.display='block';
var req = new XMLHttpRequest(); 
    req.onload = function() {
    //alert(this.responseText); 
	var a= this.responseText;
	const obj = JSON.parse(a);
var w= obj.w;
var t= obj.t;
	document.getElementById('wordarea').value=w;
	document.getElementById('translationarea').value=t;
 };
req.open("get", "EnglishData.php", true); 
req.send();
}
function main(){

document.getElementById("button2").onclick=tlumacz;
document.getElementById("button1").onclick=phpdat;
}
main();
</script
</html>
