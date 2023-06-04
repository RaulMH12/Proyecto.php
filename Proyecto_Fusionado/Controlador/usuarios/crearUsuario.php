<?php
    include("../../Modelo/db.php");
    session_start();
    if (isset($_POST['crearUsuario']) && $_POST['crearUsuario'] == "enviado" && $_POST['numeroCrear']) {
        for( $a = 0; $a < $_POST['numeroCrear']; $a++ ){
            $sql = 'INSERT INTO Usuarios (correo, password, nombre, apellidos, tipoUsuario, grupo) VALUES ("' . $_POST["correo$a"] . '", "' . $_POST["password$a"] . '", "' . $_POST["nombre$a"] . '", "' . $_POST["apellidos$a"] . '", "' . $_POST["tipoUsuario$a"] . '", "' . $_POST["grupo$a"] . '");';
            $query = mysqli_query($conn, $sql);
        }
        header('Location: ../../Vista/administrador/principalA.php');
    }
?>