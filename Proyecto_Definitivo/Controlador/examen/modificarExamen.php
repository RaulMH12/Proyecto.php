<?php
    include("../../Modelo/db.php");
    session_start();
    if ($_SESSION["tipoUsuario"] == "2" || $_SESSION["tipoUsuario"] == "3") {
        // Titulo
        if(isset($_POST['comprobacionTitulo'])) {
            $id = $_POST['examenModificar'];
            $titulo = $_POST['titulo'];
            $sql = "UPDATE examenes SET titulo = '$titulo' WHERE id = '$id'";
            $query = mysqli_query($conn, $sql);
            if ($_SESSION["tipoUsuario"] == "2") {
                header('Location: ../../Vista/profesor/eliminarExamenP.php');
            } else {
                header('Location: ../../Vista/administrador/principalA.php');
            }
        // Grupo
        } elseif  (isset($_POST['comprobacionGrupo'])) {
            $id = $_POST['examenModificar'];
            $grupo = $_POST['grupo'];
            $sql = "UPDATE examenes SET grupo = '$grupo' WHERE id = '$id'";
            $query = mysqli_query($conn, $sql);
            if ($_SESSION["tipoUsuario"] == "2") {
                header('Location: ../../Vista/profesor/eliminarExamenP.php');
            } else {
                 header('Location: ../../Vista/administrador/principalA.php');
            }
        
        // Borrado
        } elseif  (isset($_POST['comprobacionBorrado'])) {
            $id = $_POST['examenModificar'];
            $borrado = $_POST['borrado'];
            $sql = "UPDATE examenes SET grupo = '$borrado' WHERE id = '$id'";
            $query = mysqli_query($conn, $sql);
            if ($_SESSION["tipoUsuario"] == "2") {
                header('Location: ../../Vista/profesor/eliminarExamenP.php');
            } else {
                 header('Location: ../../Vista/administrador/principalA.php');
            }

        //Creador    
        } elseif (isset($_POST['comprobacionCreador'])) {
            $id = $_POST['examenModificar'];
            $creador = $_POST['creador'];
        
            // Comprobamos que exista un usuario que se llame así en la base de datos.
            $sqlComprobacion = "SELECT correo FROM usuarios WHERE correo = '$creador'";
            $queryComprobacion = mysqli_query($conn, $sqlComprobacion);
        
            if (mysqli_num_rows($queryComprobacion) > 0) {
                // Hacemos la update si todo ha salido bien
                $sql = "UPDATE examenes SET creador = '$creador' WHERE id = '$id'";
                $query = mysqli_query($conn, $sql);
        
                if ($_SESSION["tipoUsuario"] == "2") {
                    header('Location: ../../Vista/profesor/eliminarExamenP.php');
                } else {
                    header('Location: ../../Vista/administrador/principalA.php');
                }
            } else {
                if ($_SESSION["tipoUsuario"] == "2") {
                    header('Location: ../../Vista/profesor/fallo.php');
                } else {
                    header('Location: ../../Vista/administrador/examenes/fallo.php');
                }
            }
        }
         elseif (isset($_POST['preguntas'])){

        }
    } else {
        echo "<p>Algo no ha ido como debería.</p>";
        echo "<a href='../login.php'>Vuelve a registrarte.</a>";
    }
?>