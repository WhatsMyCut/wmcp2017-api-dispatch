<?php

function createDBConnection($settings) {
    /*
    $db_host = $settings['host'];
    $db_sock = $settings['socket'];
    $db_user = $settings['user'];
    $db_pass = $settings['pass'];
    $db_name = $settings['dbname'];
*/
    $db_host = 'db607588094.db.1and1.com';
    $db_user = 'dbo607588094';
    $db_pass = 'MySQL123!';
    $db_name = 'db607588094';

    
    var_dump($settings);

    $link = mysql_connect($db_host, $db_user, $db_pass);
    if (!$link) {
    die('Connection failed: ' . mysql_error());
    }
    else{
        echo "Connection to MySQL server " .$db_host . " successful!
    " . PHP_EOL;
    }

    $db_selected = mysql_select_db($db_name, $link);
    if (!$db_selected) {
        die ('Can\'t select database: ' . mysql_error());
    }
    else {
        echo 'Database ' . $db_name . ' successfully selected!';
    }

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

