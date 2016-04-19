<?php
	require_once "configdb.php";
	
	$client_id			= ''; // Client ID
	$client_secret	= ''; // Client secret
	$redirect_uri		= 'http://localhost/lightit/message.php'; // Redirect URIs

	$params = array(
		'client_id'			=> $client_id,
		'redirect_uri'	=> $redirect_uri,
		'response_type'	=> 'code'
		);

	if ( isset( $_GET['code'] ) ){
		$result = false;

		$params = array(
			'client_id'			=> $client_id,
			'redirect_uri'	=> $redirect_uri,
			'client_secret'	=> $client_secret,
			'code'					=> $_GET['code']
			);

		$tokenInfo = null;
		parse_str( file_get_contents( 'https://graph.facebook.com/oauth/access_token?' . http_build_query( $params ) ), $tokenInfo );

		if ( count( $tokenInfo ) > 0 && isset( $tokenInfo['access_token'] ) ){
			$params = array( 'access_token' => $tokenInfo['access_token'] );

			$userInfo = json_decode( file_get_contents( 'https://graph.facebook.com/me?' . urldecode(http_build_query( $params ) ) ), true );

			if ( isset( $userInfo['id'] ) ){
				$userInfo = $userInfo;
				$result = true;
			}
		}

		if ( $result == true ){
			$social_id = $userInfo['id'];
			$name = $userInfo['name'];

			mysqli_select_db( $conn, $dbname );

			$query = "INSERT INTO $tablename ( id, social_id,name ) VALUES ( 'id', '{$social_id}', '{$name}' )";
			mysqli_query( $conn, $query );
			}
		
	}
?>