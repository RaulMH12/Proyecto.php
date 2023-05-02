<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Mi sitio web</title>
		<style>
		/* Estilos para el encabezado */
		#encabezado {
			background-color: #333;
			color: #fff;
			padding: 10px;
			text-align: center;
		}

		/* Estilos para la barra de navegación */
		#barra-navegacion {
			background-color: #444;
			color: #fff;
			overflow: hidden;
			text-align: center;
		}

		/* Estilos para los enlaces de la barra de navegación */
		#barra-navegacion a {
			display: inline-block;
			color: #fff;
			padding: 14px 16px;
			text-decoration: none;
		}

		/* Estilos para los enlaces de la barra de navegación al pasar el ratón */
		#barra-navegacion a:hover {
			background-color: #555;
		}

		/* Estilos para el contenido */
		#contenido {
			padding: 20px;
			text-align: center;
		}
		</style>
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
				include("../db.php");
				session_start();
				if ($_SESSION["tipoUsuario"] == "2" || $_SESSION["tipoUsuario"] == "3") {
					if(isset($_POST["Confirmación"])) {
                        
                    } else {
                        echo "<form method='post' action='CrearExamen.php'>";
			            echo "<label for='correo'>Introduce el número de examenes a crear:</label>";
			            echo "<input type='int' id='Crear1' value='Crear2' name='Numero'>";
                        echo "<input type='submit' value='Confirmación'>";
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
