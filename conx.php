<?php

	$servername = "localhost";
	$username = "root";
	$password = "";
	$db="soft";


	try {

   $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
  
   //echo "Connected successfully";
   }
	catch(PDOException $e)
   {
   echo "Connection failed: " . $e->getMessage();
   }



   $conn->exec('SET NAMES UTF8');

?>