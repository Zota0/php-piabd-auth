<?php

$db = mysqli_connect('localhost', 'root', '', 'php-piabd');
if(mysqli_connect_errno($db)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
    header('Location: db_error.html');
}

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
