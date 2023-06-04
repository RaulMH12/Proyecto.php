<!DOCTYPE html>
<html>
<head>
    <title>GestionUsuariosA</title>
    <link rel="stylesheet" type="text/css" href="../../css.css">
</head>

<body>
    <!-- Encabezado -->
    <div id="encabezado">
        <h1> En esta pagina como administrador puedes crear examenes  </h1>
    </div>

    <!-- Barra de navegación -->
    <div id="barra-navegacion">
        <a href="../principalA.php">Pagina Principal</a>
    </div>

    <!-- Contenido -->
    <div id="contenido">

    <?php
        include("../../../Modelo/db.php");
        session_start();
		if ($_SESSION["tipoUsuario"] == "3") {
            echo "<p>Aquí puedes elegir difentes opciones de personalización a la hora de crear el examen</p>";
            if (isset($_POST['crearComprobacion'])) {
                echo "<form method='POST' action='../../../Controlador/examen/crearExamen.php'>";
                for ($a = 0; $a < $_POST['numPreguntas']; $a++) {
                    echo "<input placeholder='pregunta 1' type='text' name='pregunta$a'></input>";
                    echo "<input placeholder='respuesta 1' type='text' name='respuestacorrecta$a'></input>";
                    for ($e = 2; $e < 5; $e++) {
                        echo "<input placeholder='respuesta $e' type='text' name='respuesta$a$e'></input>";
                    }
                    echo "<input placeholder='valor de la pregunta' type='int' name='valor$a'></input>";
                    echo "</br>";
                }
                echo "<input type='hidden' name='numPreguntas' value='" . $_POST['numPreguntas'] . "'/>";
                echo "<input type='hidden' name='titulo' value='" . $_POST['titulo'] . "'/>";
                echo "<input type='hidden' name='grupo' value='" . $_POST['grupo'] . "'/>";
                echo "<input type='hidden' name='puntuacionTotal' value='" . $_POST['puntuacionTotal'] . "'/>";
                echo "<input type='hidden' name='categoria' value='" . $_POST['categoria'] . "'/>";
                echo "<input type='submit' name='crearExamen' value='enviado'/> </br>";
                echo "</form>";
            }
        } else {
			echo "<p>Algo no ha ido como debería.</p>";
			echo "<a href='../login.php'>Vuelve a registrarte.</a>";
		}
    ?>
    </div>
</body>
</html>
