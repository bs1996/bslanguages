<?php
session_start();	
$login=$_GET['l'];
$logmysql = new PDO('mysql:host=localhost;dbname=bslanguages', 'root', '7xd8sG56') or die("błąd");
$droptable1=$logmysql->query("DROP TABLE {$login}Deutsch;");
$droptable2=$logmysql->query("DROP TABLE {$login}English;");
$droptable3=$logmysql->query("DROP TABLE {$login}Espanol;");
$deleteuser=$logmysql->query("DELETE FROM Users WHERE login='{$login}';");
echo('done');
?>