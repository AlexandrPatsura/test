<?php
	require_once("configdb.php");
 
	// создаем базу данных
	// $sql = "CREATE DATABASE IF NOT EXISTS $dbname CHARACTER SET utf8 COLLATE utf8_general_ci;";
	// mysqli_query( $conn, $sql );

	// if( mysqli_query( $conn, $sql ) ){
	// 		echo "Database created successfully\n";
	// } else {
	// 		echo "Error creating database: " . mysqli_error() . "\n";
	// }

	// подключаемся с своей базе данных
	// mysqli_select_db( $conn, $dbname );

	// создаем стол в базе данных
	// $sql = "CREATE TABLE IF NOT EXISTS $dbname.$tablename (
	// id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	// social_id INT NOT NULL,
	// name VARCHAR(30) NOT NULL,
	// date_add DATETIME NOT NULL
	// ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
	// mysqli_query($conn, $sql);

	// создаем стол2 в базе данных
	// $sql = "CREATE TABLE IF NOT EXISTS $dbname.$tablename2 (
	// id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	// parent_id INT NOT NULL,
	// name VARCHAR(30) NOT NULL,
	// comment TEXT(2000) NOT NULL,
	// date_add DATETIME NOT NULL
	// ) ENGINE = InnoDB CHARACTER SET utf8 COLLATE utf8_general_ci;";
	// mysqli_query( $conn, $sql );

	// if( mysqli_query( $conn, $sql ) ){
	// 	echo "Table $tablename created successfully\n";
	// } else {
	// 	echo "Error creating table: " . mysqli_error( $conn ) . "\n";
	// }
	
	// mysqli_close($conn);
?>