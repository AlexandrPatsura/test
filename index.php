<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>Аутентификация</title>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php
	require_once "Auth.php";
	echo '<a href="https://www.facebook.com/dialog/oauth?' . urldecode( http_build_query( $params ) ) . '"><img src=' . "image/button-login-with-facebook.png" . ' alt=' . "button-login-with-facebook" . '></a>';
?>
</body>
</html>