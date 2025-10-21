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
$keres = htmlspecialchars($_GET["q"]);
$Url = urldecode(htmlspecialchars($_GET["url"]));
?>
<div id="dmenu">
  <img src="logo.jpg" id="logo" OnClick="location.href='http://localhost/forum/';">

  <div class="dropdown">
    <button class="dropbtn">Fórum</button>
    <div class="dropdown-content">
      <a href="index.php?q=forum_hirek">Hírek</a>
      <a href="index.php?q=forum_eloadasok">Előadások</a>
      <a href="kereses.php">Archívum</a>
      <a href="index.php?q=forum_szechenyies">Széchenyi és...</a>
      <a href="index.php?q=forum_mkrsorozata2010">MKR sorozata 2010</a>
      <a href="index.php?q=forum_legyenhungarikum">Legyen hungarikum</a>
      <a href="index.php?q=forum_konyvescikkajanlo">Könyv is cikkajánló</a>
      <a href="index.php?q=forum_erdekessegek">Érdekességek</a>
      <a href="index.php?q=forum_velemeny">Vélemény</a>
      <a href="index.php?q=forum_figyelo">Figyelő</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Széchenyi Alapítvány</button>
    <div class="dropdown-content">
      <a href="index.php?q=szalap_dszd">szalap_dszd</a>
      <a href="index.php?q=szalap_hirek">Hírek</a>
      <a href="index.php?q=szalap_dokumentumok">Dokumentumok</a>
      <a href="index.php?q=szalap_hitel">Hitel átírása, fordítása</a>
      <a href="index.php?q=szalap_onkentes">Önkéntes</a>
      <a href="index.php?q=szalap_adomany">Adomány</a>
      <a href="index.php?q=szalap_palyazatok">Pályázatok</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Gyüjtő Kollégium</button>
    <div class="dropdown-content">
      <a href="index.php?q=gyujto_gondolatok">Gyüjtői gondolatok</a>
      <a href="index.php?q=gyujto_gyujtemeny">Gyüjtemény</a>
      <a href="index.php?q=gyujto_kereskutat">Keres-kutat</a>
      <a href="index.php?q=gyujto_tanulmany">Tanulmány</a>
      <a href="index.php?q=gyujto_hirek">Hírek</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn">Széchenyi Társaság</button>
    <div class="dropdown-content">
      <a href="index.php?q=sztars_hirek">Hírek</a>
      <a href="index.php?q=sztars_sopronkonf">Soproni konferencia</a>
      <a href="index.php?q=sztars_eszmesurlodasok">Eszmesúrlódások</a>
      <a href="index.php?q=sztars_unnepeink">Ünnepeink</a>
      <a href="index.php?q=sztars_szechenyitarsasagdija">Széchenyi Társaság Díja</a>
      <a href="index.php?q=sztars_szechenyirol">Széchenyiről</a>
      <a href="index.php?q=sztars_budakeszibaratikor">Budakeszi Széchenyi Kör</a>
      <a href="index.php?q=sztars_kozesmediakapcsolat">Köz- és média-kapcsolat</a>
      <a href="index.php?q=sztars_inmemoriam">In Memoriam</a>
      <a href="index.php?q=sztars_magunkrol">Magunkról</a>
    </div>
  </div>

  <div class="dropdown">
    <button class="dropbtn" title="Országos Széchenyi Kör">OSzK</button>
    <div class="dropdown-content">
      <a href="index.php?q=oszk_hirek">Hírek</a>
      <a href="index.php?q=oszk_magunkrol">Magunkról</a>
      <a href="index.php?q=oszk_emlekezesszechenyire">Emlékezés Széchenyire</a>
      <a href="index.php?q=oszk_tajekoztatas">Tájékoztatás</a>
      <a href="index.php?q=oszk_dokumentumok">Dokumentumok</a>
      <a href="index.php?q=oszk_szervezet">Szervezet</a>
      <!-- <a href="#">Archívum</a> -->
      <!-- <a href="#">Önkéntes</a> -->
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
    if($Url != "" AND $Url != "#") {
      $DBCon = new DBCon();
      $DBCon -> GetKommentK($Url);
    } elseif ($Url == "#") {
      $DBCon = new DBCon();
      $DBCon -> GetKomment($keres);
    } else {
      $DBCon = new DBCon();
      $DBCon -> GetKomment($keres);
    }
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
				$chat = '<a href="http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '">' . htmlspecialchars($_POST['chat']) . '</a>';
				$DBCon = new DBCon();
				$DBCon -> WriteKomment($name, $date, $chat, $Url, $keres);
		    } else {
		    	echo '<p class="para">' . 'Ehez be kell jelentkezned!' . '</p>';
		    }
		}
	?>
	<?php
    if($Url != "" AND $Url != "#") {
      $DBCon = new DBCon();
      $DBCon -> GetSzoveg($Url);
    } elseif ($Url == "#") {
      $DBCon = new DBCon();
      $DBCon -> GetKartya($keres);
    } else {
      $DBCon = new DBCon();
      $DBCon -> GetKartya($keres);
    }
	?>

  <p id="copy">© Copyright szechenyiforum.hu</p>
  <br>
</div>
<script language="JScript" src="slide.js"></script>
</body>
</html>
