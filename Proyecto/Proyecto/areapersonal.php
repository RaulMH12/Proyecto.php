
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
    </style>
	</head>
	<body>
	<div id="encabezado">
      <h1>Mi area personal</h1>
    </div>
	  <?php
	  	include("../db.php");
		if ($_SESSION["tipoUsuario"] == "2" || $_SESSION["tipoUsuario"] == "3") {
			session_start();
			echo "<p> Hola " . $_SESSION['nombre'] . "</p> </br>";
			echo "Estas son tus calificaciones:";
		} else {
			echo "<p>Algo no ha ido como debería.</p>";
			echo "<a href='../login.php'>Vuelve a registrarte.</a>";
		}
	  ?>
	<table>
  		<thead>
   	 		<tr>
			<th>id</th>
			<th>examen</th>
			<th>nombre del usuario</th>
			<th>nota</th>
			</tr>
		</thead>
		<tbody>
	    <?php
		if ($_SESSION["tipoUsuario"] == "1" || $_SESSION["tipoUsuario"] == "3") {
			$sql = "SELECT examenes_usuarios.id as id, titulo, usuarios.correo as correo, nota 
			from examenes_usuarios INNER JOIN usuarios on examenes_usuarios.usuario = usuarios.correo 
			INNER JOIN examenes on examenes_usuarios.examen = examenes.id";
			$resultado = mysqli_query($conn, $sql);
			if (mysqli_num_rows($resultado) > 0) {
				// Recorre los resultados y muestra los datos
				while($row = mysqli_fetch_assoc($resultado)) {
					echo "<tr>";
					echo "<td> <a href='areapersonal.php'>" . $row["id"] . "</a></td>";
					echo "<td>" . $row["titulo"] . "</td>";
					echo "<td>" . $row["correo"] . "</td>";
					echo "<td>" . $row["nota"] . "</td>";
					echo "</tr>";
				}
			}
		}
		?>
  		</tbody>
	</table>
	<form method="POST" action="basura.php">
		<label>Nombre:</label>
		<input type="text" name="nombre">

		<label>Email:</label>
		<input type="email" name="email">

		<input type="submit" value="Enviar">
	</form>
	
	</body>
</html>