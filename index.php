<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-piabd</title>
</head>
<body>
    <?php 
        if(isset($_SESSION['login'])) {
            echo "Witaj " . $_SESSION['login'];
            header("Location: dashboard.php");
        }
    ?>
    <form action="login.php" method="post">
        <div>
            <label for="login">Login</label>
            <input type="text" name="login" id="login">
        </div>

        <div>
            <label for="passwd">Hasło</label>
            <input type="password" name="passwd" id="passwd">
            <button onclick="showPasswd();" type="button">Show Password</button>
        </div>
        <script>
            function showPasswd() {
                const passwd = document.getElementById("passwd");
                passwd.type = passwd.type === "password" ? "text" : "password";
            }
        </script>

        <div>
            <button type="submit">Loguj</button>
        </div>
    </form>    

    <br>
    <br>
    <hr>

    <form action="register.php" method="post">
        <div>
            <label for="login">Login</label>
            <input type="text" name="login" id="login">
        </div>

        <div>
            <label for="passwd">Hasło</label>
            <input type="password" name="passwd-register" id="passwd-register">
            <button onclick="showPasswd();" type="button">Show Password</button>
        </div>
        <script>
            function showPasswd() {
                const passwd = document.getElementById("passwd-register");
                passwd.type = passwd.type === "password" ? "text" : "password";
            }
        </script>

        <div>
            <button type="submit">Rejestruj</button>
        </div>
    </form>    
</body>
</html>