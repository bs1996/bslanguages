<!DOCTYPE html>
<html>

    <head>

	<meta http-equiv="content-type" content="text/plain;charset=utf-8" />
		<meta charset="UTF-8" />
        <title>Bartosz Stefaniak </title>
		
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
#form1 {
position:absolute;
         top:450px;
         left:400px;
}
#empty {
position:absolute;
         top:450px;
         left:400px;
}
#form2 {
position:absolute;
         top:450px;
         left:200px;
} 
#form3 {
position:absolute;
         top:400px;
         left:800px;
}
#form4 {
position:absolute;
         top:450px;
         left:800px;
}
#form5 {
position:absolute;
         top:100px;
         left:100px;
		 font-size: 22px;
	
}
#form6 {
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
<center> <h1>Log in to add new words to database  </h1> </center>
</div>

<form method="POST" >

 
<div id="form5"> 
<input type="text" name="writelogin" id="log" placeholder=login  value="" >
</div>  
<div id="form6">
<input type="password" name="writepassword" id=" pass1" placeholder=password value= "">
</div> 
<div id="button4"><button type="submit" name="loginbutton" value="login">Sign in</button></div>

<a href="register.php">Create account</a> <a href="index.php">Start</a>  <br> </br>



</form>




<div id="obrazek">     
<img src="Deutsch.jpg" </div>
</div>



<form method="POST" > 
<select name="select1">
		<option value="English">English</option>
		<option value="Deutsch">Deutsch</option>
                <option value="Espanol">Espanol</option>
	</select> 
	<br></br>
<div id="button5"><input type="submit" name="choose" value="choose"></div>  

	</form>
</div>
<form method="POST">
<div id="form4" >


<textarea name="word2" placeholder=new_word rows="1">

</textarea>
<textarea name="translation2" placeholder =translation rows="1">

</textarea>
</div>

<div id="button3"><input type="submit" name="addword" value="add word"></div>  

</form> 


<div id="form2">



<textarea id="wordarea" name="word" readonly>

</textarea>
</div>

<div id="button1"><input type="button" name="word"  value="next word" ;></div>  



<form method="POST" >
<div id="form1">

<textarea id="translationarea" name="translation" readonly>

	</textarea>
</div>
<div id="button2"> <input type="button" name="translation" value="translate"></div>
</form>

<div id="empty">
<textarea></textarea>
</div>

</body>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/core.js">
    </script>

<script> 

var element1 = document.getElementById('empty');

function add_word(){




}
function choose_language(){




}

function login(){
{
var req = new XMLHttpRequest(); 
    req.onload = function() {
    //alert(this.responseText); 
	var a= this.responseText;
	const obj = JSON.parse(a);
var u= obj.u;
var v= obj.v;
	document.getElementById('form5').value=u;
	document.getElementById('form6').value=v;
 };
req.open("get", "login.php?q="+ l + "&r=" + p, true); 
req.send();
}




}
function translate() {
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
req.open("get", "DeutschData.php", true); 
req.send();
}



function main(){

document.getElementById("button2").onclick=translate;
document.getElementById("button1").onclick=phpdat;
document.getElementById("button4").onclick=login;
document.getElementById("button5").onclick=choose_language;
document.getElementById("button3").onclick=add_word;

}
main();
</script>
</html>
