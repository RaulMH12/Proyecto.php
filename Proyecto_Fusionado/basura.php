<!DOCTYPE html>
<html>
<head>
    <title>GestionUsuariosA</title>
    <link rel="stylesheet" type="text/css" href="../css.css">
</head>

<body>
    <?php
        include("Modelo/db.php");
        session_start();

        $a = rand(int 1, int 2): int;
        echo $a;


    ?>
</body>
</html>
<?php

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
 

