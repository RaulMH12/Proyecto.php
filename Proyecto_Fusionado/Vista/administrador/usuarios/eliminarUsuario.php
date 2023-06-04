<!DOCTYPE html>
<html>
<head>
    <title>GestionUsuariosA</title>
    <link rel="stylesheet" type="text/css" href="../../css.css">
</head>

<body>
    <div id="encabezado">
        <h1> En esta pagina como amdministrador puedes eliminar usuarios</h1>
    </div>

    <!-- Barra de navegación -->
    <div id="barra-navegacion">
        <a href="../principalA.php">Pagina Principal</a>
    </div>

    <!-- Contenido -->
    <div id="contenido">

    <?php
        include("../../../Modelo/db.php");
        session_start();
		  if ($_SESSION["tipoUsuario"] == "3") {
            if (isset($_POST['eliminarComprobacion'])) {
                echo "<form method='POST' action='../../../Controlador/usuarios/eliminarUsuario.php'>";
                echo "<h1> Especifica los usuarios a eliminar </h1>";
                for($a = 0; $a < $_POST['numeroEliminar']; $a++) {
                    echo "<input placeholder= 'Especifica el correo del usuario $a' type='email' name='mail$a' required></input>";
                }
                echo "<input type='hidden' name='numeroEliminar' value='" . $_POST['numeroEliminar'] . "'/>";
                echo "<input type='submit' name='eliminarUsuario' value='enviado'/></br>";
                echo "</form>";
            } else {
                echo "<p>Algo no ha ido como debería.</p>";
                echo "<a href='gestionUsuariosA.php'>Vuelve a la página anterior</a>";
            }
        } else {
			echo "<p>Algo no ha ido como debería.</p>";
			echo "<a href='../login.php'>Vuelve a registrarte.</a>";
		}
    ?>
    </div>
</body>
</html>