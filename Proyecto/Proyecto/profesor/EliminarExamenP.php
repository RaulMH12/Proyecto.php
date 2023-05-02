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
			<h2>Aquí puedes eliminar los examenes creados por ti mismo, en ningún caso los de otro docente.</h2>
			<p>Estos son los examenes que has creado:</p>
			<?php
				include("../db.php");
				session_start();
				if ($_SESSION["tipoUsuario"] == "2" || $_SESSION["tipoUsuario"] == "3") {
					$sql = "SELECT examenes.borrado as borrado, examenes.id as id, examenes.titulo as titulo
							from examenes INNER JOIN examenes_usuarios on examenes.id = examenes_usuarios.examen 
							INNER JOIN usuarios on examenes_usuarios.usuario = usuarios.correo where examenes.creador = '" . $_SESSION['correo'] . "' ";
							$resultado = mysqli_query($conn, $sql);
							if (mysqli_num_rows($resultado) > 0) {
								while($row = mysqli_fetch_assoc($resultado)) {
									if ($row["borrado"] == 0) {
										echo "<form method='POST' action='EliminarExamenP.php'>";
										echo "<input type='radio' name='accion' value='" . $row["id"] . "'>" . $row["titulo"] . "</input></br>";
									}
								}	
							}
							echo "<input type='submit' value='enviar' name='Eliminar'></br>";
							echo "</form>";
					if(isset($_POST["Eliminar"])) {
						$Eliminar = $_POST["accion"];
						$sqlDel = "UPDATE examenes set borrado = '1' where id = $Eliminar ";
						#comprobación de que se ha actualizado:
						if ($conn->query($sqlDel) === TRUE) {
							echo "<p> Eliminado el examen </p>";
							header('Location: EliminarExamenP.php');
						} else {
							echo "<p> Ha ocurrido un problema </p>";
						}
					}
					
					#$sqlDel = "DELETE FROM examenes WHERE correo = 'usuario1@example.com'"
				} else {
					echo "<p>Algo no ha ido como debería.</p>";
					echo "<a href='../login.php'>Vuelve a registrarte.</a>";
				}
			?>
		</div>
	</body>
</html>
