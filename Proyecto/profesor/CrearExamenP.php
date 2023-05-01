<?php
    include("../db.php");
    session_start();
    if ($_SESSION["tipoUsuario"] == "2" || $_SESSION["tipoUsuario"] == "3") {
        if ($_SESSION["tipoUsuario"] == "2") {
            echo "<p> ooo </p>";
        } else {
            echo "<p> aaa </p>";
        }
    } else {
        echo "<p>Algo no ha ido como debería.</p>";
        echo "<a href='../login.php'>Vuelve a registrarte.</a>";
    }
?>