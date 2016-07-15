<?php
session_start();
require_once __DIR__ . '/lib/Facebook/autoload.php';

$fb = new Facebook\Facebook([
	'app_id' => '',
	'app_secret' => '',
	'default_graph_version' => 'v2.6'
	]);

$fb->setDefaultAccessToken($_SESSION['facebook_access_token']);

try{
  $response = $fb->get('/me/likes?fields=link,name');
  $likes = $response->getGraphEdge();
}catch(Facebook\Exceptions\FacebookResponseException $e){
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
}catch(Facebook\Exceptions\FacebookSDKException $e){
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

print_r($userNode);
foreach ($likes as $likeNode) {
  echo '<a href="'.$likeNode->getField('link').'">'.$likeNode->getField('name').'</a>"';
}

?>
