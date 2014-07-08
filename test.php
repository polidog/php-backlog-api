<?php
/**
 * Created by PhpStorm.
 * User: polidog
 * Date: 2014/07/09
 * Time: 0:57
 */ 
require './vendor/autoload.php';

$httpClient = new \Backlog\HttpClient\HttpClient([
	'base_url' => 'http://www.polidog.jp'
]);
$data = $httpClient->get('/');
var_dump($data);
