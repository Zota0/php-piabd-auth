<?php
    require_once('db.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $login = $_POST['login'];
        $passwd = $_POST['passwd-register'];

        var_dump($login, $passwd);
        
        // Szyfrowanie hasła
        $passwd .= "\$erre23%$"; 
        $passwd = sha1($passwd);
        $passwd .= "\$erre23%$";
        var_dump($passwd);

        $query = "INSERT INTO users VALUES (?, ?)";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $login, $passwd);
        
        if($stmt->execute()) {
            echo "Zarejestrowano pomyślnie";
        } else {
            echo "Błąd - nie można zarejestrować użytkownika.";
        }

        
        
        

    } else {
        header('Location: index.html');
    }

?>