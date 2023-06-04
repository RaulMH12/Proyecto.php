
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Area Personal</title>
    <style>
      /* Estilos para el encabezado */
      #encabezado {
        background-color: #333;
        color: #fff;
        padding: 10px;
        text-align: center;
      }

      /* Estilos para la barra de navegación */
      #barra-navegacion {
        background-color: #444;
        color: #fff;
        overflow: hidden;
        text-align: center;
      }

      /* Estilos para los enlaces de la barra de navegación */
      #barra-navegacion a {
        display: inline-block;
        color: #fff;
        padding: 14px 16px;
        text-decoration: none;
      }

      /* Estilos para los enlaces de la barra de navegación al pasar el ratón */
      #barra-navegacion a:hover {
        background-color: #555;
      }

      /* Estilos para el contenido */
      #contenido {
        padding: 20px;
        text-align: center;
      }
    </style>
	</head>
	<body>
	<div id="encabezado">
      <h1>Mi area personal</h1>
    </div>
	  <?php
	  	include("../../Modelo/db.php");
		session_start();
		if ($_SESSION["tipoUsuario"] == "1" || $_SESSION["tipoUsuario"] == "3") {
            #Comprobamos que esten introducidos los parametros necesarios desde repetirExamen.php
			if  (isset($_POST['titulo']) && isset($_POST['id']) && isset($_POST['numeroPreguntas.php'])) {
                
            }
		} else {
			echo "<p>Algo no ha ido como debería.</p>";
			echo "<a href='../login.php'>Vuelve a registrarte.</a>";
		}
	  ?>
	</body>
</html>