<?php

$db = mysqli_connect('localhost', 'root', '');
if(mysqli_connect_errno()) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
    header('Location: db_error.html');
}

mysqli_query($db, "CREATE DATABASE IF NOT EXISTS php_piabd");
mysqli_query($db, "USE php_piabd");
mysqli_query($db, "CREATE TABLE IF NOT EXISTS users (login VARCHAR(255) UNIQUE NOT NULL, passwd VARCHAR(255) NOT NULL)");
mysqli_query($db, "CREATE TABLE IF NOT EXISTS messages (id INT NOT NULL AUTO_INCREMENT, sender VARCHAR(255) NOT NULL, receiver VARCHAR(255) NOT NULL, message TEXT NOT NULL, timestamp TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP, PRIMARY KEY (id))");

function dbQuery($query) {
    global $db;

    $result = mysqli_query($db, $query);
    if(!$result) {
        die('Invalid query: ' . mysqli_error($db));
    }
    return $result;
}

function dbFetchRow($query) {
    $result = dbQuery($query);
    return mysqli_fetch_row($result);
}
