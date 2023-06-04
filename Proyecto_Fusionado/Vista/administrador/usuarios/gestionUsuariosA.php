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
            if(isset($_POST['Comprobación']) && ($_POST['Comprobación'] == 'enviar')) {
                if($_POST["accion"] == "Crear"){
                    echo "<form method='POST' action='crearUsuario.php'>";
                    echo "<label>Escribe el numero de usuarios que quieres crear.</label></br>";
                    echo "<input type='int' name='NumeroCrear' requiered></br>";
                    echo "<input type='submit' name='crearComprobaciçon'></br>";
                    echo "</form>";
                } elseif($_POST["accion"] == "Eliminar"){
                    echo "<form method='POST' action='eliminarUsuario.php'>";
                    echo "<label>Escribe el numero de usuarios que quieres eliminar.</label></br>";
                    echo "<input type='int' name='numeroEliminar' requiered/></br>";
                    echo "<input type='submit' name='eliminarComprobacion'></br>";
                    echo "</form>";
                } 
            } else {
                echo "<form method='POST' action='GestionUsuariosA.php'>";
                echo "<input type='radio' name='accion' value='Crear'>Crear </input></br>";
                echo "<input type='radio' name='accion' value='Eliminar'>Eliminar </input></br>";
                echo "<input type='submit' value='enviar' name='Comprobación'></br>";
                echo "</form>";
            }
        } else {
			echo "<p>Algo no ha ido como debería.</p>";
			echo "<a href='../login.php'>Vuelve a registrarte.</a>";
		}
    ?>
    </div>
</body>
</html>
