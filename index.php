<?php
try {
require 'dispatch.php';
require 'wmcp_api.php';

# load config
$config = require __DIR__.'/config.php';
$settings = $config['settings']['db'];
$db = createDBConnection($settings);
var_dump($db);


# create a stack of actions
$routes = [
  action('GET', '/', function ($db, $config) {
    $list = "[{ 'status': '200', 'message': 'success'}]";
    $json = json_encode($list);
    return response($json, 200, ['content-type' => 'application/json']);
  }),
  action('GET', '/users/:id', function ($args, $db) {
    $user = loadUserById($db, $args['id']);
    $html = phtml(__DIR__.'/views/user', ['user' => $user]);
    return response($html);
  }),
  action('GET', '/aboutme', page(__DIR__.'/views/about'))
];
var_dump($routes);

/*
# we need the method and requested path
$verb = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

# serve app against verb + path, pass dependencies
$responder = serve($routes, $verb, $path, $db, $config);

# invoke responder to flush response
$responder();
*/
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>