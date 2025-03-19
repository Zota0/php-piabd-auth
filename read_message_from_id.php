<?php

    if(!isset($_SESSION)) {
        session_start();
    }
    require_once('db.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $id = $_POST['id'];

        $query = "SELECT * FROM messages WHERE id = '$id'";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_row($result);
            echo "Nadawca: " . $row[1] . "<br>";
            echo "Odbiorca: " . $row[2] . "<br>";
            echo "Wiadomość: " . $row[3] . "<br>";
            echo "Data: " . $row[4] . "<br>";
            header('Location: dashboard.php');
            exit(301);

        } else {
            echo "Błąd - nie można odczytać wiadomości.";
        }
        

    } else {
        header('Location: index.php');
    }

?>