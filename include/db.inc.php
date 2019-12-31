<?php
/******************************************************************************************************/

function dbConnect($dbname=DB_NAME) 
{		

	try {
		
		// $pdo = new PDO("mysql:host=localhost; dbname=kum_12_19; charset=utf8mb4", "root", "");
		$pdo = new PDO(DB_SYSTEM . ":host=" . DB_HOST . "; dbname=$dbname; charset=utf8mb4", DB_USER, DB_PWD);
	
	} catch(PDOException $error) {
		exit;

	}					
	return $pdo;

}
								