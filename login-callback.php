<?php
session_start();
require_once __DIR__ . '/lib/Facebook/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '',
	'app_secret' => '',
	'default_graph_version' => 'v2.6'
	]);

$helper = $fb->getRedirectLoginHelper();
try{
  $accessToken = $helper->getAccessToken();
}catch(Facebook\Exceptions\FacebookResponseException $e){
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
}catch(Facebook\Exceptions\FacebookSDKException $e){
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if(isset($accessToken)){
  $_SESSION['facebook_access_token'] = (string) $accessToken;
}
echo '<a href="post.php">プロフィール情報取得</a>';

 ?>
