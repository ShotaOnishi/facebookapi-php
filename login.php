<?php
session_start();
require_once __DIR__ . '/lib/Facebook/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '',
	'app_secret' => '',
	'default_graph_version' => 'v2.6'
	]);

$helper = $fb->getRedirectLoginHelper();
$permissions = ['email', 'user_birthday', 'user_photos', 'user_likes', 'user_posts', 'publish_actions'];
$loginUrl = $helper->getLoginUrl('http://localhost:8888/webapi_seminar/login-callback.php', $permissions);

echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';

?>
