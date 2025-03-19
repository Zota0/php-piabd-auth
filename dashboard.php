<?php
if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['login'])) {
    echo "Nie masz dostępu do tej strony";
    header('Location: index.php');
    exit(302);
}
\?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Administacyjny</title>
</head>
<body>
    
</body>
</html>