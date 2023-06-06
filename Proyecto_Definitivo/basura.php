<!DOCTYPE html>
<html>
<head>
    <title>GestionUsuariosA</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
</head>

<body>
    <?php
        include("Modelo/db.php");
        session_start();

        $a = rand(int 1, int 2): int;
        echo $a;


    ?>
</body>
</html>
<?php
        include("../../Modelo/db.php");
        session_start();
        if ($_SESSION["tipoUsuario"] == "1" || $_SESSION["tipoUsuario"] == "3") {
            if (isset($_POST['eleccionExamenes'])) {
                $examenId = $_POST['examen'];
                $sql2 = "SELECT * FROM pregunta INNER JOIN preguntas_examenes ON pregunta.id = preguntas_examenes.pregunta WHERE preguntas_examenes.pregunta = '$examenId'";
                $resultado2 = mysqli_query($conn, $sql2);
                print_r($_POST);
                // Aquí se  muestran las preguntas del examen seleccionado
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
                    while ($row2 = mysqli_fetch_assoc($resultado2)) {
                        echo "<tr>";
                        echo "<td>" . $row2['enunciado'] . "</td>";
                        echo "<td><input type='radio' name='examen' value='" . $row2['respuestaA' . $a++] . "'>" . $row2['respuestaA'] . "</td>";
                        echo "<td><input type='radio' name='examen' value='" . $row2['respuestaB' . $a++] . "'>" . $row2['respuestaB'] .  "</td>";
                        echo "<td><input type='radio' name='examen' value='" . $row2['respuestaC' . $a++] . "'>" . $row2['respuestaC'] . "</td>";
                        echo "<td><input type='radio' name='examen' value='" . $row2['respuestaD' . $a++] . "'>" . $row2['respuestaD'] . "</td>";
                        echo "</tr>";
                        $a++
                    }
                    echo "<input type='radio' name='numeroPreguntas' value='$a'>";
                    echo "</form>";
                } else {
                    echo "<p>No se encontraron preguntas para este examen.</p>";
                }
            } else {
                echo "Bienvenido " . $_SESSION["nombre"] . ", a continuación se muestran tus asignaturas. ¿De qué asignatura deseas realizar el examen?";
                $sql = "SELECT id, titulo FROM examenes WHERE grupo = '" . $_SESSION['grupo'] . "'";
                $resultado = mysqli_query($conn, $sql);
                if (mysqli_num_rows($resultado) > 0) {
                    echo "<form method='POST' action='repetirexamen.php'>";
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
?>