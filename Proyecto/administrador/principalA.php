<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
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

    /* spacing */

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
      <h1>Administración</h1>
    </div>

    <!-- Barra de navegación -->
    <div id="barra-navegacion">
      <a href="GestionUsuariosA.php">Gestión usuarios</a>
      <a href="ProblemasA.php">Problemas recibidos</a>
      <a href="GestionExamenes.php">Realiza un examen</a>
    </div>

    <!-- Contenido -->
    <div id="contenido">
	    <h1>Bienvenido de nuevo <?php session_start();echo $_SESSION['nombre']?> </h1>
        <p> Ultimos examenes realizados <p>
    </div>
        <?php
        include ("../db.php");
        $sql = "SELECT examenes_usuarios.id as id, titulo, usuarios.correo as correo, nota 
                from examenes_usuarios INNER JOIN usuarios on examenes_usuarios.usuario = usuarios.correo 
                INNER JOIN examenes on examenes_usuarios.examen=examenes.id";
		$resultado = mysqli_query($conn, $sql);
		if (mysqli_num_rows($resultado) > 0) {
            echo "<table>";
            echo "<tr>";
            echo '<th scope="col"> id</th>';
            echo '<th scope="col"> titulo</th>';
            echo '<th scope="col"> correo</th>';
            echo '<th scope="col"> nota</th>';
            echo "</tr></br>";
			// Recorre los resultados y muestra los datos
			while($row = mysqli_fetch_assoc($resultado)) {
				echo "<tr>";
				echo "<td>" . $row["id"] . "</a></td>";
				echo "<td> " . $row["titulo"] . "</td>";
				echo "<td> " . $row["correo"] . "</td>";
				echo "<td> " . $row["nota"] . "</td>";
				echo "</tr>";
			}
            echo "</table>";
        }
        ?>
</body>
</html>
