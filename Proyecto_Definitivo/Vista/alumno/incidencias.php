<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Incidencias</title>
	<link rel="stylesheet" type="text/css" href="../css.css">
  </head>
  <body>
    <!-- Encabezado -->
    <div id="encabezado">
      <h1>Página de incidencias</h1>
    </div>

    <!-- Barra de navegación -->
    <div id="barra-navegacion">
      <a href="areapersonal.php">Área personal</a>
      <a href="principal.php">Área principal</a>
      <a href="realizarexamen.php">Realiza un examen</a>
    </div>

    <!-- Contenido -->
    <?php
      include("../../Modelo/db.php");
      session_start(); 
      if ($_SESSION["tipoUsuario"] == "1" || $_SESSION["tipoUsuario"] == "3") {
        echo '<div class="login">';
        echo '<form action="../../Controlador/incidencias/incidencias.php" method="post">';
          echo '<input type="hidden" name="correo" value="' . $_SESSION["correo"] . '">';
          echo '<label for="mensaje">Mensaje:</label>';
          echo '<textarea id="mensaje" name="mensaje" placeholder="Escribe aquí tu incidencia" required></textarea>';
          echo '<input type="submit" name="comprobacion" value="enviar">';
        echo "</form>";
      } else {
        echo "<p>Algo no ha ido como debería.</p>";
        echo "<a href='../login.php'>Vuelve a registrarte.</a>";
      }
    ?>
    </div>
  </body>
</html>