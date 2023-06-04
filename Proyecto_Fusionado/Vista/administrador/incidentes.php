<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Iniciar sesión para estudiantes</title>
	<link rel="stylesheet" type="text/css" href="../css.css">
     
  </head>
  <body>
    <!-- Encabezado -->
    <div id="encabezado">
      <h1>Administración</h1>
    </div>

    <!-- Barra de navegación -->
    <div id="barra-navegacion">
      <a href="usuarios/gestionUsuariosA.php">Gestión usuarios</a>
      <a href="principalA.php">Pagina principal</a>
      <a href="examenes/gestionExamenes.php">Gestion examenes</a>
    </div>

    <!-- Contenido -->
    <div id="contenido">
      <p>¿Quieres ver los incidentes ya resueltos, los no resueltos o ambos?<p>
      <form method='POST' action='incidentes.php'>
			  <input type='radio' name='resuelto'> Resueltos </input>
			  <input type='radio' name='noresuelto'> Sin resolver </input>
			  <input type='radio' name='ambos'> Ambos </input>
        <input type='submit' name='enviado' value=' Mostrar'/>
      </form>
      
      <?php
        include("../../Modelo/db.php");
        session_start();
        $sql = "SELECT usuario, cuerpo, resuelto from incidentes ORDER BY resuelto";
        $resultado = mysqli_query($conn, $sql);
        if (isset($_POST['resuelto'])) {
          if (mysqli_num_rows($resultado) > 0) {
            echo "<table>";
            echo "<tr>";
            echo "<th colspan='2'> Incidentes resueltos </th>";
            echo "</tr>";
            echo "<tr>";
            echo "<th> Incidente </th>";
            echo "<th> Usuario </th>";
            echo "</tr>";
            while ($row = mysqli_fetch_assoc($resultado)) {
              if ($row['resuelto'] == 1) {
                echo "<tr>";
                echo "<td> " . $row['cuerpo'] . "</td>";
                echo "<td> " . $row['usuario'] . "</td>";
                echo "</tr>";
              }
            }
            echo "</table>";
          }
        } elseif (isset($_POST['noresuelto'])) {
            if (mysqli_num_rows($resultado) > 0) {
              echo "<table>";
              echo "<tr>";
              echo "<th colspan='2'> Incidentes sin resolver </th>";
              echo "</tr>"; 
              echo "<tr>";
              echo "<th> Incidente </th>";
              echo "<th> Usuario </th>";
              echo "</tr>";
              while ($row = mysqli_fetch_assoc($resultado)) {
                if ($row['resuelto'] == 0) {
                  echo "<tr>";
                  echo "<td> " . $row['cuerpo'] . "</td>";
                  echo "<td> " . $row['usuario'] . "</td>";
                  echo "</tr>";
                }
              }
              echo "</table>";
            }
        } elseif (isset($_POST['ambos'])) {
            if (mysqli_num_rows($resultado) > 0) {
              echo "<table>";
              echo "<tr>";
              echo "<th colspan='3'> Incidentes resueltos y sin resolver </th>";
              echo "</tr>";
              echo "<tr>";
              echo "<th> Incidente </th>";
              echo "<th> Usuario </th>";
              echo "<th> Estado </th>";
              echo "</tr>";
              while ($row = mysqli_fetch_assoc($resultado)) {
                  echo "<tr>";
                  echo "<td> " . $row['cuerpo'] . "</td>";
                  echo "<td> " . $row['usuario'] . "</td>";
                  if ($row['resuelto'] == 1) {
                    echo "<td>Si</td>";
                  } elseif ($row['resuelto'] == 0) {
                    echo "<td>No</td>";
                  }
                  echo "</tr>";
              }
              echo "</table>";
            }
          } 
        ?>
    </div>
</body>
</html>
