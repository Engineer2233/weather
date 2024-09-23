<?php
	

	$dsn="mysql:host=localhost;dbname=news;";
	$user="root";
	$pass="";
	try{
	$con=new PDO($dsn,$user,$pass);
	echo "Connected";
	}
	catch(PDOException $e){
		exit($e->getMessage());
	}



?>