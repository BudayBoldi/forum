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
		$passwd = mysqli_query($this -> database_handle, "SELECT Pwd FROM tabla WHERE Name='$nq';");
		$age = mysqli_query($this -> database_handle, "SELECT Age FROM tabla WHERE Name='$nq';");
		$pres = mysqli_fetch_assoc($passwd)["Pwd"];
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
			echo "Hiba!";
			return false;
		}

		mysqli_close($this -> database_handle);
	}
	public function GetKartya($kerka) {
		if($kerka == "") {
			$klista = mysqli_query($this -> database_handle, "SELECT * FROM kartyak ORDER BY Szam DESC LIMIT 8;");
			while ($row = mysqli_fetch_assoc($klista)) {
				echo '<div class="card">' . '<img src="' . $row["Kep"] . '">' . '<div class="container">' . '<a href="' . './index.php?q=' . $row["Ker"] . '&url=' . urlencode($row["Link"]) . '">' . '<h4><b>' . $row["Nev"] . '</b></h4>' . '<p>' . $row["Iras"] . '</p></a></div></div>';
			}
		} else {
			$klista = mysqli_query($this -> database_handle, "SELECT * FROM kartyak WHERE Ker='$kerka' ORDER BY Szam DESC LIMIT 8;");
			while ($row = mysqli_fetch_assoc($klista)) {
				echo '<div class="card">' . '<img src="' . $row["Kep"] . '">' . '<div class="container">' . '<a href="' . './index.php?q=' . $row["Ker"] . '&url=' . urlencode($row["Link"]) . '">' . '<h4><b>' . $row["Nev"] . '</b></h4>' . '<p>' . $row["Iras"] . '</p></a></div></div>';
			}
		}

		mysqli_free_result($klista);
		mysqli_close($this -> database_handle);
	}
	public function WriteKartya($szam, $nev, $iras, $kep, $link, $url, $tart) {
		if(mysqli_query($this -> database_handle, "INSERT INTO kartyak VALUES ('$szam', '$nev', '$iras', '$kep', '$link', '$url', '$tart');")) {
			echo 'Cikk berakva!';
			return true;
		} else {
			echo "Hiba!";
			return false;
		}

		mysqli_close($this -> database_handle);
	}
	public function GetSzoveg($turl) {
		$szoveg = mysqli_query($this -> database_handle, "SELECT tart FROM kartyak WHERE Link='$turl';");
		while ($row = mysqli_fetch_row($szoveg)) {
    		if($row[0] != "") {
				echo $row[0];
			} else {
				echo "Nincs találat ...";
			}
		}

		mysqli_free_result($szoveg);
		mysqli_close($this -> database_handle);
	}
	public function WriteKomment($un, $dt, $txt, $lnk, $src) {
		if(mysqli_query($this -> database_handle, "INSERT INTO kommentek VALUES ('$un', '$dt', '$txt', '$lnk', '$src');")) {
			echo '<p class="para">' . 'Berakva!' . '</p>';
			return true;
		} else {
			echo "Hiba!";
			return false;
		}

		mysqli_close($this -> database_handle);
	}
	public function GetKomment($kerko) {
		if($kerko == "") {
			$kom = mysqli_query($this -> database_handle, "SELECT * FROM kommentek ORDER BY Datum DESC LIMIT 8;");
			while ($row = mysqli_fetch_assoc($kom)) {
				echo '<p class="para">' . $row["Szoveg"] . " --" . $row["Nev"] . " " . $row["Datum"] . '</p><br>';
			}
		} else {
			$kom = mysqli_query($this -> database_handle, "SELECT * FROM kommentek WHERE Ker='$kerko' ORDER BY Datum DESC LIMIT 8;");
			while ($row = mysqli_fetch_assoc($kom)) {
				echo '<p class="para">' . $row["Szoveg"] . " --" . $row["Nev"] . " " . $row["Datum"] . '</p><br>';
			}
		}

		mysqli_free_result($kom);
		mysqli_close($this -> database_handle);
	}
	public function GetKommentK($tkurl) {
		$komk = mysqli_query($this -> database_handle, "SELECT * FROM kommentek WHERE Link='$tkurl' ORDER BY Datum;");
		while ($row = mysqli_fetch_assoc($komk)) {
			echo '<p class="para">' . $row["Szoveg"] . " --" . $row["Nev"] . " " . $row["Datum"] . '</p><br>';
		}

		mysqli_free_result($komk);
		mysqli_close($this -> database_handle);
	}
	public function Kereses($aker) {
		$alista = mysqli_query($this -> database_handle, "SELECT * FROM kartyak WHERE tart LIKE '%$aker%' ORDER BY Szam DESC LIMIT 8;");

		while ($row = mysqli_fetch_assoc($alista)) {
			echo '<div class="card">' . '<img src="' . $row["Kep"] . '">' . '<div class="container">' . '<a href="' . './index.php?q=' . $row["Ker"] . '&url=' . urlencode($row["Link"]) . '">' . '<h4><b>' . $row["Nev"] . '</b></h4>' . '<p>' . $row["Iras"] . '</p></a></div></div>';
		}

		mysqli_free_result($alista);
		mysqli_close($this -> database_handle);
	}
}
?>
