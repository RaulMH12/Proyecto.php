<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Pagina de creación de examenes</title>
    	<link rel="stylesheet" type="text/css" href="../css.css">
	</head>
	<body>
		<!-- Encabezado -->
		<div id="encabezado">
			<h1>Tus Examenes</h1>
		</div>

		<!-- Barra de navegación -->
		<div id="barra-navegacion">
			<a href="principalP.php">Pagina principal</a>
			<a href="CrearExamenP.php">Crear un nuevo examen</a>
	  		<a href="RecalificarExamenP.php">Recalificar un examen</a>
		</div>

		<!-- Contenido -->
		<div id="contenido">
			<h2>Aquí puedes crear examenes.</h2>
			<?php
				include("../../Modelo/db.php");
				session_start();
				if ($_SESSION["tipoUsuario"] == "2" || $_SESSION["tipoUsuario"] == "3") {
					if (isset($_POST['crearComprobacion'])) {
						echo "<form method='POST' action='../../Controlador/examen/crearExamen.php'>";
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
						} else {
                        echo "<form method='POST' action='crearExamenP.php'>";
                        echo "<label>Escribe el titulo del examen que quieres crear:</label></br>";
                        echo "<input type='int' name='titulo' requiered></br>";
                        echo "<label>Escribe el grupo al que quieres que pertenezca el examen:</label></br>";
                        echo "<input type='int' name='grupo' requiered></br>";
                        echo "<label>Escribe la puntuación total del examen:</label></br>";
                        echo "<input type='int' name='puntuacionTotal' requiered></br>";
                        echo "<label>Cuantas preguntas quieres que tenga el examen:</label></br>";
                        echo "<input type='int' name='numPreguntas'/></br>";
                        echo "<label for='Categoría'>Elige la categoría a la que quieres asignar el examen:</label></br>";
                        echo "<select name='categoria' id='opciones'>";
                            echo "<option value='1'>IAW</option>";
                            echo "<option value='2'>ASXBD</option>";
                            echo "<option value='3'>ASO</option>";
                            echo "<option value='4'>EIE</option>";
                            echo "<option value='5'>SRI</option>";
                            echo "<option value='6'>SAD</option>";
                            echo "<option value='7'>FOL</option>";
                        echo "</select></br>";
                        echo "<input type='submit' name='crearComprobacion'></br>";
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
