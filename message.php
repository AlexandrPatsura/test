<?php
	session_start();
	error_reporting(0);
	require_once "Auth.php";
	if( $result == true ){
		$_SESSION['user'] = $userInfo['id'];
	}
	require_once "comments.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Комментарии</title>
	<link rel="stylesheet" href="style/style.css">
</head>
<body>
<?php if( $result ){ ?>
<button id="addNewComment">Добавить комментарий</button>
<ul id="commentRoot">
	<li id="newComment">
		<div class="commentContent">
			<div id="cancelComment">X</div>
				<h6>Ваше имя: <input type="text" name="name"> <span></span> </h6>
					<div class="comment">
						Комментарий: 
						<textarea name="newCommentText"></textarea>
					</div>
					<button>Сохранить</button><img class="loader" src="loader.gif">
		</div>
	</li>
	<?php echo $comments; ?>
</ul> 
<?php } else { ?>
<a href="http://localhost/lightit/"><img src="image/button-login-with-facebook.png" alt="button-login-with-facebook"></a>
<p style=text-align:center;>“Для добавления и комментирования сообщений выполните вход”</p>
	<ul id="commentRoot">
		<?php echo $comments; ?>
</ul>
	<?php } ?>
</body>
<script type="text/javascript" src="js/jquery-1.4.4.min.js"></script>
<script type="text/javascript" src="js/comments.js"></script>
</html>