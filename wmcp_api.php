<?php

function createDBConnection($settings) {
    $db_host = $settings['host'];
    $db_user = $settings['user'];
    $db_pass = $settings['pass'];
    $db_name = $settings['dbname'];
    
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