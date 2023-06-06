<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Mi sitio web</title>
		<title>GestionUsuariosA</title>
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
			<h2>Aquí puedes eliminar los examenes creados por ti mismo, en ningún caso los de otro docente.</h2>
			<p>Estos son los examenes que has creado:</p>
			<?php
				include("../../Modelo/db.php");
				session_start();
				if ($_SESSION["tipoUsuario"] == "2" || $_SESSION["tipoUsuario"] == "3") {
					$sql = "SELECT examenes.borrado as borrado, examenes.id as id, examenes.titulo as titulo
							from examenes where examenes.creador = '" . $_SESSION['correo'] . "' ";
							$resultado = mysqli_query($conn, $sql);
							if (mysqli_num_rows($resultado) > 0) {
								while($row = mysqli_fetch_assoc($resultado)) {
									if ($row["borrado"] == 0) {
										echo "<form method='POST' action='../../Controlador/examen/eliminarExamen.php'>";
										echo "<input type='radio' name='accion' value='" . $row["id"] . "'>" . $row["titulo"] . "</input></br>";
									}
								}	
							}
							echo "<input type='submit' name='eliminarExamen' value='eliminar'></br>";
							echo "</form>";
				} else {
					echo "<p>Algo no ha ido como debería.</p>";
					echo "<a href='../login.php'>Vuelve a registrarte.</a>";
				}
			?>
		</div>
	</body>
</html>