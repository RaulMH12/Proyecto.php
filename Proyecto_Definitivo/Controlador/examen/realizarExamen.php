<?php
    include("../../Modelo/db.php");
    session_start();

    if ($_SESSION["tipoUsuario"] == "1" || $_SESSION["tipoUsuario"] == "3") {
        if (isset($_POST['crear'])) {
            $numeroPreguntas = $_POST['numeroPreguntas'];
            $examen = $_POST['examen'];
            $aciertos = 0;
            $fallos = 0;
            $multiplicador = 0;
            $puntuacionTotal = 0;

            $sql = "SELECT examenes.puntuacionTotal, pregunta.respuestaA, preguntas_examenes.puntuacion, preguntas_examenes.pregunta
            FROM examenes 
            INNER JOIN preguntas_examenes ON examenes.id = preguntas_examenes.examen
            INNER JOIN pregunta ON preguntas_examenes.pregunta = pregunta.id
            WHERE preguntas_examenes.examen = '$examen'";
            $resultado = mysqli_query($conn, $sql);
            if (mysqli_num_rows($resultado) > 0) {
                for ($a = 0; $a < $numeroPreguntas; $a++) {
                    $row = mysqli_fetch_assoc($resultado);
                    $respuestaCorrecta = $row['respuestaA'];
                    $respuestaSeleccionada = $_POST['respuesta' . $a];
                    if ($respuestaSeleccionada === $respuestaCorrecta) {
                        $aciertos++;
                        } else {
                            $fallos++;
                        }
                    echo "</tr>";
                }
            // calculamos la puntuación que tuvo en el examen
            $preguntasTotales = $aciertos + $fallos;
            $multiplicador = $row['puntuacionTotal'] / $preguntasTotales;
            $puntuacionTotal = $multiplicador * $aciertos;
            $puntuacionTotal2 = number_format($puntuacionTotal, 2);
            }
            echo "</table>";
            echo "<p>Número de aciertos: $aciertos</p>";
            echo "<p>Número de fallos: $fallos</p>";
        // Insertamos los datos en la tabla usuarios-examenes
        $insertar = 'INSERT INTO Examenes_Usuarios(examen, usuario, nota) VALUES ("' . $examen . '", "' . $_SESSION["correo"] . '", "' . $puntuacionTotal2 . '")';
        $query = mysqli_query($conn, $insertar);
        header('Location: ../../Vista/alumno/realizarexamen.php');
        } else {
            echo "<p>No se ha seleccionado ningún examen.</p>";
        }
    } else {
        echo "<p>Algo no ha ido como debería.</p>";
        echo "<a href='../login.php'>Vuelve a registrarte.</a>";
    }
?>