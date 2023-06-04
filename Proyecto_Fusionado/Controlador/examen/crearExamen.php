<?php
    include("../../Modelo/db.php");
    session_start();
	if ($_SESSION["tipoUsuario"] == "3" || $_SESSION["tipoUsuario"] == "2") {
        #Hacemos una comprobación de que se hayan introducido todos los valores o que la suma de los valores de las preguntas del examen no coincidian con su valor total
        if (isset($_POST['crearExamen']) && isset($_POST['grupo']) && isset($_POST['puntuacionTotal']) && isset($_POST['titulo']) && isset($_POST['categoria'])) {
            #Esto lo hacemos para comprobar que la suma de los valores de las preguntas del examen no coincidian con su valor total
            $comprobacion = 0;
            for ($a = 0; $a < $_POST['numPreguntas']; $a++) {
            $comprobacion = $comprobacion + intval($_POST["valor$a"]);
            };
            if ($comprobacion == $_POST['puntuacionTotal']){
                #Creamos el examen aqui
                $examen = "INSERT INTO Examenes (titulo, grupo, puntuacionTotal, borrado, creador) VALUES
                ('" . $_POST['titulo'] . "', " . $_POST['grupo'] . ", " . $_POST['puntuacionTotal'] . ", False, '" . $_SESSION['correo'] . "')";
                $query = mysqli_query($conn, $examen);

                #Creamos las preguntas aqui
                    #Hacemos una consulta de la id del examen ya que la utilizaremos para la tabla "preguntas_examenes".
                $sql = "SELECT id FROM Examenes where titulo = '" . $_POST['titulo'] . "'";
                $query2 = mysqli_query($conn, $sql);
                for ($a = 0; $a < $_POST['numPreguntas']; $a++) {
                    # Insertar la pregunta en la tabla "preguntas"
                    $pregunta = "INSERT INTO Pregunta (enunciado, respuestaA, respuestaB, respuestaC, respuestaD, categoria) VALUES
                                ('" . $_POST['pregunta' . $a] . "','" . $_POST['respuestacorrecta' . $a] . "', '" . $_POST['respuesta' . $a . '2'] . "', '" . $_POST['respuesta' . $a . '3'] . "', '" . $_POST['respuesta' . $a . '4'] . "', " . $_POST['categoria'] . ")";
                    $query = mysqli_query($conn, $pregunta);
                
                    if ($query) {
                        # Obtener el ID de la pregunta recién insertada
                        $idPregunta = mysqli_insert_id($conn);
                
                        # Obtener el ID del examen
                        $sql2 = "SELECT id FROM Examenes WHERE titulo = '" . $_POST['titulo'] . "'";
                        $query2 = mysqli_query($conn, $sql2);
                
                        if ($query2 && mysqli_num_rows($query2) > 0) {
                            $row = mysqli_fetch_assoc($query2);
                            $idExamen = $row['id'];
                
                            # Insertar la relación en la tabla "preguntas_examenes"
                            $valorpregunta = "INSERT INTO Preguntas_Examenes (examen, pregunta, puntuacion) VALUES ($idExamen, $idPregunta, " . $_POST['valor' . $a] . ")";
                            $queryFinal = mysqli_query($conn, $valorpregunta);
                        }
                    }
                }            
            } else {
                if ($_SESSION["tipoUsuario"] == 3) {
                    header('Location: ../../Vista/administrador/examenes/fallo.php');
                } elseif ($_SESSION["tipoUsuario"] == 2) {
                    header('Location: ../../Vista/profesor/fallo.php');
                }
            };
            #Si todo sale correcto el usuario es redirigido por aqui
            if ($_SESSION["tipoUsuario"] == 3) {
                header('Location: ../../Vista/administrador/examenes/gestionExamenes.php');
            } elseif ($_SESSION["tipoUsuario"] == 2) {
                header('Location: ../../Vista/profesor/principalP.php');
            };
        } else {
            if ($_SESSION["tipoUsuario"] == 3) {
                header('Location: ../../Vista/administrador/examenes/fallo.php');
            } elseif ($_SESSION["tipoUsuario"] == 2) {
                header('Location: ../../Vista/profesor/fallo.php');
            }
        };
    } else {
        echo "<p>Algo no ha ido como debería.</p>";
        echo "<a href='../login.php'>Vuelve a registrarte.</a>";
    };
?>

