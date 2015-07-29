<?php
try{
$pdo = new PDO('mysql:host=localhost; dbname=coverage','root', '');
} catch(PDOexception $e) {
	exit('Database error.');
}
?>