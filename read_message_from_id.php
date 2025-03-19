<?php
    require_once('db.php');

    if($_SERVER['REQUEST_METHOD'] == 'GET') {
        
        $id = $_GET['id'];

        $query = "SELECT * FROM messages WHERE id = '$id'";
        $result = mysqli_query($db, $query);
        
        if(mysqli_num_rows($result) == 1) {

            $row = mysqli_fetch_row($result);
            /* Message is encrypted, decrypt it 
            $encrypt = openssl_encrypt($message, 'aes-256-cbc', 'erre23%$', OPENSSL_RAW_DATA, $iv);
            $crypted = base64_encode($encrypt);
            */
            $crypted = $row[3];
            $crypted = base64_decode($crypted);
            $decrypt = openssl_decrypt($crypted, 'aes-256-cbc', 'erre23%$', OPENSSL_RAW_DATA, "");


            echo "Nadawca: " . $row[1] . "<br>";
            echo "Odbiorca: " . $row[2] . "<br>";
            echo "Wiadomość: " . $decrypt . "<br>";
            echo "Data: " . $row[4] . "<br>";

        } else {
            echo "Błąd - nie można odczytać wiadomości.";
        }
        

    }

?>