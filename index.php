<html lang="hu">
<head>
    <title>Széchenyi Fórum</title>
    <meta name="keywords" content="Széchenyi Fórum">
    <meta name="description" content="Széchenyi Fórum">
    <link rel="stylesheet" href="szechenyi.css">
	<link rel="icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<?php
include 'mySQL.php';
?>
<div id="dmenu">
  <img src="logo.jpg" id="logo">

  <div class="dropdown">
    <button class="dropbtn">Fórum</button>
    <div class="dropdown-content">
      <a href="#">Hírek</a>
      <a href="#">Előadások</a>
      <a href="#">Archívum</a>
      <a href="#">Széchenyi és...</a>
      <a href="#">MKR sorozata 2010</a>
      <a href="#">Legyen hungarikum</a>
      <a href="#">Könyv is cikkajánló</a>
      <a href="#">Érdekességek</a>
      <!-- <a href="#">Vélemény</a> -->
      <!-- <a href="#">Figyelő</a> -->
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Széchenyi Alapítvány</button>
    <div class="dropdown-content">
      <a href="#">DSzD</a>
      <a href="#">Hírek</a>
      <a href="#">Dokumentumok</a>
      <a href="#">Hitel átírása, fordítása</a>
      <a href="#">Önkéntes</a>
      <a href="#">Adomány</a>
      <a href="#">Pályázatok</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Gyüjtő Kollégium</button>
    <div class="dropdown-content">
      <a href="#">Gyüjtői gondolatok</a>
      <a href="#">Gyüjtemény</a>
      <a href="#">Keres-kutat</a>
      <a href="#">Tanulmány</a>
      <a href="#">Hírek</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Széchenyi Társaság</button>
    <div class="dropdown-content">
      <a href="#">Hírek</a>
      <!-- <a href="#">Soproni konferencia</a> -->
      <a href="#">Eszmesúrlódások</a>
      <a href="#">Ünnepeink</a>
      <a href="#">Széchenyi Társaság Díja</a>
      <a href="#">Széchenyiről</a>
      <!-- <a href="#">Budakeszi Széchenyi Kör</a> -->
      <a href="#">Köz- és média-kapcsolat</a>
      <a href="#">In Memoriam</a>
      <a href="#">Magunkról</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn" title="Országos Széchenyi Kör">OSzK</button>
    <div class="dropdown-content">
      <a href="#">Hírek</a>
      <a href="#">Magunkról</a>
      <a href="#">Emlékezés Széchenyire</a>
      <a href="#">Tájékoztatás</a>
      <a href="#">Dokumentumok</a>
      <a href="#">Szervezet</a>
      <a href="#">Archívum</a>
      <a href="#">Önkéntes</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn"><a href="./lekerdez.php">Bejelentkezés</a></button>
  </div>
</div>

<br><br><br><br>

<div id="hirek">
  <center><a href="#" id="bannid"><img id="banner" src="banners/tamogatas.jpg"></a></center>
  <br>
  <br>
  <?php
      $DBCon = new DBCon();
      $DBCon -> GetKomment();
  ?>
  <form class="para" action="#" method="POST">
    <textarea id="chat" name="chat" placeholder="Írjon véleményt"></textarea>
    <input id="subbtn" type="submit" value="Beküldés">
  </form>

	<?php
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if ($_SESSION["LoggedIn"] != "") {
				$name = $_SESSION["LoggedIn"];
				$date = date("Y-m-d H:i:s");
				$chat = '<a href="#">' . htmlspecialchars($_POST['chat']) . '</a>';
				$DBCon = new DBCon();
				$DBCon -> WriteKomment($name, $date, $chat);
		    } else {
		    	echo '<p class="para">' . 'Ehez be kell jelentkezned!' . '</p>';
		    }
		}
	?>
	<?php
	  $DBCon = new DBCon();
  	  $DBCon -> GetKartya();
	?>

  <p id="copy">© Copyright szechenyiforum.hu</p>
  <br>
</div>
<script language="JScript" src="slide.js"></script>
</body>
</html>
