
<!DOCTYPE html>
<html>
<head>
	<title>Iniciar sesión para estudiantes</title>
	<link rel="stylesheet" type="text/css" href="css.css">
</head>

<body>
	<div class="login">
		<h1>Iniciar sesión para estudiantes</h1>
		<?php if (isset($error)) { echo "<p class='error'>$error</p>"; } ?>
		<form method="post" action="login.php">
			<label for="correo">Correo electrónico:</label>
			<input type="text" id="correo" name="correo" required>
			<label for="password">Contraseña:</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="Iniciar sesión">
		</form>
	</div>
</body>

<?php
	include("../db.php");
	session_start();
	if ($_SESSION["tipoUsuario"] == "1" || $_SESSION["tipoUsuario"] == "3") {
		# Definiciones de variables para que no haya warnings
		$correo = "0";
		$password = "0";
		
		# Comprobamos si el formulario ha sido enviado y si no es así damos un mensaje de error.
		if (isset($_POST['correo']) && isset($_POST['password'])) {
			$correo = $_POST['correo'];
			$password = $_POST['password'];
		};
			
		# Comprobamos que los datos sean correctos
		$sql = "SELECT * FROM Usuarios where correo='$correo' AND password='$password'"; 
		
		$resultado = mysqli_query($conn, $sql);
		if (mysqli_num_rows($resultado) > 0) {
			// Recorre los resultados y muestra los datos
			while($row = mysqli_fetch_assoc($resultado)) {
				//echo "Nombre: " . $row["nombre"]. " - Email: " . $row["correo"]. "<br>";
				if ($correo == $row["correo"] && $password == $row["password"] ) {
					#header('Location: principal.php');
					$_SESSION["correo"] = $row["correo"];
					$_SESSION["nombre"] = $row["nombre"];
					$_SESSION["tipoUsuario"] = $row["tipoUsuario"];
					if($row["tipoUsuario"] == 1) {
						header('Location: areapersonal.php');
					} elseif ($row["tipoUsuario"] == 2) {
						header('Location: profesor/principalP.php');
					} elseif ($row["tipoUsuario"] == 3) {
						header('Location: administrador/principalA.php');
					}
				}
				else {
					echo "<p> Algo salio mal.</p></br>";
				}
			}
		} else {
			echo "<p> El usuario o la contraseña no es correcta, intentalo de nuevo.</p></br>";
		}
	} else {
		echo "<p>Algo no ha ido como debería.</p>";
		echo "<a href='../login.php'>Vuelve a registrarte.</a>";
	}
?>
</html>
