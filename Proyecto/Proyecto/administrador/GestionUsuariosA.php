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
        include("../db.php");
        session_start();
		  if ($_SESSION["tipoUsuario"] == "3") {
            if(isset($_POST['Comprobación']) && ($_POST['Comprobación'] == 'enviar')) {
                if($_POST["accion"] == "Crear"){
                    echo "<form method='POST' action='crear.php'>";
                    echo "<label>Escribe el numero de usuarios que quieres crear.</label></br>";
                    echo "<input type='int' name='NumeroCrear'></br>";
                    echo "<input type='submit' value='Enviado' name='Enviar'></br>";
                    echo "</form>";
                } elseif($_POST["accion"] == "Eliminar"){
                    echo "<form method='POST' action='crear.php'>";
                    echo "<label>Escribe el nombre del usuario que quieres eliminar.</label></br>";
                    echo "<input type='int' name='NumeroEliminar'></br>";
                    echo "<input type='submit' value='Enviado' name='Enviar'></br>";
                    echo "</form>";
                } elseif($_POST["accion"] == "Tipo"){
                    echo "<form method='POST' action='crear.php'>";
                    echo "<label>Escribe el nombre del usuario al que quieras cambiar el tipo.</label></br>";
                    echo "<input type='int' name='NombreTipo'></br>";
                    echo "<input type='submit' value='Enviado' name='Enviar'></br>";
                    echo "</form>";
                } elseif($_POST["accion"] == "Grupo"){
                    echo "Grupo";
                    echo "Crear";
                    echo "<form method='POST' action='crear.php'>";
                    echo "<label>Escribe el nombre del usuario al que quieras cambiar el tipo.</label></br>";
                    echo "<input type='int' name='NombreGrupo'></br>";
                    echo "<input type='submit' value='Enviado' name='Enviar'></br>";
                    echo "</form>";
                }
            } else {
                echo "<form method='POST' action='GestionUsuariosA.php'>";
                echo "<input type='radio' name='accion' value='Crear'>Crear </input></br>";
                echo "<input type='radio' name='accion' value='Eliminar'>Eliminar </input></br>";
                echo "<input type='radio' name='accion' value='Tipo'>Cambiar de tipo </input></br>";
                echo "<input type='radio' name='accion' value='Grupo'>Cambiar de grupo </input></br>";
                echo "<input type='submit' value='enviar' name='Comprobación'></br>";
                echo "</form>";
            }
        } else {
			echo "<p>Algo no ha ido como debería.</p>";
			echo "<a href='../login.php'>Vuelve a registrarte.</a>";
		}
    ?>
</body>
</html>
