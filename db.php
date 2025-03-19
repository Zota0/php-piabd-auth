<?php

$db = mysqli_connect('localhost', 'root', 'root', 'php-piabd');
if(mysqli_connect_errno($db)) {
    die('Failed to connect to MySQL: ' . mysqli_connect_error());
    header('Location: db_error.html');
}

