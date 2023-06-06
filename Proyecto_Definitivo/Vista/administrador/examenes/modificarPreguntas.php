<!DOCTYPE html>
<html>
<head>
    <title>GestionUsuariosA</title>
    <link rel="stylesheet" type="text/css" href="../../css.css">
</head>

<body><!-- Encabezado -->
    <div id="encabezado">
        <h1> En esta pagina como administrador puedes modificar preguntas de un examen</h1>
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
                if(isset($_POST['preguntas'])){
                        //Modificar Enunciado
                    if (isset($_POST['examenModificarEnunciado'])){
                        echo "<form method='POST' action='../../../Controlador/examen/modificarPreguntas.php'>";
                            echo "<label>Escribe aquí el nuevo enunciado que quieres que tenga la pregunta</label></br>";
                            echo "<input type='text' name='examenModificarEnunciado' requiered/></br> ";
                            echo "<input type='hidden' name='examenModificarID' value='" . $_POST["examenModificarID"] . "'>";
                            echo "<input type='submit' value='enviar' name='comprobacionModificarEnunciado'></br>";
                        echo "</form>";
                        //Modificar RespuestaA
                    } elseif (isset($_POST['examenModificarRespuestaA'])){
                        echo "<form method='POST' action='../../../Controlador/examen/modificarPreguntas.php'>";
                            echo "<label>Escribe aquí la nueva respuesta (A):</label></br>";
                            echo "<input type='text' name='examenModificarRespuestaA' requiered/></br> ";
                            echo "<input type='hidden' name='examenModificarID' value='" . $_POST["examenModificarID"] . "'>";
                            echo "<input type='submit' value='enviar' name='comprobacionModificarRespuesta'></br>";
                        echo "</form>";
                        //Modificar RespuestaB
                    } elseif (isset($_POST['examenModificarRespuestaB'])){
                        echo "<form method='POST' action='../../../Controlador/examen/modificarPreguntas.php'>";
                            echo "<label>Escribe aquí la nueva respuesta (B):</label></br>";
                            echo "<input type='text' name='examenModificarRespuestaB' requiered/></br> ";
                            echo "<input type='hidden' name='examenModificarID' value='" . $_POST["examenModificarID"] . "'>";
                            echo "<input type='submit' value='enviar' name='comprobacionModificarRespuesta'></br>";
                        echo "</form>";
                        //Modificar RespuestaC
                    }elseif (isset($_POST['examenModificarRespuestaC'])){
                        echo "<form method='POST' action='../../../Controlador/examen/modificarPreguntas.php'>";
                            echo "<label>Escribe aquí la nueva respuesta (C):</label></br>";
                            echo "<input type='text' name='examenModificarRespuestaC' requiered/></br> ";
                            echo "<input type='hidden' name='examenModificarID' value='" . $_POST["examenModificarID"] . "'>";
                            echo "<input type='submit' value='enviar' name='comprobacionModificarRespuesta'></br>";
                        echo "</form>";
                        //Modificar RespuestaD
                    }elseif (isset($_POST['examenModificarRespuestaD'])){
                        echo "<form method='POST' action='../../../Controlador/examen/modificarPreguntas.php'>";
                            echo "<label>Escribe aquí la nueva respuesta (D):</label></br>";
                            echo "<input type='text' name='examenModificarRespuestaD' requiered/></br> ";
                            echo "<input type='hidden' name='examenModificarID' value='" . $_POST["examenModificarID"] . "'>";
                            echo "<input type='submit' value='enviar' name='comprobacionModificarRespuesta'></br>";
                        echo "</form>";
                        //Modificar Categoría
                    }elseif (isset($_POST['examenModificarCategoria'])){
                        echo "<form method='POST' action='../../../Controlador/examen/modificarPreguntas.php'>";
                            echo "<label>Marca la nueva categoría a la que deba pertenecer la pregunta</p></br>";
                            echo "<select name='categoria' id='opciones'>";
                            echo "<option value='1'>IAW</option>";
                            echo "<option value='2'>ASXBD</option>";
                            echo "<option value='3'>ASO</option>";
                            echo "<option value='4'>EIE</option>";
                            echo "<option value='5'>SRI</option>";
                            echo "<option value='6'>SAD</option>";
                            echo "<option value='7'>FOL</option>";
                            echo "</select>";
                            echo "<input type='hidden' name='examenModificarID' value='" . $_POST["examenModificarID"] . "'>";
                            echo "<input type='submit' value='enviar' name='comprobacionModificarCategoria'></br>";
                        echo "</form>";
                        // Eliminar la pregunta
                    }elseif (isset($_POST['examenModificarEliminar'])){
                        $preguntaId = $_POST['examenModificarEliminar'];
                        // Hacemos una comprobación de que la pregunta que quiere eliminar es realmente esa: 
                        $sql = "SELECT pregunta.id, pregunta.enunciado, pregunta.respuestaA, pregunta.respuestaB, pregunta.respuestaC, pregunta.respuestaD, pregunta.categoria FROM pregunta WHERE id = '$preguntaId'";
                        $query = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($query) > 0) {
                            $row = mysqli_fetch_assoc($query);
                            // Encabezados
                            echo "<table>";
                            echo "<tr>";
                            echo '<th scope="col"> id</th>';
                            echo '<th scope="col"> enunciado</th>';
                            echo '<th scope="col"> respuestaA</th>';
                            echo '<th scope="col"> respuestaB</th>';
                            echo '<th scope="col"> respuestaC</th>';
                            echo '<th scope="col"> respuestaD</th>';
                            echo '<th scope="col"> categoria</th>';
                            echo "</tr></br>";
                            //resultados
                            echo "<tr>";
                                echo "<td> " . $row["id"] . "</td>";
                                echo "<td> " . $row["enunciado"] . "</td>";
                                echo "<td> " . $row["respuestaA"] . "</td>";
                                echo "<td> " . $row["respuestaB"] . "</td>";
                                echo "<td> " . $row["respuestaC"] . "</td>";
                                echo "<td> " . $row["respuestaD"] . "</td>";
                                echo "<td>" . $row["categoria"] . "</td>";
                            echo "</tr>";
                            echo "</table>";
                        }
                        echo "<form method='POST' action='../../../Controlador/examen/modificarPreguntas.php'>";
                            echo "<label>¿Este es el examen que quieres borrar?</label></br>";
                            echo "<select name='comprobacion' id='opciones'>";
                                echo "<option value='Si'>Si</option>";
                                echo "<option value='No'>No</option>";
                            echo "</select>";
                            echo "<input type='hidden' name='examenModificarID' value='" . $_POST["examenModificarID"] . "'>";
                            echo "<input type='submit' value='enviar' name='comprobacionModificarEliminar'></br>";
                        echo "</form>";
                    } else {
                        echo "<p> Ha debido de ocurrir un error, trata de volver a intentarlo</p>";
                        echo "<p> Pincha aquí para volver a modificar el <a href='gestionExamen'>examen</a></p>";
                    }
                } else {
                    echo "<p> Ha debido de ocurrir un error, trata de volver a intentarlo</p>";
                    echo "<p> Pincha aquí para volver a modificar el <a href='gestionExamen'>examen</a></p>";
                }   
            } else {
                echo "<p>Algo no ha ido como debería.</p>";
                echo "<a href='../login.php'>Vuelve a registrarte.</a>";
            }
        ?>
        </div>
    </body>
    </html>