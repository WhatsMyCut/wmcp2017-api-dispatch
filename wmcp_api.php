<?php

function createDBConnection($settings) {
    var_dump($settings);
    $db_host = $settings['host'];
    $db_user = $settings['user'];
    $db_pass = $settings['pass'];
    $db_name = $settings['dbname'];
    /*
    $db_host = 'db607588094.db.1and1.com';
    $db_user = 'dbo607588094';
    $db_pass = 'MySQL123!';
    $db_name = 'db607588094';
    */
    
    $link = mysql_connect($db_host, $db_user, $db_pass);
    if (!$link) {
        die('Connection failed: ' . mysql_error());
    }
    $db_selected = mysql_select_db($db_name, $link);
    if (!$db_selected) {
        mysql_close($link);
        die ('Can\'t select database: ' . mysql_error());
    }
    return $link;
}