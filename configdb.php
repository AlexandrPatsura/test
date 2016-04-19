<?php
	$servername	= "localhost";
	$username		= "root";
	$password		= "";
	$dbname			= "";
	$tablename	= "";
	$tablename2	= "";

	// Подключение к базе данных
	$conn = mysqli_connect( $servername, $username, $password );
	if ( ! $conn ) {
		die( "Connection failure: " . mysqli_error() );
	}

	// Устанавливаем кодировку
	mysqli_query( $conn, 'SET CHARACTER SET utf8' );
	mysqli_query( $conn, 'SET NAMES utf8' );
	
	// Установка русской локали соединения
	mysqli_query( $conn, "SET lc_time_names = 'ru_RU'" );
?>