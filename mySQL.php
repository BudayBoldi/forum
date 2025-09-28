<?php
session_start();

class DBCon {
	private $server = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "test";
	private $database_handle = null;

	public function __construct() {
		$this -> database_handle = new mysqli($this -> server, $this -> user, $this -> password, $this -> database);
	}

	public function GetTable($nq, $pq) {
		$passwd = mysqli_query($this -> database_handle, "SELECT Home FROM tabla WHERE Name='$nq';");
		$age = mysqli_query($this -> database_handle, "SELECT Age FROM tabla WHERE Name='$nq';");
		$pres = mysqli_fetch_assoc($passwd)["Home"];
		$ares = mysqli_fetch_assoc($age)["Age"];
		$salt = "$1$".$ares."$";

		if (!mysqli_num_rows($passwd)) {
			echo "<res>Biztos hogy helyesen irtad be?</res>";
		} else {
			if (crypt($pq, $salt) == $pres) {
				$_SESSION["LoggedIn"] = $nq;
				return true;
			} else {
				echo "Helytelen jelszó!";
				return false;
			}
		}

		mysqli_free_result($passwd);
		mysqli_free_result($age);
		mysqli_close($this -> database_handle);
	}
	public function WriteTable($nw, $pw, $aw) {
		$salt = "$1$".$aw."$";
		$cpw = crypt($pw, $salt);

		if(mysqli_query($this -> database_handle, "INSERT INTO tabla VALUES (null, '$nw', '$cpw', '$aw');")) {
			echo "Belerakva!";
			return true;
		} else {
			echo "Hiba: " . mysqli_error($this -> database_handle);
			return false;
		}

		mysqli_close($this -> database_handle);
	}
	public function GetKartya() {
		$klista = mysqli_query($this -> database_handle, "SELECT * FROM kartyak ORDER BY Szam DESC LIMIT 4;");
		while ($row = mysqli_fetch_assoc($klista)) {
			echo '<div class="card">' . '<img src="' . $row["Kep"] . '">' . '<div class="container">' . '<a href="' . $row["Link"] . '">' . '<h4><b>' . $row["Nev"] . '</b></h4>' . '<p>' . $row["Iras"] . '</p></a></div></div>';
		}
	}
}
?>
