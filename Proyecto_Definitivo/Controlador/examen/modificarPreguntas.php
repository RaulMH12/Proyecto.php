<?php
    include("../../Modelo/db.php");
    session_start();
    if ($_SESSION["tipoUsuario"] == "2" || $_SESSION["tipoUsuario"] == "3") {

        // Enunciado
        if(isset($_POST['comprobacionModificarEnunciado'])) {
            $enunciado = $_POST['examenModificarEnunciado'];
            $id = $_POST['examenModificarID'];
            $sql = "UPDATE pregunta SET enunciado = '$enunciado' where id = '$id'";
            $query = mysqli_query($conn, $sql);
            if ($_SESSION["tipoUsuario"] == 3) {
                header('Location: ../../Vista/administrador/examenes/gestionExamenes.php');
            } elseif ($_SESSION["tipoUsuario"] == 2) {
                header('Location: ../../Vista/profesor/principalP.php');
            }

        // Todas las RESPUESTAS se procesan aquí
        } elseif (isset($_POST['comprobacionModificarRespuesta'])) {
            //RespuestaA
            if (isset($_POST['examenModificarRespuestaA'])) {
                $id = $_POST['examenModificarID'];
                $respuesta = $_POST['examenModificarRespuestaA'];
                $sql = "UPDATE pregunta SET respuestaA = '$respuesta' where id = '$id'";
                $query = mysqli_query($conn, $sql);
                if ($_SESSION["tipoUsuario"] == 3) {
                    header('Location: ../../Vista/administrador/examenes/gestionExamenes.php');
                } elseif ($_SESSION["tipoUsuario"] == 2) {
                    header('Location: ../../Vista/profesor/principalP.php');
                }
            //RespuestaB
            } elseif (isset($_POST['examenModificarRespuestaB'])) {
                $id = $_POST['examenModificarID'];
                $respuesta = $_POST['examenModificarRespuestaB'];
                $sql = "UPDATE pregunta SET respuestaB = '$respuesta' where id = '$id'";
                $query = mysqli_query($conn, $sql);
                if ($_SESSION["tipoUsuario"] == 3) {
                    header('Location: ../../Vista/administrador/examenes/gestionExamenes.php');
                } elseif ($_SESSION["tipoUsuario"] == 2) {
                    header('Location: ../../Vista/profesor/principalP.php');
                }
            //RespuestaC
            }elseif (isset($_POST['examenModificarRespuestaC'])) {
                $id = $_POST['examenModificarID'];
                $respuesta = $_POST['examenModificarRespuestaC'];
                $sql = "UPDATE pregunta SET respuestaC = '$respuesta' where id = '$id'";
                $query = mysqli_query($conn, $sql);
                if ($_SESSION["tipoUsuario"] == 3) {
                    header('Location: ../../Vista/administrador/examenes/gestionExamenes.php');
                } elseif ($_SESSION["tipoUsuario"] == 2) {
                    header('Location: ../../Vista/profesor/principalP.php');
                }
            //RespuestaD
            }elseif (isset($_POST['examenModificarRespuestaD'])) {
                $id = $_POST['examenModificarID'];
                $respuesta = $_POST['examenModificarRespuestaD'];
                $sql = "UPDATE pregunta SET respuestaD = '$respuesta' where id = '$id'";
                $query = mysqli_query($conn, $sql);
                if ($_SESSION["tipoUsuario"] == 3) {
                    header('Location: ../../Vista/administrador/examenes/gestionExamenes.php');
                } elseif ($_SESSION["tipoUsuario"] == 2) {
                    header('Location: ../../Vista/profesor/principalP.php');
                }
            } else {
                if ($_SESSION["tipoUsuario"] == 3) {
                    header('Location: ../../Vista/administrador/examenes/fallo.php');
                } elseif ($_SESSION["tipoUsuario"] == 2) {
                    header('Location: ../../Vista/profesor/fallo.php');
                }
            }

        // Categoría    
        } elseif (isset($_POST['comprobacionModificarCategoria'])) {
            $categoria = $_POST['categoria'];
            $id = $_POST['examenModificarID'];
            $sql = "UPDATE pregunta SET categoria = '$categoria' where id = '$id'";
            $query = mysqli_query($conn, $sql);
            if ($_SESSION["tipoUsuario"] == 3) {
                header('Location: ../../Vista/administrador/examenes/gestionExamenes.php');
            } elseif ($_SESSION["tipoUsuario"] == 2) {
                header('Location: ../../Vista/profesor/principalP.php');
            }

        // Eliminar
        } elseif (isset($_POST['comprobacionModificarEliminar'])) {
            $id = $_POST['examenModificarID'];
            $sql1 = "DELETE FROM preguntas_examenes WHERE pregunta = '$id'";
            $sql2 = "DELETE FROM pregunta WHERE id = '$id'";
            $query1 = mysqli_query($conn, $sql1);
            $query1 = mysqli_query($conn, $sql2);
            if ($_SESSION["tipoUsuario"] == 3) {
                header('Location: ../../Vista/administrador/examenes/gestionExamenes.php');
            } elseif ($_SESSION["tipoUsuario"] == 2) {
                header('Location: ../../Vista/profesor/principalP.php');
            }
        } else {
            if ($_SESSION["tipoUsuario"] == 3) {
                header('Location: ../../Vista/administrador/examenes/fallo.php');
            } elseif ($_SESSION["tipoUsuario"] == 2) {
                header('Location: ../../Vista/profesor/fallo.php');
            }
        }
    } else {
        echo "<p>Algo no ha ido como debería.</p>";
        echo "<a href='../login.php'>Vuelve a registrarte.</a>";
    }