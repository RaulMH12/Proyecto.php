<!DOCTYPE html>
<html>
<head>
    <title>GestionUsuariosA</title>
    <link rel="stylesheet" type="text/css" href="../../css.css">
</head>

<body><!-- Encabezado -->
    <div id="encabezado">
        <h1> En esta pagina como administrador puedes elegir crear y eliminar examenes así como modificarlos</h1>
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
                if(isset($_POST['Comprobación']) && ($_POST['Comprobación'] == 'enviar')) {
                    if($_POST["accion"] == "Crear"){
                        echo "<form method='POST' action='crearExamen.php'>";
                        echo "<label>Escribe el titulo del examen que quieres crear:</label></br>";
                        echo "<input type='int' name='titulo' requiered></br>";
                        echo "<label>Escribe el grupo al que quieres que pertenezca el examen:</label></br>";
                        echo "<input type='int' name='grupo' requiered></br>";
                        echo "<label>Escribe la puntuación total del examen:</label></br>";
                        echo "<input type='int' name='puntuacionTotal' requiered></br>";
                        echo "<label>Cuantas preguntas quieres que tenga el examen:</label></br>";
                        echo "<input type='int' name='numPreguntas'/></br>";
                        echo "<label for='Categoría'>Elige la categoría a la que quieres asignar el examen:</label></br>";
                        echo "<select name='categoria' id='opciones'>";
                            echo "<option value='1'>IAW</option>";
                            echo "<option value='2'>ASXBD</option>";
                            echo "<option value='3'>ASO</option>";
                            echo "<option value='4'>EIE</option>";
                            echo "<option value='5'>SRI</option>";
                            echo "<option value='6'>SAD</option>";
                            echo "<option value='7'>FOL</option>";
                        echo "</select></br>";
                        echo "<input type='submit' name='crearComprobacion'></br>";
                        echo "</form>";
                    } elseif($_POST["accion"] == "Eliminar"){
                        header('Location: eliminarExamen.php');
                    }  elseif($_POST["accion"] == "Modificar"){
                        header('Location: modificarExamen.php');
                    } elseif($_POST["accion"] == "Error"){
                        echo "Has introducido algún dato incorrecto (o la suma de los valores de las preguntas del examen no coincidian con su valor total).";
                    }
                } else {
                    echo "<p> ¿Qué acción deseas realizar? </p>";
                    echo "<form method='POST' action='gestionExamenes.php'>";
                    echo "<input type='radio' name='accion' value='Crear'>Crear </input>";
                    echo "<input type='radio' name='accion' value='Eliminar'>Eliminar </input>";
                    echo "<input type='radio' name='accion' value='Modificar'>Modificar </input>";
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