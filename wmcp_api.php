<?php

function createDBConnection($settings) {
    $db_host = $settings['host'];
    $db_sock = $settings['socket'];
    $db_user = $settings['user'];
    $db_pass = $settings['pass'];
    $db_name = $settings['dbname'];
$link = mysql_connect('127.0.0.1', $db_user, $db_pass);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);

/*
    try {
        //create PDO connection
        $dsn = 'mysql:unix_socket=' . $db_sock . ';port=8889;dbname=db282171973';
        $username = $db_user;
        $password = $db_pass;
        $options = array(
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ); 
        $db = new PDO($dsn, $username, $password, $options);
        return $db;
    } catch(PDOException $e) {
        //show error
        die('Could not connect: ' . $e->getCode() . ": " . $e->getMessage());
    }
    */
}