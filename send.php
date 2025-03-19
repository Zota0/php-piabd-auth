<?php

    if(!isset($_SESSION)) {
        session_start();
    }
    require_once('db.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $sender = $_POST['sender'];
        $receiver = $_POST['receiver'];
        $message = sha1($_POST['message']);

        $query = "INSERT INTO messages VALUES (NULL, '$sender', '$receiver', '$message')";
        $result = mysqli_query($db, $query);
        
        if($result) {
            echo "Wiadomość wysłana pomyślnie";
            header('Location: dashboard.php');
            exit(301);

        } else {
            echo "Błąd - nie można wysłać wiadomości.";
        }
        

    } else {
        header('Location: index.php');
    }

?>