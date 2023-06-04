<!DOCTYPE html>
<html>
<head>
    <title>GestionUsuariosA</title>
    <link rel="stylesheet" type="text/css" href="../../css.css">
</head>

<body>
    <div id="encabezado">
        <h1> En esta pagina como administrador puedes elegir crear y eliminar usuarios así como cambiar de tipo o grupo a un o unos usuarios en concreto </h1>
    </div>

    <!-- Barra de navegación -->
    <div id="barra-navegacion">
        <a href="../principalA.php">Pagina Principal</a>
    </div>

    <!-- Contenido -->
    <div id="contenido">
    <p> ¿Qué acción deseas realizar? </p>

    <?php
        include("../../../Modelo/db.php");
        session_start();
		if ($_SESSION["tipoUsuario"] == "3") {
            $a = 0;
            if(isset($_POST['crearComprobaciçon'])) {
                #CREAR
                if(isset($_POST['NumeroCrear'])) {
                    echo "<form method='POST' action='../../../Controlador/usuarios/crearUsuario.php'>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<th colspan = 6> Usuarios a crear </th>";
                    echo "</tr>";
                    for( $a = 0; $a < $_POST['NumeroCrear']; $a++ ){
                    echo "<tr>";
                    echo "<td><input type='text' name='nombre$a' placeholder='Nombre del usuario $a' required/></td>";
                    echo "<td><input type='email' name='correo$a' placeholder='Correo del usuario $a' required/></td>";
                    echo "<td><input type='password' name='password$a' placeholder='Contraseña del usuario $a' required/></td>";
                    echo "<td><input type='text' name='apellidos$a' placeholder='Apellidos del usuario $a' required/></td>";
                    echo "<td><input type='int' name='grupo$a' placeholder='Grupo del usuario $a' required/></td>";
                    echo "<td><input type='int' name='tipoUsuario$a' placeholder='Tipo de usuario $a' required/></td>";
                    echo "<input type='hidden' name='numeroCrear' value='" . $_POST['NumeroCrear'] . "'/>";
                    echo "</tr>";
                    }
                    echo "</table>";
                    echo "<input type='submit' name='crearUsuario' value='enviado'/> </br>";
                    echo "</form>";
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