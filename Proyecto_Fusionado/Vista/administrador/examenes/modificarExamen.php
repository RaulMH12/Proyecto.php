<!DOCTYPE html>
<html>
    <head>
        <title>ModificarExamen</title>
        <link rel="stylesheet" type="text/css" href="../../css.css">
    </head>

    <body>
    <div id="encabezado">
        <h1> En esta pagina como administrador puedes modificar los examenes</h1>
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
                if (isset($_POST['comprobacion'])){
                    echo "<h3>¿Qué quieres modificar?<h3>";
                    echo "<form method='POST' action='modificarExamen.php'>";
                    echo "<select name='categoria' id='opciones'>";
                            echo "<option value='titulo'>Titulo</option>";
                            echo "<option value='grupo'>Grupo</option>";
                            echo "<option value='borrado'>Borrado</option>";
                            echo "<option value='creador'>Creador</option>";
                            echo "<option value='preguntas'>Las preguntas</option>";
                            echo "<input type='hidden' name='examenModificar' value='" . $_POST['examenModificar'] . "'>";
                        echo "</select>";
                    echo "<input type='submit' name='opciones' value='Aceptar'></br>";    
                    echo "</form>";
                //Entramos aquí si el usuario elige MODIFICAR EL TITULO
                } elseif (isset($_POST['opciones']) && $_POST['categoria'] == "titulo"){
                    echo "<p>¿Qué titulo vas a utilizar?</p>";
                    echo "<form method='POST' action='../../../Controlador/examen/modificarExamen.php'>";
                    echo "<input type='text' name='titulo' placeholder='Escribe aquí el nuevo titulo'/>";
                    echo "<input type='hidden' name='examenModificar' value='" . $_POST["examenModificar"] . "'/> ";
                    echo "<input type='submit' value='enviar' name='comprobacionTitulo'></br>";
                    echo "</form>";
                //Entramos aquí si el usaurio elige MOFICAR EL GRUPO
                } elseif (isset($_POST['opciones']) && $_POST['categoria'] == "grupo"){
                    echo "<form method='POST' action='../../../Controlador/examen/modificarExamen.php'>";
                    echo "<select name='grupo' id='opciones'>";
                        echo "<option value='1'>Grupo 1</option>";
                        echo "<option value='2'>Grupo 2</option>";
                    echo "</select>";
                    echo "<input type='hidden' name='examenModificar' value='" . $_POST["examenModificar"] . "'/> ";
                    echo "<input type='submit' value='enviar' name='comprobacionGrupo'></br>";
                    echo "</form>";
                //Entramos aquí si el usaurio elige MOFICAR EL BORRADO
                } elseif (isset($_POST['opciones']) && $_POST['categoria'] == "borrado"){
                    echo "<form method='POST' action='../../../Controlador/examen/modificarExamen.php'>";
                    echo "<select name='borrado' id='opciones'>";
                        echo "<option value='0'>No borrado</option>";
                        echo "<option value='1'>Borrado</option>";
                    echo "</select>";
                    echo "<input type='hidden' name='examenModificar' value='" . $_POST["examenModificar"] . "'/>";
                    echo "<input type='submit' value='enviar' name='comprobacionBorrado'></br>";
                    echo "</form>";
                //Entramos aquí si el usaurio elige MOFICAR EL CREADOR
                } elseif (isset($_POST['opciones']) && $_POST['categoria'] == "creador"){
                    echo "<form method='POST' action='../../../Controlador/examen/modificarExamen.php'>";
                    echo "<input type='email' name='creador' placeholder = 'Escribe aquí el correo del usuario que será el creador del examen.'/></br> ";
                    echo "<input type='hidden' name='examenModificar' value='" . $_POST["examenModificar"] . "'/>";
                    echo "<input type='submit' value='enviar' name='comprobacionCreador'></br>";
                    echo "</form>";
                //Entramos aqui si  el usuario elige MODIFICAR LAS PREGUNTAS
                } elseif (isset($_POST['opciones']) && $_POST['categoria'] == "preguntas") {
                    echo "<h3> Estas son las preguntas que tiene el examen en cuestión, elige lo que quieres modificar </h3>";
                    $sql = "SELECT pregunta.id, pregunta.enunciado, pregunta.respuestaA, pregunta.respuestaB, pregunta.respuestaC, pregunta.respuestaD, 
                            pregunta.categoria FROM pregunta INNER JOIN preguntas_examenes on pregunta.id = preguntas_examenes.pregunta 
                            INNER JOIN examenes ON preguntas_examenes.examen = examenes.id 
                            where examenes.id = '" . $_POST['examenModificar'] . "'";
                    $query = mysqli_query($conn, $sql);
                    $a = 0;
                    if (mysqli_num_rows($query) > 0) {
                        echo "<table>";
                        echo "<tr>";
                        echo '<th scope="col"> enunciado</th>';
                        echo '<th scope="col"> respuestaA</th>';
                        echo '<th scope="col"> respuestaB</th>';
                        echo '<th scope="col"> respuestaC</th>';
                        echo '<th scope="col"> respuestaD</th>';
                        echo '<th scope="col"> categoria</th>';
                        echo '<th scope="col"> elimar</th>';
                        echo "</tr></br>";
                        // Recorre los resultados y muestra los datos
                        echo "<form method='POST' action='modificarPreguntas.php'>";
                        while($row = mysqli_fetch_assoc($query)) {
                            echo "<tr>";
                            echo "<td> " . $row["enunciado"] . "<input type='radio' name='examenModificarEnunciado' value='" . $row["id"] . "'></td>";
                            echo "<td> " . $row["respuestaA"] . "<input type='radio' name='examenModificarRespuestaA' value='" . $row["id"] . "'></td>";
                            echo "<td> " . $row["respuestaB"] . "<input type='radio' name='examenModificarRespuestaB' value='" . $row["id"] . "'></td>";
                            echo "<td> " . $row["respuestaC"] . "<input type='radio' name='examenModificarRespuestaC' value='" . $row["id"] . "'></td>";
                            echo "<td> " . $row["respuestaD"] . "<input type='radio' name='examenModificarRespuestaD' value='" . $row["id"] . "'></td>";
                            echo "<td>" . $row["categoria"] . "<input type='radio' name='examenModificarCategoria' value='" . $row["id"] . "'></td>";
                            echo "<td> Pulsa aquí si quieres elimar por completo la pregunta <input type='radio' name='examenModificarEliminar' value='" . $row["id"] . "'></td>";
                            echo "</tr>";
                            echo "</a><input type='hidden' name='examenModificarID' value='" . $row["id"] . "'>";
                        }
                        echo "</table>";
                        echo "<input type='submit' name='preguntas' value='Modificar'/> </br>";
                        echo "</form>";
                    }
                //Esto es lo que vemos por defecto.
                } else {
                    $sql = "SELECT id, titulo, grupo, puntuacionTotal, creador FROM examenes";
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
                        echo "<form method='POST' action='modificarExamen.php'>";
                        while($row = mysqli_fetch_assoc($query)) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</a></td>";
                            echo "<td> " . $row["titulo"] . "</td>";
                            echo "<td> " . $row["grupo"] . "</td>";
                            echo "<td> " . $row["puntuacionTotal"] . "</td>";
                            echo "<td> " . $row["creador"] . "<input type='radio' name='examenModificar' value='" . $row["id"] . "'></td>";
                            echo "</tr>";
                        }
                        echo "<input type='hidden' name='numeroPreguntas' value='$a'/> </br>";
                        echo "</table>";
                        echo "<input type='submit' name='comprobacion' value='Modificar'/> </br>";
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