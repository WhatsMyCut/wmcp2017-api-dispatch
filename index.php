<?php
try {
require 'dispatch.php';
require 'wmcp_api.php';

# create a stack of actions
$routes = [
  action('GET', '/users.json', function ($db, $config) {
    $list = loadAllUsers($db);
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
# sample dependencies
$config = require __DIR__.'/config.php';
$settings = $config['settings'];
var_dump($settings);

$db = createDBConnection($settings['db']);
var_dump($db);

# we need the method and requested path
$verb = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

# serve app against verb + path, pass dependencies
$responder = serve($routes, $verb, $path, $db, $config);

# invoke responder to flush response
$responder();
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
