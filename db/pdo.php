<?php
try {
	// Server
	$pdo = new PDO("mysql:host=sql306.infinityfree.com;port=3306;dbname=if0_39541210_hfe", "if0_39541210", "HFEstore12345");
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	$_SESSION['hfe_success'] = "Connected successfully";
} catch (PDOException $e) {
	try {
		// Local
		$pdo = new PDO("mysql:host=localhost;port=3306;dbname=hfe", "root", "");
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$_SESSION['hfe_success'] = "Connected successfully";
	} catch (PDOException $e) {
		$_SESSION['hfe_error'] = "OOPS !!! CONNECTION CAN'T BE ESTABLISHED";
	}
}