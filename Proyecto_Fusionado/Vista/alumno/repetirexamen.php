<!DOCTYPE html>
<html>
    <head>
        <title>Iniciar sesión para estudiantes</title>
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>

    <body>
        <?php
            include("../../Modelo/db.php");;
            session_start();
            if ($_SESSION["tipoUsuario"] == "1" || $_SESSION["tipoUsuario"] == "3") { 
                 #Inicializamos la varibale para que no de errores
                echo "Bienvenido " . $_SESSION["nombre"] . " a continuación se muestran tus asignaturas, ¿de que asignatura deseas realizar el examen?";
                $grupo1 = mysqli_query($conn, "SELECT grupo from usuarios where correo = '" . $_SESSION['correo'] . "'");
                if ($ro = mysqli_fetch_assoc($grupo1)){
                    $sql = "SELECT examenes.titulo, examenes.id FROM examenes inner join examenes_usuarios on examenes.id = examenes_usuarios.examen inner join usuarios on examenes_usuarios.usuario = usuarios.correo where examenes.grupo = '" . $ro['grupo'] . "'";
                    $resultado = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($resultado) > 0) {
                        //Recorre los resultados y muestra los datos
                        while($row = mysqli_fetch_assoc($resultado)) {
                            echo " <form method='POST' action='repetirexamen.php'>";
                                echo "<input type='radio' name='examen' value='" . $row['id'] . "'> " . $row['titulo'] . " </input>";
                                echo "<input type='hidden' name='titulo' value='" . $row['titulo'] . "'></input></br>";
                        }
                    echo "<label>Escribe el numero de preguntas que quieres realizar, no pueden exceder del número de preguntas que hay en el examen:</label></br>";
                    echo "<input type='int' name='numeroPreguntas'></br>"; 
                    echo "<input type='submit' value='enviar'></br>"; 
                    echo "</form></br>"; 
                    }
                }
                if (isset($_POST['examen']) && isset($_POST['numeroPreguntas'])){
                    $sql2 = "SELECT count(pregunta) FROM preguntas_examenes  where examen = " . $_POST['examen']. "";
                    $resultado2 = mysqli_query($conn, $sql2);
                    if (mysqli_num_rows($resultado2) >= $_POST['numeroPreguntas']) {
                        /* Enviamos los datos a la pagina de realización de examenes y posteriormente*/
                        echo " <form method='POST' action='realizarexamen.php'>";
                            echo "<input type='hidden' name='titulo' value='" . $_POST['titulo'] . "'></input>";
                            echo "<input type='hidden' name='id' value='" . $_POST['id'] . "'></input>";
                            echo "<input type='hidden' name='numeroPreguntas' value='" . $_POST['numeroPreguntas'] . "'></input>";
                            header('Location: realizarExamen.php');
                    } else {
                        if ($numero = mysqli_fetch_assoc($resultado2)) {
                        echo "<p>El número de preguntas que tiene el examenes es " . print_r($numero) . ", introduce una cantidad igual o menor.</p>";
                        }
                    }
                }
            } else {
                echo "<p>Algo no ha ido como debería.</p>";
                echo "<a href='../login.php'>Vuelve a registrarte.</a>";
            }
            ?>
	
    </body>
</html>
