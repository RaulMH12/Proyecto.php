<!DOCTYPE html>
<html>
<head>
    <title>GestionUsuariosA</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
</head>

<body>
    <h1> En esta pagina como administrador puedes elegir crear y eliminar usuarios así como cambiar de tipo o grupo a un o unos usuarios en concreto </h1>
    <p> ¿Qué acción deseas realizar? </p>

    <?php
        include("db.php");
        session_start();
        $a = "10";
        for ($contador = 0; $contador < $a; $contador=$contador+1 ) {
            echo "i";
        }
    ?>
</body>
</html>

include("../db.php");
session_start();
		  if ($_SESSION["tipoUsuario"] == "2") {
        } else {
			echo "<p>Algo no ha ido como debería.</p>";
			echo "<a href='../login.php'>Vuelve a registrarte.</a>";
		}