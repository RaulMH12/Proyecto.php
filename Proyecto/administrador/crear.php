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
        $a = 0;
        if(isset($_POST['Enviar'])) {
            #CREAR
            if(isset($_POST['NumeroCrear'])) {
                for( $a = 0; $a < $_POST['NumeroCrear']; $a++ ){
                echo "<form method='POST' action='crear.php'>";
                echo "<label>Nombre:</label></br>";
                echo "<input type='int' name='Nombre'></br>";
                echo "<input type='submit' value='NombreEnviadoC' name='NombreEnviarC'></br>";
                echo "</form>";
                }
            #ELIMINAR
            } elseif(isset($_POST["NumeroEliminar"])) {
                print_r($_POST["NumeroEliminar"]);
                echo "A que usuario desea eliminar: ";
                echo "<form method='POST' action='crear.php'>";
                echo "<label>Nombre:</label></br>";
                echo "<input type='mail' name='Nombre'></br>";
                echo "<input type='submit' value='NombreEnviadoE' name='NombreEnviarE'></br>";
                echo "</form>";
            #TIPO
            } elseif(isset($_POST["NombreTipo"])) {
                print_r($_POST["NombreTipo"]);
            #GRUPO
            } elseif(isset($_POST["NombreGrupo"])) {
                print_r($_POST["NombreGrupo"]);
            } else {
                echo "<p> Ha ocurrido un error </p>";
            }

        } else { 
            echo "<p> Ha ocurrido un error 1 </p>";
        }
        
    ?>
</body>
</html>