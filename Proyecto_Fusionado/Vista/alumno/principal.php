<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
  </head>
  <body>
    <!-- Encabezado -->
    <div id="encabezado">
      <h1>Tus Examenes</h1>
    </div>

    <!-- Barra de navegación -->
    <div id="barra-navegacion">
      <a href="areapersonal.php">Área personal</a>
      <a href="incidencias.php">Informa de un problema</a>
      <a href="repetirexamen.php">Realiza un examen</a>
    </div>

    <!-- Contenido -->
    <div id="contenido">
      <h2>Bienvenido a tu sitio web de realización de examenes</h2>
		<p>Bienvenido de nuevo <?php session_start(); echo $_SESSION['nombre']?> </p>

    <?php 
      include("../../Modelo/db.php");
      if ($_SESSION["tipoUsuario"] == "1" || $_SESSION["tipoUsuario"] == "3") {
                  // Aquí se encuentra donde se muestran los examenes:
                  $sql = "SELECT examenes_usuarios.id as id, titulo, usuarios.correo as correo, nota 
                  from examenes_usuarios INNER JOIN usuarios on examenes_usuarios.usuario = usuarios.correo 
                  INNER JOIN examenes on examenes_usuarios.examen = examenes.id where examenes.borrado = 0";
                  $resultado = mysqli_query($conn, $sql);
                  if (mysqli_num_rows($resultado) > 0) {
                    echo "<h3>Estos son los examenes que has realizado por el momento<h3>";
                    // Recorre los resultados y muestra los datos
                    echo "<table>";
                    while($row = mysqli_fetch_assoc($resultado)) {
                      if ($row["correo"] == $_SESSION['correo']){
                        echo "<tr>";
                        echo "<td> <a href='areapersonal.php'>" . $row["id"] . "</a></td>";
                        echo "<td>" . $row["titulo"] . "</td>";
                        echo "<td>" . $row["correo"] . "</td>";
                        echo "<td>" . $row["nota"] . "</td>";
                        echo "</tr>";
                      }
                    }
                    echo "</table>";
          // Aquí se encuentra donde se muestran las incidencias
          $sql = "SELECT usuario, cuerpo, resuelto, respuesta FROM incidentes WHERE usuario = '" . $_SESSION['correo'] . "'";
          $resultado = mysqli_query($conn, $sql);
          if (mysqli_num_rows($resultado) > 0) {
              $incidenciasResueltas = false;
              $incidenciasSinResolver = false;
              echo "</br><h1> Aquí se muestran tus incidencias<h2>";
              while ($row = mysqli_fetch_assoc($resultado)) {
                  $usuario = $row["usuario"];
                  $cuerpo = $row["cuerpo"];
                  $respuesta = $row["respuesta"];
                  $resuelto = $row["resuelto"];
                  if ($usuario === $_SESSION['correo']) {
                      if ($resuelto === '1') {
                          if (!$incidenciasResueltas) {
                              echo "<h2>Estas son tus incidencias resueltas:</h2>";
                              $incidenciasResueltas = true;
                          }
                          echo "<table>";
                          echo "<tr>";
                          echo "<td>$cuerpo</td>";
                          echo "<td>$respuesta</td>";
                          echo "</tr>";
                          echo "</table>";
                      } else {
                          if (!$incidenciasSinResolver) {
                              echo "<h2>Estas son tus incidencias sin resolver:</h2>";
                              $incidenciasSinResolver = true;
                          }
                          echo "<p>$cuerpo</p>";
                      }
                  }
              }
          } else {
              echo "<p>No tienes incidencias registradas.</p>";
          }

          }
      } else {
          echo "<p>Algo no ha ido como debería.</p>";
          echo "<a href='../login.php'>Vuelve a registrarte.</a>";
      }    
    ?>
  </div>
</body>
</html>