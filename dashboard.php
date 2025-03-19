<?php
if(!isset($_SESSION)) {
    session_start();
}

if(!isset($_SESSION['login'])) {
    echo "Nie masz dostępu do tej strony";
    header('Location: index.php');
    exit(302);
}
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel</title>
</head>
<body>
    <a href="logout.php">Wyloguj</a>

    <form action="send.php" method="post">
        <div>
            <label for="sender">Nadawca</label>
            <input type="text" name="sender" id="sender" value="<?php echo $_SESSION['login']; ?>">
        </div>

        <div>
            <label for="receiver">Odbiorca</label>
            <input type="text" name="receiver" id="receiver">
        </div>

        <div>
            <label for="message">Wiadomość</label>
            <textarea name="message" id="message"></textarea>
        </div>

        <div>
            <button type="submit">Wyślij</button>
        </div>
    </form>

    <form action="read_message_from_id.php">
        <div>
            <label for="id">ID wiadomości</label>
            <input type="text" name="id" id="id">
        </div>
        <div>
            <button type="submit">Odczytaj</button>
        </div>
    </form>
</body>
</html>