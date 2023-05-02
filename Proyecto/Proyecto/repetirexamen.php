
<!DOCTYPE html>
<html>
    <head>
        <title>Iniciar sesión para estudiantes</title>
        <link rel="stylesheet" type="text/css" href="css.css">
    </head>

    <body>
        <?php
            include("../db.php");
            session_start();
                if ($_SESSION["tipoUsuario"] == "1" || $_SESSION["tipoUsuario"] == "3") { 
                    #Inicializamos la varibale para que no de errores
                    echo "Bienvenido " . $_SESSION["nombre"] . " a continuación se muestran tus asignaturas, ¿de que asignatura deseas realizar el examen?";
                    $sql = "SELECT examenes.titulo FROM examenes inner join examenes_usuarios on examenes.id = examenes_usuarios.examen inner join usuarios on examenes_usuarios.usuario = usuarios.correo";
                    $resultado = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($resultado) > 0) {
                        //Recorre los resultados y muestra los datos
                        while($row = mysqli_fetch_assoc($resultado)) {
                            echo " <form method='POST' action='basura.php'>";
                            echo "<input type='radio' name='accion' value='" . $row['titulo'] . "'> " . $row['titulo'] . " </input></br>";
                        }
                        echo "<input type='submit' value='enviar'></br>";  
                    }
                echo "<label>Escribe el numero de preguntas que quieres realizar, no pueden exceder del número de preguntas que hay en el examen:</label></br>";
                echo "<input type='int' name='numeroPreguntas'></br>";
            } else {
                echo "<p>Algo no ha ido como debería.</p>";
                echo "<a href='../login.php'>Vuelve a registrarte.</a>";
            }
        ?>
	</form>
    </body>
</html>
