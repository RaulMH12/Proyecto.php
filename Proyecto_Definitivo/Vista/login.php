
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
	include("../Modelo/db.php");
	session_start();
	
	# Comprobamos si el formulario ha sido enviado y si no es así damos un mensaje de error.
	if (isset($_POST['correo']) && isset($_POST['password'])) {
		$correo = $_POST['correo'];
		$password = $_POST['password'];
		
		# Comprobamos que los datos sean correctos
		$sql = "SELECT * FROM Usuarios WHERE correo='$correo' AND password='$password'"; 
		$resultado = mysqli_query($conn, $sql);

		if (mysqli_num_rows($resultado) > 0) {
			$row = mysqli_fetch_assoc($resultado);
			$_SESSION["correo"] = $row["correo"];
			$_SESSION["nombre"] = $row["nombre"];
			$_SESSION["tipoUsuario"] = $row["tipoUsuario"];
			$_SESSION["grupo"] = $row["grupo"];
			if ($row["tipoUsuario"] == 1) {
				header('Location: alumno/principal.php');
			} elseif ($row["tipoUsuario"] == 2) {
				header('Location: profesor/principalP.php');
			} elseif ($row["tipoUsuario"] == 3) {
				header('Location: administrador/principalA.php');
			}
		} else {
			echo '<p style="color: red; text-align: center;">El usuario o la contraseña son incorrectas</p>';
		}
	} else {
	}
?>

</html>