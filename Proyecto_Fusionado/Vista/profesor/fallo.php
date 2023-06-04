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
            <h1>Upss... Ha ocurrido un fallo</h1>
        </div>

        <!-- Barra de navegación -->
        <div id="barra-navegacion">
            <a href="eliminarExamenP.php">Eliminar examenes</a>
            <a href="principal.php">Área principal</a>
            <a href="RecalificarExamen.php">Modifica un examen</a>
        </div>

        <!-- Contenido -->
        <div id="contenido">
            <?php
                include("../../Modelo/db.php");
                session_start();
                if ($_SESSION["tipoUsuario"] == "2" || $_SESSION["tipoUsuario"] == "3") {
                    echo "<p>Alguna de las acciones que has llevado a cabo ha dado como resultado un fallo, vuelve a intentarlo.</p>";
                } else {
                    echo "<p>Algo no ha ido como debería.</p>";
                    echo "<a href='../login.php'>Vuelve a registrarte.</a>";
                }
            ?>
        </div>
    </body>
</html>