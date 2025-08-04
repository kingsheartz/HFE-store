<?php
try{
	$pdo=new PDO("mysql:host=localhost;port=3306;dbname=HFE-Store","root","");
	$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
	$_SESSION['hfe_success']="Connected successfully";
}catch(PDOException $e){
	$_SESSION['hfe_error']="OOPS !!! CONNECTION CAN'T BE ESTABLISHED";
}
?>