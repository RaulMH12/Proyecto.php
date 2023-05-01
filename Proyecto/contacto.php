<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Contacto</title>
    <style>
      /* Estilos para la página de contacto */
      body {
        font-family: Arial, sans-serif;
        background-color: #f1f1f1;
      }
      h1 {
        text-align: center;
      }
      form {
        max-width: 500px;
        margin: 0 auto;
        background-color: white;
        padding: 20px;
        border-radius: 10px;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      }
      label, input, textarea {
        display: block;
        margin-bottom: 10px;
      }
      input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        font-size: 16px;
      }
      input[type="submit"]:hover {
        background-color: #3e8e41;
      }
    </style>
  </head>
  <body>
    <h1>Contacto</h1>
    <form action="#" method="post">
      <label for="nombre">Nombre:</label>
      <input type="text" id="nombre" name="nombre" required>

      <label for="email">Email:</label>
      <input type="email" id="email" name="email" required>

      <label for="telefono">Teléfono:</label>
      <input type="tel" id="telefono" name="telefono">

      <label for="mensaje">Mensaje:</label>
      <textarea id="mensaje" name="mensaje" required></textarea>

      <input type="submit" value="Enviar">
    </form>
  </body>
</html>
