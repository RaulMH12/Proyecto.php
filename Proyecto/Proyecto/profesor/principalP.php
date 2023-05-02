
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Area Personal</title>
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
	  table {
		table-layout: fixed;
		width: 100%;
		border-collapse: collapse;
	  }
	  td {
			text-align: center;
	  }
    </style>
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
	  	include("../db.php");
		  if ($_SESSION["tipoUsuario"] == "2" || $_SESSION["tipoUsuario"] == "3") {
				echo "<p> Hola " . $_SESSION['nombre'] . "</p> ";
				echo "<p>Estas son tus examenes creados:</p></br>";
				$sql = "SELECT examenes.borrado as borrado, examenes.id as id, examenes.titulo as titulo
				from examenes INNER JOIN examenes_usuarios on examenes.id = examenes_usuarios.examen 
				INNER JOIN usuarios on examenes_usuarios.usuario = usuarios.correo where examenes.creador = '" . $_SESSION['correo'] . "' ";
				$resultado = mysqli_query($conn, $sql);
				if (mysqli_num_rows($resultado) > 0) {
					echo "<table>";
						echo "<tr>";
							echo '<th scope="col"> titulo</th>';
							echo '<th scope="col"> id</th>';
						echo "</tr></br>";
					// Recorre los resultados y muestra los datos
					while($row = mysqli_fetch_assoc($resultado)) {
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