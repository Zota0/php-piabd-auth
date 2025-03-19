<?php

    session_destroy();
    header("Location: index.php");
    unset($_SESSION);
    exit();

?>