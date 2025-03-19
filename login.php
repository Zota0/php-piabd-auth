<?php
    require_once('db.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        
        $login = $_POST['login'];
        $passwd = $_POST['passwd'];

        var_dump($login, $passwd);
        
        // Szyfrowanie hasła
        $passwd .= "\$erre23%$"; 
        $passwd = sha1($passwd);
        var_dump($passwd);

        $query = "SELECT * FROM users WHERE login = ? AND passwd = ?";
        $stmt = $db->prepare($query);
        $stmt->bind_param('ss', $login, $passwd);
        $stmt->execute();

    
        
        

    } else {
        header('Location: index.html');
    }

?>