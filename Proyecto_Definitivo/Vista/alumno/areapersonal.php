
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Area Personal</title>
	<link rel="stylesheet" type="text/css" href="../css.css">
	</head>
</head>
<body>
	<!-- Encabezado -->
    <div id="encabezado">
      <h1>Área Personal</h1>
    </div>

    <!-- Barra de navegación -->
    <div id="barra-navegacion">
      <a href="principal.php">Página principal</a>
      <a href="incidencias.php">Informa de un problema</a>
      <a href="realizarexamen.php">Realiza un examen</a>
    </div>

    <!-- Contenido -->
    <div id="contenido">
      <h2>Bienvenido a tu sitio web de realización de examenes</h2>
 
	  <?php
	  	include("../../Modelo/db.php");
		session_start();
		if ($_SESSION["tipoUsuario"] == "1" || $_SESSION["tipoUsuario"] == "3") {
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
			INNER JOIN examenes on examenes_usuarios.examen = examenes.id where examenes.borrado = 0";
			$resultado = mysqli_query($conn, $sql);
			if (mysqli_num_rows($resultado) > 0) {
				// Recorre los resultados y muestra los datos
				while($row = mysqli_fetch_assoc($resultado)) {
					if  ($row["correo"] == $_SESSION['correo']){
						echo "<tr>";
						echo "<td>" . $row["id"] . "</td>";
						echo "<td>" . $row["titulo"] . "</td>";
						echo "<td>" . $row["correo"] . "</td>";
						echo "<td>" . $row["nota"] . "</td>";
						echo "</tr>";
					}
				}
			}
		} else {
			echo "<p>Algo no ha ido como debería.</p>";
			echo "<a href='../login.php'>Vuelve a registrarte.</a>";
		}
		?>
  		</tbody>
	</table>
	</div>
	</body>
</html>