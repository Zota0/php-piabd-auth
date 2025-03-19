<?php
    if(!isset($_SESSION)) {
        session_start();
    }
    require_once('db.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $login = $_POST['login'];
        $passwd = $_POST['passwd'];

        var_dump($login, $passwd);
        
        // Szyfrowanie hasła
        $passwd .= "\$erre23%$"; 
        $passwd = sha1($passwd);
        $passwd .= "\$erre23%$";
        var_dump($passwd);

        $query = "SELECT * FROM users WHERE login = '$login' AND passwd = '$passwd'";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($result) == 1) {
            $_SESSION['login'] = $login;
            echo "login successful";
            header('Location: dashboard.php');
            exit(301);

        } else {

            header('Location: login.php');
            exit();
        }
        

        

    } else {
        header('Location: index.php');
    }

?>