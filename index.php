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
  route('GET', '/', function ($db, $config) {
    $list = "[{ 'status': '200', 'message': 'success'}]";
    $json = json_encode($list);
    return response($json, 200, ['content-type' => 'application/json']);
  });
  route('GET', '/users/:id', function ($args, $db) {
    $user = loadUserById($db, $args['id']);
    $html = phtml(__DIR__.'/views/user', ['user' => $user]);
    return response($html);
  });
  route('GET', '/aboutme', page(__DIR__.'/views/about'));

  dispatch($db, $config);

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}

?>