include("../../Modelo/db.php");
		  if ($_SESSION["tipoUsuario"] == "2" || $_SESSION["tipoUsuario"] == "3") {
        } else {
			echo "<p>Algo no ha ido como debería.</p>";
			echo "<a href='../login.php'>Vuelve a registrarte.</a>";
		}