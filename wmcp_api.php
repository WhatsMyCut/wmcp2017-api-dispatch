<?php

function createDBConnection($settings) {
    $db_host = $settings['host'];
    $db_sock = $settings['socket'];
    $db_user = $settings['user'];
    $db_pass = $settings['pass'];
    $db_name = $settings['dbname'];
    $link = mysql_connect($db_host, $db_user, $db_pass)
                or die("Could not connect: " . mysql_errno() . ": " . mysql_error() . "\n");
        print "Connected successfully<br>";
        $db_list = mysql_list_dbs($link);

        while ($row = mysql_fetch_object($db_list))
        {
                echo $row->Database . "<br>\n";
        }
        mysql_select_db($db_name) or die("Could not select database: " . mysql_errno() . ": " . mysql_error()  ."<br>\n");
        return $link;
/*

    try {
        //create PDO connection
        $db = new PDO('mysql:host=' . $db_host . ';port=3306;unix_socket=' . $db_sock . ';dbname=' . $db_name, $db_user, $db_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch(PDOException $e) {
        //show error
        die('Could not connect: ' . $e->getCode() . ": " . $e->getMessage());
    }
    */
}