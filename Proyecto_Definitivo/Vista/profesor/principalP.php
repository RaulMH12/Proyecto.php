
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Area Personal</title>
    <title>GestionUsuariosA</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
	</head>
	<body>

	 <!-- Encabezado -->
    <div id="encabezado">
      <h1>Area de profesor<?php ?></h1>
    </div>

    <!-- Barra de navegación -->
    <div id="barra-navegacion">
      <a href="EliminarExamenP.php">Elimar examenes</a>
      <a href="CrearExamenP.php">Crear un nuevo examen</a>
	  <a href="RecalificarExamenP.php">Recalificar un examen</a>
    </div>

    <!-- Contenido -->
    <div id="contenido">
	    <h1>Bienvenid@ de nuevo <?php session_start(); echo $_SESSION['nombre']?> </h1>
    
	  <?php
	  	include("../../Modelo/db.php");
		  if ($_SESSION["tipoUsuario"] == "2" || $_SESSION["tipoUsuario"] == "3") {
				echo "<p> Hola " . $_SESSION['nombre'] . "</p> ";
				echo "<p>Estas son tus examenes creados:</p></br>";
				$sql = "SELECT examenes.borrado as borrado, examenes.id as id, examenes.titulo as titulo
				from examenes where examenes.creador = '" . $_SESSION['correo'] . "' ";
				$resultado = mysqli_query($conn, $sql);
				if (mysqli_num_rows($resultado) > 0) {
					echo "<table>";
						echo "<tr>";
							echo '<th scope="col"> titulo</th>';
							echo '<th scope="col"> id</th>';
						echo "</tr></br>";
					// Recorre los resultados y muestra los datos
					while($row = mysqli_fetch_assoc($resultado)) {
						//Con esto hacemos que se muestren los resultados de los exmanes que no están borrados
						if ($row["borrado"] == 0) {
						echo "<tr>";
							echo "<td>" . $row["titulo"] . "</td>";
							echo "<td>" . $row["id"] . "</td>";
						echo "</tr>";
						}
					}	
					echo "</table>";
				}
		} else {
			echo "<p>Algo no ha ido como debería.</p>";
			echo "<a href='../login.php'>Vuelve a registrarte.</a>";
		}
		?>
	</div>
	</body>
</html>