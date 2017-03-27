<?php

function createDBConnection($settings) {
    $db_host = $settings['host'];
    $db_user = $settings['user'];
    $db_pass = $settings['pass'];
    $db_name = $settings['dbname'];

    try {
        //create PDO connection
        $db = new PDO('mysql:host=' . $db_host . ';dbname=' . $db_name, $db_user, $db_pass);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
    } catch(PDOException $e) {
        //show error
        die('Could not connect: ' . $e->getCode() . ": " . $e->getMessage());
    }
}