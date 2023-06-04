<!DOCTYPE html>
<html>
<head>
    <title>GestionUsuariosA</title>
    <link rel="stylesheet" type="text/css" href="../../css.css">
</head>

<body>
     <!-- Encabezado -->
     <div id="encabezado">
     <h1> En esta pagina como administrador puedes eliminar examenes  </h1>
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
                $sql = "SELECT id, titulo, grupo, puntuacionTotal, creador FROM examenes WHERE borrado = 0";
                $query = mysqli_query($conn, $sql);
                $a = 0;
                if (mysqli_num_rows($query) > 0) {
                    echo "<table>";
                    echo "<tr>";
                    echo '<th scope="col"> id</th>';
                    echo '<th scope="col"> titulo</th>';
                    echo '<th scope="col"> grupo</th>';
                    echo '<th scope="col"> puntuacionTotal</th>';
                    echo '<th scope="col"> creador</th>';
                    echo "</tr></br>";
                    // Recorre los resultados y muestra los datos
                    echo "<form method='POST' action='../../../Controlador/examen/EliminarExamen.php'>";
                    while($row = mysqli_fetch_assoc($query)) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</a></td>";
                        echo "<td> " . $row["titulo"] . "</td>";
                        echo "<td> " . $row["grupo"] . "</td>";
                        echo "<td> " . $row["puntuacionTotal"] . "</td>";
                        echo "<td> " . $row["creador"] . "<input type='checkbox' name='examen$a' value='" . $row["id"] . "'></td>";
                        echo "</tr>";
                        $a++;
                    }
                    echo "<input type='hidden' name='numero' value='$a'/> </br>";
                    echo "</table>";
                    echo "<input type='submit' name='eliminarExamen' value='Enviar'/> </br>";
                }          
            } else {
                echo "<p>Algo no ha ido como debería.</p>";
                echo "<a href='../login.php'>Vuelve a registrarte.</a>";
            }
        ?>
        </div>
    </body>
</html>