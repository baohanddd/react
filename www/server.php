<?php
require 'vendor/autoload.php';

$i = 0;

$app = function ($request, $response) use (&$i) {
    

    $text = "This is request number $i.\n";
    $headers = array('Content-Type' => 'text/plain');

	$i++;

    $response->writeHead(200, $headers);
    $response->end($text);
};

$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server($loop);
$http = new React\Http\Server($socket);

$http->on('request', $app);

$socket->listen(4000, '0.0.0.0');
$loop->run();