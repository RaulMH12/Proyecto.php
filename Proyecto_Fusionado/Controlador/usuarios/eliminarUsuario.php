<?php
    include("../../Modelo/db.php");
    session_start();
    if (isset($_POST['eliminarUsuario'])) {
        for( $a = 0; $a < $_POST['numeroEliminar']; $a++ ){
            $sql = 'DELETE FROM usuarios WHERE correo = "' . $_POST["mail$a"] . '"';
            $query = mysqli_query($conn, $sql);
        }
        header('Location: ../../Vista/administrador/principalA.php');
    }
?>