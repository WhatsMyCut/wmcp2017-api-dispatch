<?php

require './dispatch.php';
require './wmcp_api.php';

# create a stack of actions
$routes = [
  action('GET', '/users.json', function ($db, $config) {
    $list = loadAllBooks($db);
    $json = json_encode($list);
    return response($json, 200, ['content-type' => 'application/json']);
  }),
  action('GET', '/users/:id', function ($args, $db) {
    $user = loadUserById($db, $args['id']);
    $html = phtml(__DIR__.'/views/user', ['user' => $user]);
    return response($html);
  }),
  action('GET', '/about', page(__DIR__.'/views/about'))
];

# sample dependencies
$config = require __DIR__.'/config.php';
$settings = $config['settings'];
$db = createDBConnection($settings['db']);

# we need the method and requested path
$verb = $_SERVER['REQUEST_METHOD'];
$path = $_SERVER['REQUEST_URI'];

# serve app against verb + path, pass dependencies
$responder = serve($routes, $verb, $path, $db, $config);

# invoke responder to flush response
$responder();

