<?php

function createDBConnection($settings) {
    $db_host = $settings['host'];
    $db_sock = $settings['socket'];
    $db_user = $settings['user'];
    $db_pass = $settings['pass'];
    $db_name = $settings['dbname'];
    
    var_dump($settings);

$link = mysql_connect($db_sock, $db_user, $db_pass);
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
echo 'Connected successfully';
mysql_close($link);
/*
http://stackoverflow.com/questions/29395452/php-connection-failed-sqlstatehy000-2002-connection-refused
$conn = new PDO("mysql:host=$servername;port=8889;dbname=AppDatabase", $username, $password); 


    try {
        //create PDO connection
        $dsn = 'mysql:unix_socket=' . $db_sock . ';dbname=' . $db_name;
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