<?php
	    $host='localhost';
		$user='root';
		$password='';
		$database='todoapp';
		$port=3306;
	
		$dsn="mysql:host={$host};dbname={$database};charset=utf8";
	
		try{
			$pdo=new PDO($dsn, $user, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
		}
		catch(PDOException $error){
			echo $error->getMessage();
			exit('Database error');
		}

?>
