<?php
    include("../../Modelo/db.php");
    session_start(); 
    if (isset($_POST)) {
        $sql = 'INSERT INTO Incidentes (cuerpo, usuario, resuelto, respuesta) VALUES 
        ("' . $_POST["mensaje"] . '", "' . $_POST["correo"] . '", 0, "")';
        $query = mysqli_query($conn, $sql);
        if ($_SESSION["tipoUsuario"] == "1") {
            header('Location: ../../Vista/alumno/incidencias.php');
        } elseif ($_SESSION["tipoUsuario"] == "2") {
                header('Location: ../../Vista/profesor/incidencias.php');
         } elseif ($_SESSION["tipoUsuario"] == "3") {
            header('Location: ../../Vista/administrador/principalA.php');
         }
    } else {
        if ($_SESSION["tipoUsuario"] == "1") {
        header('Location: ../../Vista/alumno/fallo.php');
        } elseif ($_SESSION["tipoUsuario"] == "2") {
            header('Location: ../../Vista/profesor/fallo.php');
        } elseif ($_SESSION["tipoUsuario"] == "3") {
            header('Location: ../../Vista/administrador/examenes/fallo.php');
        }
    }
?>