<?php

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $login = $_POST['login'];
        $passwd = $_POST['passwd'];

        var_dump($login, $passwd);
        
        // Szyfrowanie hasła
        $passwd .= '$erre23%$';

    } else {
        header('Location: index.html');
    }

?>