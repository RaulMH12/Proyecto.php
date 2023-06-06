<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Área Personal</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
</head>
<body>
    <div id="encabezado">
        <h1>Mi Área Personal</h1>
    </div>
    <!-- Barra de navegación -->
    <div id="barra-navegacion">
        <a href="principal.php">Página principal</a>
        <a href="incidencias.php">Informa de un problema</a>
        <a href="repetirexamen.php">Realiza un examen</a>
    </div>

    <!-- Contenido -->
    <div id="contenido">
        <h2>Bienvenido a tu sitio web de realización de exámenes</h2>
        <?php
        include("../../Modelo/db.php");
        session_start();
        if ($_SESSION["tipoUsuario"] == "1" || $_SESSION["tipoUsuario"] == "3") {
            if (isset($_POST['eleccionExamenes'])) {
                $examenId = $_POST['examen'];
                $sql2 = "SELECT * FROM pregunta INNER JOIN preguntas_examenes ON pregunta.id = preguntas_examenes.pregunta WHERE preguntas_examenes.examen = '$examenId'";
                $resultado2 = mysqli_query($conn, $sql2);
                
                // Aquí se muestran las preguntas del examen seleccionado
                if (mysqli_num_rows($resultado2) > 0) {
                    $a = 0;
                    echo "<form method='POST' action='../../Controlador/examen/realizarExamen.php'>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Título</th>";
                    echo "<th>Respuesta A</th>";
                    echo "<th>Respuesta B</th>";
                    echo "<th>Respuesta C</th>";
                    echo "<th>Respuesta D</th>";
                    echo "</tr>";
                    echo "<h3>Preguntas del examen:</h3>";
                
                    $options = ['respuestaA', 'respuestaB', 'respuestaC', 'respuestaD'];
                    while ($row2 = mysqli_fetch_assoc($resultado2)) {
                        // Shuffle the answer options
                        shuffle($options);
                
                        echo "<tr>";
                        echo "<td>" . $row2['enunciado'] . "</td>";
                
                        // Display the answer options in the shuffled order
                        foreach ($options as $option) {
                            $optionValue = $row2[$option];
                            echo "<td><input type='radio' name='respuesta$a' value='$optionValue'>$optionValue</td>";
                        }
                
                        echo "</tr>";
                        $a++;
                    }
                    echo "</table>";
                    echo "<input type='hidden' name='numeroPreguntas' value='$a'>";
                    echo "<input type='hidden' name='examen' value='" . $_POST['examen'] . "'>";
                    echo "<input type='submit' name='crear'>";
                    echo "</form>";
                } else {
                    echo "<p>No se encontraron preguntas para este respuestaD.</p>";
                }
            } else {
                echo "Bienvenido " . $_SESSION["nombre"] . ", a continuación se muestran tus asignaturas. ¿De qué asignatura deseas realizar el examen?";
                $sql = "SELECT id, titulo FROM examenes WHERE grupo = '" . $_SESSION['grupo'] . "'";
                $resultado = mysqli_query($conn, $sql);
                if (mysqli_num_rows($resultado) > 0) {
                    echo "<form method='POST' action='realizarexamen.php'>";
                    while ($row = mysqli_fetch_assoc($resultado)) {
                        echo "<input type='radio' name='examen' value='" . $row['id'] . "'> " . $row['titulo'] . "</input><br>";
                    }
                    echo "<input type='submit' name='eleccionExamenes' value='Realizar Examen'><br>";
                    echo "</form>";
                } else {
                    echo "<p>No hay exámenes disponibles para tu grupo.</p>";
                }
            }
        } else {
            echo "<p>Algo no ha ido como debería.</p>";
            echo "<a href='../login.php'>Vuelve a registrarte.</a>";
        }
        ?>
    </div>
</body>
</html>