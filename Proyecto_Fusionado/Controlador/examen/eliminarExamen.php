<?php
    include("../../Modelo/db.php");
    session_start();
    
    if ($_SESSION["tipoUsuario"] == "3" || $_SESSION["tipoUsuario"] == "2") {
        if (isset($_POST['eliminarExamen'])) {
            if ($_SESSION["tipoUsuario"] == "3") {
                for ($a = 0; $a < $_POST['numero']; $a++) {
                    if (isset($_POST['examen'.$a])) {
                        $examenId = $_POST['examen'.$a];
                        $sql = "UPDATE examenes SET borrado = 1 WHERE id = '$examenId'";
                        $query = mysqli_query($conn, $sql);
                    }
                }
                // Redirige a la página correspondiente después de eliminar los exámenes
                if ($_SESSION["tipoUsuario"] == "3") {
                    header('Location: ../../Vista/administrador/examenes/eliminarExamen.php');
                } elseif ($_SESSION["tipoUsuario"] == "2") {
                    header('Location: ../../Vista/profesor/eliminarExamenP.php');
                }
            } elseif ($_SESSION["tipoUsuario"] == "2") {
                $examenId = $_POST['accion'];
                $sql = "UPDATE examenes SET borrado = 1 WHERE id = '$examenId'";
                $query = mysqli_query($conn, $sql);
                header('Location: ../../Vista/profesor/eliminarExamenP.php');
            }
        } else {
            // Redirige a la página correspondiente si no se recibieron los datos esperados
            if ($_SESSION["tipoUsuario"] == "3") {
                header('Location: ../../Vista/administrador/examenes/fallo.php');
            } elseif ($_SESSION["tipoUsuario"] == "2") {
                header('Location: ../../Vista/profesor/fallo.php');
            }
        }
    } else {
        echo "<p>Algo no ha ido como debería.</p>";
        echo "<a href='../login.php'>Vuelve a registrarte.</a>";
    }
?>
