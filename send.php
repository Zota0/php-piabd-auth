<?php

if (!isset($_SESSION)) {
    session_start();
}
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sender = $_POST['sender'];
    $receiver = $_POST['receiver'];
    $message = $_POST['message'];

    $encrypt = openssl_encrypt($message, 'aes-256-cbc', 'erre23%$', OPENSSL_RAW_DATA, "");
    $crypted = base64_encode($encrypt);

    $query = "INSERT INTO messages (sender, receiver, message) VALUES ('$sender', '$receiver', '$crypted')";
    $result = mysqli_query($db, $query);
    
    if ($result) {
        echo "Wiadomość wysłana pomyślnie";
        header('Location: dashboard.php');
        exit();
    } else {
        echo "Błąd - nie można wysłać wiadomości: " . mysqli_error($db);
    }
    } else {
    header('Location: index.php');
}

?>