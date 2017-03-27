<?php

function createDBConnection($settings) {
    $db_host = $settings['host'];
    $db_sock = $settings['socket'];
    $db_user = $settings['user'];
    $db_pass = $settings['pass'];
    $db_name = $settings['dbname'];

    try {

        //create PDO connection
        $dsn = 'mysql:host=localhost;dbname=db282171973';
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
}