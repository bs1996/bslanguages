<?php
session_start();	

$word=$_GET['w'];
$language=$_GET['la'];
$login=$_GET['l'];
$logmysql = new PDO('mysql:host=localhost;dbname=bslanguages', 'root', '7xd8sG56') or die("błąd");
$delete_word=$logmysql->query("DELETE FROM {$login}{$language} WHERE word='{$word}';");
echo("done");
?>