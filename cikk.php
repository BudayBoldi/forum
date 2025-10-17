<form class="addcikk" action="#" method="POST">
  <input type="text" class="cikk" name="neve" placeholder="Cikk neve">
  <input type="text" class="cikk" name="leiras" placeholder="Rövid összegzés">
  <input type="text" class="cikk" name="bkep" placeholder="Borítókép (fájl neve)">
  <input type="text" class="cikk" name="lap" placeholder="Weblap (fájl neve)">
  <label for="cikks">Oldal_aloldal:</label>

  <select id="cikks" name="kereses">
    <option value="forum_hirek">Fórum hirek</option>
    <option value="szalap_hirek">Széchenyi Alapitvány hirek</option>
    <option value="gyujto_gondolatok">Gyujtö Gondolatok</option>
    <option value="gyujto_hirek">Gyüjtö hirek</option>
    <option value="sztars_hirek">Széchenyi Társaság hirek</option>
    <option value="sztars_inmemoriam">Széchenyi Társaság InMemoriam</option>
    <option value="oszk_hirek">OSzK hirek</option>
    <option value="oszk_magunkrol">OSzK magunkról</option>
  </select>

  <input id="subbtn" type="submit" value="Beküldés">
</form>

<?php
	include 'mySQL.php';

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		if ($_SESSION["LoggedIn"] == "Anonym" OR $_SESSION["LoggedIn"] == "Anonym2") {
			$neve = htmlspecialchars($_POST['neve']);
			$leiras = htmlspecialchars($_POST['leiras']);
			$bkep = htmlspecialchars($_POST['bkep']);
			$lap = htmlspecialchars($_POST['lap']);
			$kereses = htmlspecialchars($_POST['kereses']);

			$DBCon = new DBCon();
			$DBCon -> WriteKartya(null, $neve, $leiras, $bkep, $lap, $kereses);
		} else {
			echo 'Jelentkezz be!';
		}
	}
?>