<!DOCTYPE html>
<html lang="es">
  <head>
	  <meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ModificarExamen</title>
    <link rel="stylesheet" type="text/css" href="../css.css"/>
  </head>
  <body>
    <!-- Encabezado -->
    <div id="encabezado">
      <h1>Administración</h1>
    </div>

    <!-- Barra de navegación -->
    <div id="barra-navegacion">
      <a href="usuarios/GestionUsuariosA.php">Gestión de usuarios</a>
      <a href="incidentes.php">Problemas recibidos</a>
      <a href="examenes/gestionExamenes.php">Gestión de examenes</a>
    </div>

    <!-- Contenido -->
    <div id="contenido">
	    <h1>Bienvenido de nuevo <?php session_start();echo $_SESSION['nombre']?> </h1>
        <p> Examenes realizados <p>
    </div>
        <?php
        include("../../Modelo/db.php");
          if ($_SESSION["tipoUsuario"] == "3") {
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
          } else {
          echo "<p>Algo no ha ido como debería.</p>";
          echo "<a href='../login.php'>Vuelve a registrarte.</a>";
          }
        ?>
</body>
</html>
