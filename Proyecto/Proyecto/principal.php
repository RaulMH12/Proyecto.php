<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi sitio web</title>
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
    <!-- Encabezado -->
    <div id="encabezado">
      <h1>Tus Examenes</h1>
    </div>

    <!-- Barra de navegación -->
    <div id="barra-navegacion">
      <a href="areapersonal.php">Área personal</a>
      <a href="contacto.php">Informa de un problema</a>
      <a href="repetirexamen.php">Realiza un examen</a>
    </div>

    <!-- Contenido -->
    <div id="contenido">
      <h2>Bienvenido a tu sitio web de realización de examenes</h2>
      <p>En este sitio web podrás realizar una gran variedad de examenes y consultar tus notas. </p>
    </div>
		<h1>Bienvenido de nuevo <?php session_start(); echo $_SESSION['nombre']?> </h1>

</body>
</html>
